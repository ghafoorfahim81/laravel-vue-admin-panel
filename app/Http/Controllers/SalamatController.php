<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class SalamatController extends Controller
{
    public function getData(Request $request)
    {
        $type = explode(',', $request->type);
        $response = [];
        if (in_array('categories', $type)) {
            $response['categories'] =  Category::get(['name','id']);
        }
        return $response;
    }
}
