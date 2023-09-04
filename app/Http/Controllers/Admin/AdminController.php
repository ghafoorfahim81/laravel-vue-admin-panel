<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Setting;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){ 
        return view('admin.dashboard');
    }

    public function setting(){

        return view('admin.setting');
    }

    public function checkpassword(Request $request)
    {
        if(Hash::check($request->password,Setting::first()->referral_password)){
            return response()->json(['status' => 200, 'msg' => "success"]);
        }
        else{
            return response()->json(['status' => 403, 'msg' => "denied"]);
        }


    }

    public function changeReferralExportPassword(Request $request){

        $validator = Validator::make($request->all(), [
            'oldpassword' => ['required','min:5'],
            'newpassword' => ['required','min:5'],
            'confirmpassword' => ['required','min:5'],
        ]);
        if($validator->passes()){
            if($request->newpassword == $request->confirmpassword){
                if(Hash::check($request->oldpassword,Setting::first()->referral_password)){
                    $setting = Setting::first();
                    $setting->referral_password = Hash::make($request->newpassword);
                    $setting->save();
                    return redirect()->back()->with('success', 'Password Successfully Changed!');
                }
            }
        }
        return redirect()->back()->with('error', 'Invalid Credentials!');
    }
}
