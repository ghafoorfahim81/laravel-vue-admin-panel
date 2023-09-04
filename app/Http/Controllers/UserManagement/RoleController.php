<?php

namespace App\Http\Controllers\UserManagement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use App\Models\Role;
use App\Models\PermissionGroup;
use App\Models\Permission;
use App\Models\RolePermission;
use App\Models\UserPermission;
use DB;
use Illuminate\Support\Str;

class RoleController extends Controller
{
    protected $role;

    /**
     * __construct function initialize the class object
     *
     * @param Role $rule
     */
    public function __construct(Role $role)
    {
        $this->role = $role;
    }

    /**
     * index function get record based on condition
     * role list
     *
     * @param Request $request
     * @return void
     */
    public function index(Request $request)
    {

        $this->setMenu();

        if ($request->ajax()) {
            return $this->role->roleList($request);
        }
        return view('backend.user_management.role.index');
    }

    /**
     * create function create new roel
     *
     * @return void
     */
    public function create()
    {
        $this->setMenu(['add#role' => 'role/create']);
        $permission_data = $this->permissions();

        return view('backend.user_management.role.create', [
            'permission_data' => json_encode($permission_data),
        ]);
    }

    /**
     * store function
     *  store new resource
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'permission_id' => 'required'
        ]);

        $permission_id = explode(',', $request->get('permission_id'));


        // try {
        //     DB::beginTransaction();
            $data = [
                'id'=> Str::uuid()->toString(),
                'name' => $request->get('name'),
            ];
            // $role = insertRecord('roles', $data, $request);
            $role = Role::create($data);
            // return $role;
            foreach ($permission_id as $key => $value) {
                (new RolePermission())->create([
                    'id'=> Str::uuid()->toString(),
                    'role_id' => $role->id,
                    'permission_id' => $value
                ]);
            }


        //     DB::commit();
        //     return ['result' => 1, 'message' => __('message.created_success')];
        // } catch (\Exception $e) {
        //     // DB::rollBack();
        //     return response()->json(['message' => __('message.error')], 422);

        // }


    }

    /**
     * view function get specific record
     *
     * @param Request $request
     * @param int $id
     * @return void
     */
    public function edit(Request $request, $id = 0)
    {
        $this->setMenu(['edit#role' => 'role/edit/' . $id]);
        if ($id) {
            $role = $this->role->find($id);
            $permission_data = $this->permissions($id);


            $permission_data = json_encode($permission_data);

            return view('backend.user_management.role.edit', [
                'role' => $role,
                'permission_data' => $permission_data,
            ]);
        }

    }

    // show function display inserted record
    public function show($id)
    {
        $this->setMenu(['view#role' => 'role/' . $id]);

        if ($id) {
            $role = $this->role->find($id);
            $permission_data = $this->permissions($id);


            $permission_data = json_encode($permission_data);

            return view('backend.user_management.role.show', compact('permission_data', 'role'));
        }

    }

    /**
     * update function update specific record
     *
     * @param Request $request
     * @param int $id
     * @return void
     */
    public function update(Request $request, $id = 0)
    {
        if ($id) {
            $this->validate($request, [
                'name' => 'required',
                'permission_id' => 'required'
            ]);


            if ($id) {
                $permission_id = explode(',', $request->get('permission_id'));
                try {
                    DB::beginTransaction();
                    $data = [
                        'name' => $request->get('name'),
                    ];
                    updateRecord('roles', 'id', $id, $data, $request);

                    $role = $this->role->find($id);
                    (new RolePermission())->where('role_id', $id)->delete();

                    foreach ($permission_id as $key => $value) {
                        (new RolePermission())->create([
                            'id'=> Str::uuid()->toString(),
                            'role_id' => $role->id,
                            'permission_id' => $value
                        ]);
                    }

                    DB::commit();
                    return ['result' => 1, 'message' => __('message.success')];
                } catch (\Exception $e) {
                    DB::rollBack();
                    return response()->json(['message' => __('message.error')], 422);

                }
            }
        }
    }

    /**
     * destroy function delete one or more by thier ids
     *
     * @param Request $request
     * @return void
     */
    public function destroy(Request $request, $id)
    {
        $id=multipleDelete($id);

        try {
            DB::beginTransaction();
            $role = $this->role->whereIn('id', $id)->get();
            foreach ($role as $key => $value) {
                $check = (new Role())->canDelete($value->id);
                if ($check) {
                    (new RolePermission())->whereIn('role_id', [$value->id])->delete();
                    deleteRecord('roles', 'id', $value->id, $request);
                } else {
                    DB::rollBack();
                    return response()->json(['message' => __('message.error')], 422);
                }


            }

            DB::commit();
            return ['result' => 1, 'message' => __('message.success')];
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => __('message.error')], 422);
        }
    }

    public static function permissions($role_id = null, $user_id = null)
    {
        $role = null;
        $rolePermission = null;
        if ($role_id > 0) {
            $role = (new Role())->find($role_id);

            $rolePermission = (new RolePermission())->where('role_id', $role->id)->get();

        }
        if ($user_id) {

            $rolePermission = (new UserPermission())->where('user_id', $user_id)->get();

        }

        $permission_data = [];
        $Permissions = PermissionGroup::with('permissions')->orderBy('name','asc')->get();
        foreach ($Permissions as $key => $value) {

            $temp = [];
            foreach ($value->permissions as $key1 => $value1) {
                $check = null;
                if ($rolePermission) {
                    $flag = $rolePermission->where('permission_id', $value1->id)->first();
                    if ($flag) {
                        $check = 1;
                    }

                }
                array_push($temp, [
                    'checked' => $check,
                    'permission_id' => $value1->id,
                    'permission_name' => __('permission.' . $value1->name),
                ]);
            }
            array_push($permission_data, [
                'permission_group_id' => $value->id,
                'permission_group_name' =>  $value->name,
                'permissions' => $temp,
                'checked' => null
            ]);
        }
        //$permission_data=json_encode($permission_data);
        return $permission_data;
    }


    // set active menu
    public function setMenu($whichMenu = array(), $replace = false)
    {
        $defaultMenu = ['user_management' => 'role', 'role' => 'role'];
        $menus = array();
        if ($replace) {
            $menus = $whichMenu;
        } else {
            $menus = array_merge($defaultMenu, $whichMenu);
        }

        setActiveMenu($menus);
    }
}
