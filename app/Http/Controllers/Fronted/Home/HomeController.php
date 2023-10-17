<?php

namespace App\Http\Controllers\Fronted\Home;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $products = (new Product())->getProductsList();
//        dd($products);
        return view('frontend.home.index',compact('products'));
    }
}
