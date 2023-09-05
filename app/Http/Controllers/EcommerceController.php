<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Language;
use Illuminate\Http\Request;

class EcommerceController extends Controller
{
    public function getDropdownData(Request $request)
    {
        $type = explode(',', $request->type);
        $response = [];
        if (in_array('categories', $type)) {
            $response['categories'] =  Category::get(['name','id']);
        }
        if (in_array('languages', $type)) {
            $response['languages'] =  Language::get(['name','code']);
        }
        return $response;
    }
}
