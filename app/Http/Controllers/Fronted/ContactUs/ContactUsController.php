<?php

namespace App\Http\Controllers\Fronted\ContactUs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function index(){
        return view('frontend.contact_us.index');
    }
}
