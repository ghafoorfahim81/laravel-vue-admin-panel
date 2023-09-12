<?php

namespace App\Http\Controllers\Fronted\AboutUs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function index(){
        return view('frontend.about_us.index');
    }
}
