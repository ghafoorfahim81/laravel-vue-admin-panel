<?php

use App\Models\User;
use Illuminate\Support\Facades\Schema;
use App\Traits\HasPermissionTrait;
use Carbon\Carbon;
use App\Models\Currency;
use App\Models\HomeCurrency;
use App\Models\Company;
use App\Models\Transaction;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Str;
    // use Artisan;




function companyInfo()
{
    $company = company::find(auth()->user()->current_company);
    return $company;
}

    function checkForDelete($tables, $column, $id)
    {
        for($x=0; $x<count($tables); $x++){

            $results = DB::select('select * from ' . $tables[$x] . ' where ' . $column . ' = :id ', ['id' => $id]);
            if ($results !== [])
                return true;
        }
        return false;
    }

    function setDB(){
        if(auth()->user()->companies != null){

            $companies = json_decode(auth()->user()->companies);
            foreach ($companies as $company) {
                if(auth()->user()->current_company == $company->id){
                    $db_name = $company->db_name;
                    break;
                }
            }
        }
        Config::set("database.connections.mysql", [
            'driver' => 'mysql',
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '3306'),
            'database' => $db_name,
            'username' => config('database.connections.mysql.username'),
            'password' => config('database.connections.mysql.password'),
        ]);
        DB::purge('mysql');
    }
    /**
     * written by: Ali Mashal Frozan
     */


    /**
     * create Record function
     * used for storing data to database and login it's information
     * @param [type] $table
     * @param array $data
     * @param [type] $request
     * @return void
     */
    function insertRecord($table=null,$data=array(),$request=null)
    {
       if($table && count($data) && $request !=null)
       {

        if(Schema::hasColumn($table,'user_id') && $table !='members')
        {

            $data=$data+['user_id'=>auth()->user()->id];
        }
        $data['created_at']= Carbon::now();


        $id=DB::table($table)->insertGetId($data);

        $result=DB::table($table)->where('id',$id)->first();

        return $result;
    }
    return false;
    }
     /**
      * updateRecord function
      * update table record based on condition
      * @param [type] $table
      * @param [type] $condition_column
      * @param [type] $condition_column_value
      * @param array $data
      * @param [type] $request
      * @return void
      */
     function updateRecord($table=null,$condition_column=null,$condition_column_value=null,$data=array(),$request=null)
     {
       if($table && $condition_column && $condition_column_value && count($data))
       {
        $data['updated_at']= Carbon::now();
        $old_data=DB::table($table)->where($condition_column,$condition_column_value)->first();
        $result=DB::table($table)->where($condition_column,$condition_column_value)->update($data);

        return $result;
    }
    return false;
    }
     /**
      * deleteRecord function
      * delete table record based on condition
      * @param [type] $table
      * @param [type] $condition_column
      * @param [type] $condition_column_value
      * @return void
      */
     function deleteRecord($table,$condition_column=null,$condition_column_value=null,$request=null)
     {
        if($table && $condition_column && $condition_column_value)
        {
            $old_data=DB::table($table)->where($condition_column,$condition_column_value)->first();
            $result=DB::table($table)->where($condition_column,$condition_column_value)->delete();
            return $result;
        }
        return false;
    }

    /**
     * perPage function return per page
     *
     * @return void
     */
    function perPage($returnPerPageArray=false)
    {

        if($returnPerPageArray)
        {
            $appPerPage= [5,10,20,50,100];
            return json_encode($appPerPage);
        }

        return 10;

    }

    function perPageDropDown()
    {
        return 30;
    }


    /**
     * setActiveMenu function
     * set active menu and put it in session get comma seperated string
     * @param string $menus
     * @return void
     */
    function setActiveMenu($menus=array())
    {
        if(is_array($menus))
        {
            \Session::put('active_menus',$menus);
        }

    }



    // if user has passed permissions
    function hasPermission($permission=array(),$booleanResult=true)
    {
    //    return true;

        if(!is_array($permission))
        {
            $permission=[$permission];
        }
        $user=auth()->user();
        return (new User())->userPermissionsCheck($user->id,$permission,$booleanResult);

    }
    //string to word
    function numToOrdinalWord($num)
    {
        $first_word = array('eth','First','Second','Third','Fouth','Fifth','Sixth','Seventh','Eighth','Ninth','Tenth','Elevents','Twelfth','Thirteenth','Fourteenth','Fifteenth','Sixteenth','Seventeenth','Eighteenth','Nineteenth','Twentieth');
        $second_word =array('','','Twenty','Thirty','Forty','Fifty');

        if($num <= 20)
            return $first_word[$num];

        $first_num = substr($num,-1,1);
        $second_num = substr($num,-2,1);

        return $string = str_replace('y-eth','ieth',$second_word[$second_num].'-'.$first_word[$first_num]);
    }
    function convertTimestampToDate($date)
    {
        date('Y-m-d H:i:s', strtotime($date));
    }
    // this to give less server side data
    function dropdownperPageDropDown()
    {
        return 15;
    }

    function myUrl()
    {
        return url('/').'/';
    }
    // get day abbreviation to compare it to timining table
    function getDayAbbreviation($dayName)
    {
        if($dayName !='')
        {
            $dayName=substr($dayName,0,3);

            $dayName=strtolower($dayName);
        }
        return $dayName;
    }
    // convert date to day object
    function convertDate($date=null,$time=false)
    {
        if($date)
        {
            $date=Carbon::parse($date)->format('Y-m-d');

            $date = \Carbon\Carbon::createFromFormat('Y-m-d', $date);


            if(!$time)
            {
                $date=$date->startOfDay();
            }

        }
        return $date;
    }

    // get readable size of file
    function humanFileSize($size,$unit="")
    {
        if( (!$unit && $size >= 1<<30) || $unit == "GB")
        {
            return number_format($size/(1<<30),2)."GB";
        }

        if( (!$unit && $size >= 1<<20) || $unit == "MB")
        {
           return number_format($size/(1<<20),2)."MB";
       }

       if( (!$unit && $size >= 1<<10) || $unit == "KB")
       {
           return number_format($size/(1<<10),2)."KB";
       }


       return number_format($size)." bytes";
    }


    function pureArray($myarr){
        $wishArr = array();
        foreach($myarr as $ar){
            if($ar != null) array_push($wishArr, $ar);
        }
        return $wishArr;
    }

    function hasAll()
    {
        return true;
    }

    function multipleDelete($id)
    {
        $id=explode(',',$id);
        $result=array();
        foreach ($id AS $value)
        {
            array_push($result,(int) $value);
        }

        return $result;
    }


    function homeCurrency()
    {
        $hc = HomeCurrency::where('company_id', auth()->user()->current_company)->first();
        $homeCurrency = [
            'id' => $hc->id,
            'name' => $hc->name,
            'code' => $hc->code,
            'symbol' => $hc->symbol,
            'rate' => $hc->exchange_rate,
            'exchange_rate' => $hc->exchange_rate,
        ];
        return $homeCurrency;
    }

    function selectedCompany()
    {
        $sc = Company::first();
        $homeCurrency = [
            'id' => $sc->id,
            'name' => $sc->name,
        ];
        return $homeCurrency;
    }

    function pushTransaction($account_id,$account_name, $amount, $currency = null, $rate = 1, $type = 'dr', $remark = null, $date = null, $location_id = null)
    {

        if (!$account_id) return false;

        if ($rate == null) {
            $rate = 1;
        }

        if ($date == null) {
            $date = Carbon::now();
        }

        return Transaction::create([
            'account_id' => $account_id,
            'account_name' => $account_name,
            'amount'    => $amount,
            'currency'  => $currency,
            'rate'      => $rate,
            'type'      => $type,
            'date'      => $date,
            'remark'    => $remark,
            'user_id'   => auth()->id(),
            'company_id'=> auth()->user()->current_company,
            'location_id'=> $location_id
        ]);
    }




    ?>
