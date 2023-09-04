<?php

namespace App\Http\Controllers\UserManagement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\UserRole;
use App\Models\Role;
use App\Models\UserPermission;
use App\Models\Permission;
use App\Models\Province;
// use App\Models\Psycho\Psychologist;
use Illuminate\Support\Str;
use Storage;
use File;


class UserController extends Controller
{
    protected $user;

    /**
     * __construct function initialize class
     *
     * @param User $user
     */
    public function __construct(User $user,
                                UserRole $userRole)
    {
        $this->user = $user;
    }

    /**
     * index function get records based on condition
     * user list
     *
     * @return void
     */
    public function index(Request $request)
    {

        $this->setMenu();


        if ($request->ajax()) {
            return $this->user->userList($request);
        }
        return view('backend.user_management.user.index');
    }
    public function checkEmail(Request $request)
    {
        return $this->user->where('email','LIKE','%'.$request->email.'%')->first();
    }
    /**
     * create function
     * display user create form
     * @return void
     */
    public function create()
    {

        $this->setMenu(['add#user' => 'user/create']);
        $provinces = [];
        $role = (new Role())->where('roles.name','!=','abar tarnegar')->get();
        $permission_data = \App\Http\Controllers\UserManagement\RoleController::permissions();

        return view('backend.user_management.user.create', [
            'role' => json_encode($role),
            'permission_data' => json_encode($permission_data),
            'provinces'=>$provinces
        ]);
    }

    /**
     * create function
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        $role_ids = $request->get('role_ids');
        if (!is_array($role_ids)) {
            $role_ids = [$role_ids];
        }

        if (isset($role_ids[0])) {
            if (is_string($role_ids[0])) {
                $role_ids = explode(',', $role_ids[0]);
            }
        }
        // dd($role_ids);
        // $permission_id = explode(',', $request->get('permission_id'));

        try {

            DB::beginTransaction();
            $photo_path = '';
            $photo = $request->file('photo');
            if ($photo) {
                if (isset($_FILES['photo']['name'])) {
                    $_FILES['photo']['name'] = time() . '.' . $photo->clientExtension();
                }


                $location = '/user/photo';
                $photo_path = Storage::disk('public')->put($location, $photo);
                $photo_path = Storage::disk('public')->url($photo_path);
                $photo_path = strstr($photo_path, 'storage/');

            }

            $zone_id = Province::find($request->province)->zone_id;
            $all_zone_province_id = Province::where('zone_id',$zone_id)->pluck('id');
            $data = [
                'id'=>Str::uuid()->toString(),
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'setting' => auth()->user()->setting,
                'password' => bcrypt($request->get('password')),
                'profile_photo_path' => $photo_path,
                'location_id' => json_encode($all_zone_province_id),
                'type' => ($zone_id)?'province':'main',
                'current_company'   => auth()->user()->current_company,

            ];

            // $result = insertRecord('users', $data, $request, 0, 0);
            $result = $this->user->create($data);
            $user = $this->user->find($result->id);
            for ($i=0; $i < count($role_ids); $i++) {
                # code...
                $result = $user->roles()->attach($role_ids[$i], ['id' => Str::uuid()->toString()]);
            }
            // dd($result);

            // foreach ($permission_id as $key => $value) {
            //     if ($value && $value != '')
            //         (new UserPermission())->create([
            //             'user_id' => $user->id,
            //             'permission_id' => $value
            //         ]);
            // }

            // if ($request->has('is_psychologist')) {
            //     (new Psychologist())->create([
            //         'user_id' => $user->id,
            //     ]);
            // }

            DB::commit();
            return redirect()->route('user.index');
            // return ['result' => 1, 'message' => __('message.success')];
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => __('message.error')], 422);
        }
    }

    /**
     * view function get specific record
     *
     * @param Request $request
     * @param integer $id
     * @return void
     */
    public function edit(Request $request, $id = 0)
    {
        $this->setMenu(['edit#user' => 'user/edit/' . $id]);
        if ($id) {
            $user = $this->user->userDetail($id);
            $role = (new Role())->where('roles.name','!=','abar tarnegar')->get();
            $super = (new Role())->where('roles.name','abar tarnegar')->first();
            $roleId = explode(',', $user->role_id);
            $super = in_array($super->id,$roleId)?$super->id:false;
            // dd($super);
            $provinces = DB::table('provinces')->get(['id' ,'name']);
            $userRole = (new Role())->where('roles.name','!=','abar tarnegar')->whereIn('id', $roleId)->get();
// dd($selected_province);
// return $selected_province;
            return view('backend.user_management.user.edit', [
                'role' => json_encode($role),
                'super' => $super,
                'userRole' => json_encode($userRole),
                'user' => $user,
                'provinces' => $provinces,
            ]);
        }
    }

    /**
     * view function get specific record
     *
     * @param Request $request
     * @param integer $id
     * @return void
     */
    public function show(Request $request, $id = 0)
    {
        $this->setMenu(['view#user' => 'user/' . $id]);
        if ($id) {
            $user = $this->user->userDetail($id);

            return view('backend.user_management.user.show', [
                'user' => $user,
            ]);
        }
    }
    public function getCurrentUserSetting()
    {
        return auth()->user()->setting;
    }
    public function setting(Request $request)
    {
        $auth   = auth()->user()->id;
        $user   = $this->user->find($auth);
        $user->update([
            'setting'  =>$request->form
        ]);
    }


    public function checkPassword(Request $request)
    {
        $result = null;
        $pass = $request->pass;
        $id = $request->id;
        $user = $this->user->find($id);
        $check = \Hash::check($pass, $user->password);
        if ($check) {
            $result = 1;
        } else {
            $result = 0;
        }
        return $result;
    }

    /**
     * view function get specific record
     *
     * @param Request $request
     * @param integer $id
     * @return void
     */
    public function profile(Request $request, $id)
    {
        $id = $id;
        if($id != auth()->user()->id)
        {
            return view('backend.shared.pages-404');
        }
        else{
            $user = $this->user->userDetail($id);
            return view('backend.user_management.user.profile', compact('user'));
        }
    }

    /**
     * update function
     * update specific record
     * @param Request $request
     * @param int $id
     * @return void
     */
    public function update(Request $request, $id = 0)
    {

        if ($id) {
            $this->validate($request, [
                'name' => 'required',
                'email' => 'required|unique:users,email,' . $id . '|regex:/^\S*$/u',
                'role_ids' => 'required',
            ]);

            if ($request->get('password') != '' || $request->get('confirm_password')) {
                $this->validate($request, [
                    'password' => 'required|min:3',
                    'confirm_password' => 'required|same:password',
                ]);
            }
            $role_ids = $request->get('role_ids');
            if (!is_array($role_ids)) {
                $role_ids = [$role_ids];
            }

            if (isset($role_ids[0])) {
                if (is_string($role_ids[0])) {
                    $role_ids = explode(',', $role_ids[0]);
                }
            }

            // $permission_id = explode(',', $request->get('permission_id'));

            try {
                $user = $this->user->find($id);
                $photo_path = $user->profile_photo_path;
                $photo = $request->file('photo');


                if ($photo) {
                    if (isset($_FILES['photo']['name'])) {
                        $_FILES['photo']['name'] = time() . '.' . $photo->clientExtension();
                    }

                    $file = public_path($user->profile_photo_path);

                    if (File::exists($file)) {
                        File::delete($file);
                    }


                    $location = '/user/photo';
                    $photo_path = Storage::disk('public')->put($location, $photo);
                    $photo_path = Storage::disk('public')->url($photo_path);
                    $photo_path = strstr($photo_path, 'storage/');


                }
                DB::beginTransaction();
                // dd($request->all());
                $zone_id = Province::find($request->province)->zone_id;
                $all_zone_province_id = Province::where('zone_id',$zone_id)->pluck('id');

                // $zone_id = Province::find($request->province)->zone_id;
                // $all_zone_province_id = Province::where('zone_id',$zone_id)->pluck('id');
                $data = [
                    'name' => $request->get('name'),
                    'email' => $request->get('email'),
                    'profile_photo_path' => $photo_path,
                    'province_id' => $request->province,
                    'location_id' => json_encode($all_zone_province_id),
                    'type' => ($zone_id)?'province':'main',
                    'current_company'   => auth()->user()->current_company,

                ];

                if ($request->get('password') != '') {
                    $data['password'] = bcrypt($request->get('password'));

                }



                updateRecord('users', 'id', $id, $data, $request);


                (new UserRole())->where('user_id', $id)->delete();
                for ($i=0; $i < count($role_ids); $i++) {
                    # code...
                    $user->roles()->attach($role_ids[$i], ['id' => Str::uuid()->toString()]);
                }
                // $user->roles()->attach($role_ids, ['id' => Str::uuid()->toString()]);

                // (new UserPermission())->where('user_id', $id)->delete();
                // foreach ($permission_id as $key => $value) {
                //     if ($value && $value != '')
                //         (new UserPermission())->create([
                //             'user_id' => $user->id,
                //             'permission_id' => $value
                //         ]);
                // }

                // if ($request->has('is_psychologist')) {
                //     $checkPsycologist = (new Psychologist())->where('user_id', $id)->first();

                //     if (!$checkPsycologist) {
                //         (new Psychologist())->create([
                //             'user_id' => $user->id,
                //         ]);
                //     }
                // } else {
                //     (new Psychologist())->where('user_id', $id)->delete();
                // }


                DB::commit();
                return ['result' => 1, 'message' => __('message.success')];
            } catch (\Exception $e) {
                DB::rollBack();
                return response()->json(['message' => __('message.error')], 422);
            }
        }
    }

    /**
     * update function
     * update profile record
     * @param Request $request
     * @return void
     */
    public function updateProfile(Request $request)
    {


        $id = $request->get('id');
        if ($id) {
            $this->validate($request, [
                'name' => 'required',
                'email' => 'required|unique:users,email,' . $id,
            ]);

            if ($request->get('password') != '' || $request->get('confirm_password')) {
                $this->validate($request, [
                    'password' => 'required|min:3',
                    'confirm_password' => 'required|same:password',
                ]);
            }
            try {
                DB::beginTransaction();
                $user = $this->user->find($id);
                $photo_path = $user->photo;
                $photo = $request->file('photo');
                if ($photo) {
                    if (isset($_FILES['photo']['name'])) {
                        $_FILES['photo']['name'] = time() . '.' . $photo->clientExtension();
                    }

                    $file = public_path($user->photo);

                    if (File::exists($file)) {
                        File::delete($file);
                    }
                    $location = domainName() . '/user/photo';
                    $photo_path = Storage::disk('public')->put($location, $photo);
                    $photo_path = Storage::disk('public')->url($photo_path);
                    $photo_path = strstr($photo_path, 'storage/');
                }
                $data = [
                    'name' => $request->get('name'),
                    'email' => $request->get('email'),
                ];
                if ($request->get('password') != '') {
                    $data['password'] = bcrypt($request->get('password'));
                }
                updateRecord('users', 'id', $id, $data, $request);
                DB::commit();
                return ['result' => 1, 'message' => __('message.updated_success')];
            } catch (\Exception $e) {
                DB::rollBack();
                return response()->json(['message' => __('message.error')], 422);
            }
        }
    }

    /**
     * destroy function
     * delete record based on condition
     * @param Request $request
     * @return void
     */
    public function destroy(Request $request, $id)
    {
        $id=multipleDelete($id);

        try {
            DB::beginTransaction();
            $user = $this->user->whereIn('id', $id)->get();

            foreach ($user as $key => $value) {
                if (\Auth::check())
                    if ($value->id == auth()->user()->id) {
                        return response()->json(['message' => __('message.error')], 422);
                    }
                (new UserRole())->whereIn('user_id', [$value->id])->delete();
                (new UserPermission())->whereIn('user_id', [$value->id])->delete();
                deleteRecord('users', 'id', $value->id, $request);
            }
            DB::commit();
            return ['result' => 1, 'message' => __('message.success')];
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => __('message.error')], 422);
        }
    }

    // set active menu
    public function setMenu($whichMenu = array(), $replace = false)
    {
        $defaultMenu = ['user_management' => 'user', 'user' => 'user'];
        $menus = array();
        if ($replace) {
            $menus = $whichMenu;
        } else {
            $menus = array_merge($defaultMenu, $whichMenu);
        }

        setActiveMenu($menus);
    }
}
