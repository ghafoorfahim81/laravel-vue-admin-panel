<?php

namespace App\Http\Controllers;

use App\Models\Deadline;
use App\Models\DeadlineType;
use App\Models\Directorate;
use App\Models\DocType;
use App\Models\Employee;
use App\Models\ExternalDirectorate;
use App\Models\FollowupType;
use App\Models\Role;
use App\Models\SecurityLevel;
use App\Models\Status;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class DTSController extends Controller
{

    public function getDropdownItems(Request $request)
    {
        $type = explode(',', $request->type);
        $response = [];
        if ($type) {
            if (in_array('employees', $type)) {
                $response['employees'] = (new Employee())->getEmployee(null, null);;
            }
            if (in_array('followupTypes', $type)) {
                $response['followupTypes'] = FollowupType::all();
            }
            if (in_array('securityLevels', $type)) {
                $response['securityLevels'] = SecurityLevel::all();
            }
            if (in_array('deadlineTypes', $type)) {
                $response['deadlineTypes'] = DeadlineType::all();
            }
            if (in_array('statuses', $type)) {
                $response['statuses'] = Status::all();
            }
            if (in_array('deadlines', $type)) {
                $response['deadlines'] = Deadline::all();
            }
            if (in_array('documentTypes', $type)) {
                $response['documentTypes'] = DocType::all();
            }
            if (in_array('external_dirs', $type)) {
                $response['externalDirectorates'] = ExternalDirectorate::get(['name', 'id']);
            }
            if (in_array('deputies', $type)) {
                $response['deputies'] = (new Directorate())->getDeputies();
            }
            if (in_array('directorates', $type) || in_array('internal_dirs', $type) || in_array('filter_dirs', $type)) {
                $response['directorates'] = (new Directorate())->getDirectorate();
            }
            if (in_array('roles', $type)) {
                $response['roles'] = (new Role())->get(['name', 'id']);
            }
            return $response;
        }
    }

    public function checkEmail(Request $request)
    {
        $result = DB::table('users')->where('email', $request->email)->first();
        if ($result) {
            return 1;
        } else {
            return 0;
        }
    }

    // this function is for migrating directorates from local auth database
    public function getDirectoratesFromLocalHR()
    {
        $insertData = [];
        $avialableDirectorates = [];
        $isRecordModefied = false;
        $headers = ['Accept' => 'application/json'];
        $directorates = Http::get(env('CUSTOM_API_LOCAL_HR_BASE_URL') . 'api/inventory-system/get-directorates', $headers);
        $directorates = json_decode($directorates, true);
        $directorateModel = (new Directorate());
        $avialableDirectorates = $directorateModel::all();

        foreach ($directorates as $directorate) {
            $directoratename = $directorate['name_en'];
            $prefix = $this->extractPrefix($directoratename);
            array_push($insertData, [
                'id' => $directorate['id'],
                'name_en' => $directorate['name_en'],
                'name_prs' => $directorate['name'],
                'name_ps' => $directorate['name_pa'],
                'parent_id' => $directorate['parent'],
                'prefix' => $prefix,
            ]);
        }

        foreach ($insertData as $key => $insertDir) {
            foreach ($avialableDirectorates as $avialableDir) {
                $directoratename = $insertDir['name_en'];
                $prefix = $this->extractPrefix($directoratename);
                if ($avialableDir->id == $insertDir['id']) {
                    if ($avialableDir->name_en !== $insertDir['name_en']
                        || $avialableDir->name_prs !== $insertDir['name_prs']
                        || $avialableDir->name_ps !== $insertDir['name_ps']
                        || $avialableDir->parent_id !== $insertDir['parent_id']) {
                        $isRecordModefied = $directorateModel::where('id', '=', $insertDir['id'])->update([
                            'name_en' => $insertDir['name_en'],
                            'name_prs' => $insertDir['name_prs'],
                            'name_ps' => $insertDir['name_ps'],
                            'parent_id' => $insertDir['parent_id'],
                            'prefix' => $prefix,
                        ]);
                    }
                    unset($insertData[$key]);
                    break;
                }
            }
        }

        if ($insertData) {
            $isRecordModefied = $directorateModel::insert($insertData);
        }
        unset($insertData);
        if ($isRecordModefied === false) {
            return response()->json('Directorates are not modefied or inserted');
        }
        return response()->json('Directorates are modefied or inserted');
    }
    public function extractPrefix($directoratename)
    {
        // Logic to extract prefix from the directorate name
        // You may need to customize this logic based on your specific requirements
        $prefix = ''; // Default value

        // Example logic: Extract first letters of each word
        $words = explode(' ', $directoratename);
        foreach ($words as $word) {
            $prefix .= substr($word, 0, 1);
        }

        // Debug information
        \Log::info("Directorate Name: $directoratename, Extracted Prefix: $prefix");

        return strtolower($prefix);
    }

    // this function is for migrating employees from local auth database
    public function getEmployeesFromLocalHR()
    {
        $insertData = [];
        $avialableEmployees = [];
        $isRecordModified = false;
        $headers = ['Accept' => 'application/json'];
        $employees = Http::get(env('CUSTOM_API_LOCAL_HR_BASE_URL') . 'api/inventory-system/get-employees', $headers)->throw();
        $employees = $employees->json();
        $employeeModel = new Employee();

        // Get the IDs of all existing employees
        $existingIds = $employeeModel->pluck('id')->toArray();

        // Split the employees into chunks of 3000 records for faster insertions
        $chunkedEmployees = array_chunk($employees, 3000);

        // Loop through each chunk of employees
        foreach ($chunkedEmployees as $chunk) {
            $insertData = [];

            // Loop through each employee in the chunk
            foreach ($chunk as $employee) {
                // Check if the employee already exists in the database
                if (in_array($employee['id'], $existingIds)) {
                    // Update the employee record
                    $employeeModel->where('id', $employee['id'])->update($employee);
                    $isRecordModified = true;
                } else {
                    // Add the employee record to the insert data
                    $insertData[] = $employee;
                }
            }

            // Insert any new employee records
            if (!empty($insertData)) {
                $employeeModel->insert($insertData);
                $isRecordModified = true;
            }
        }

        // Return a response based on whether any records were modified or inserted
        if ($isRecordModified) {
            return response()->json('Employees were modified or inserted');
        } else {
            return response()->json('Employees were not modified or inserted');
        }
        // $insertData = [];
        // $avialableEmployees = [];
        // $isRecordModefied = false;
        // $headers = ['Accept' => 'application/json'];
        // $employees = Http::get(env('CUSTOM_API_LOCAL_HR_BASE_URL') . 'api/inventory-system/get-employees', $headers);
        // $employees = json_decode($employees, true);
        // $employeeModel = (new Employee());
        // $existingRecords = DB::table('employees')->get();


        // foreach($employees as $key => $employee) {
        //     foreach($avialableEmployees as $avialableEmp) {
        //             if ($avialableEmp->id == $employee['id']) {
        //                 if ($avialableEmp->name != $employee['name']
        //                 || $avialableEmp->last_name != $employee['last_name']
        //                 || $avialableEmp->father_name != $employee['father_name']
        //                 || $avialableEmp->position != $employee['position']
        //                 || $avialableEmp->gender != $employee['gender']
        //                 || $avialableEmp->phone != $employee['phone']
        //                 || $avialableEmp->email != $employee['email']
        //                 || $avialableEmp->directorate_id != $employee['directorate_id'])
        //                  {
        //                     $isRecordModefied = $employeeModel::where('id','=', $employee['id'])
        //                     ->update([
        //                         'name' => $employee['name'],
        //                         'last_name' => $employee['last_name'],
        //                         'father_name' => $employee['father_name'],
        //                         'position' => $employee['position'],
        //                         'gender' => $employee['gender'],
        //                         'phone' => $employee['phone'],
        //                         'email' => $employee['email'],
        //                         'directorate_id' => $employee['directorate_id'],
        //                         'hire_status' => $employee['hire_status'],
        //                     ]);
        //                 }
        //                 unset($employees[$key]);
        //                 break;
        //             }
        //     }
        // }

        // if ($employees) {
        //     foreach(array_chunk($employees,3000) as $emp) {
        //         $isRecordModefied = $employeeModel::insert($emp);
        //     }
        // }
        // unset($employees);
        // if ($isRecordModefied === false) {
        //     return response()->json('Employees are not modefied or inserted');
        // }
        // return response()->json('Employees are modefied or inserted');
    }

//    This function gets all the directorates of a specified deputy
    public function getDeputyDirectorates(Request $request)
    {
        $deputy_id = $request->deputy_id;
        return (new Directorate())->where('parent_id', $deputy_id)
            ->selectRaw('name_' . lang() . ' as name,id')
            ->get();
    }

//    This function gets all the directorates of a specified deputy
    public function getGeneralDirDirectorates(Request $request)
    {
        $directorate_id = $request->directorate_id;
        return (new Directorate())->where('parent_id', $directorate_id)
            ->selectRaw('name_' . lang() . ' as name,id')
            ->get();
    }

//    this function gets all the employees of specified directorate
    public function getDirectorateUsers(Request $request)
    {
        $directorate_id = $request->directorate_id;
        return (new Employee())->getDirectorateUsers($directorate_id);
    }

    public function getDirectorateEmployees(Request $request)
    {
        $employees = Employee::where('directorate_id', $request->directorate_id)->selectRaw('name,id, CONCAT(name,"-",father_name) AS full_name,father_name,position')->get();
        return $employees;
    }
    public function searchUser(Request $request)
    {
        $keyword    = $request->keyword;
        $tracker_id = $request->tracker_id;
        $users      = User::where('user_name','like', '%' . $keyword . '%')->get();
        return $users;
    }


    public function flow(Request $request)
    {
        try{
            DB::beginTransaction();
            $user   = auth()->user()->id;
            $column = null;
            if($request->table=='card_to_card_flows')
            {
                $column = 'card_to_card_id';
            }
            else{
                $explodeColumn = explode('_', $request->table);
                $column  = $explodeColumn[0].'_id';
            }
            $insertFlow  = DB::table($request->table)->insert([
                $column           => $request->table_id,
                'status_slug'     => $request->flow,
                'date'            => Carbon::now(),
                'remark'          => $request->remark,
                'updated_by'      => $user,
                'created_by'      => $user
            ]);
            $latestFlow = DB::table($request->table)->orderBy('created_at','desc')->first();
            DB::commit();
            return response()->json([
                'status' => 200,
                'flow'   => $latestFlow->status_slug,
                'message'    => __('general_words.record_saved'),
            ]);
        }
        catch(\Exception $e){
            DB::rollBack();
            \Log::error($e);
            return response()->json([
                'status' => 400,
                'message'=> __('general_words.something_went_wrong'),
                'errors'=> $e
            ]);
        }
    }
}
