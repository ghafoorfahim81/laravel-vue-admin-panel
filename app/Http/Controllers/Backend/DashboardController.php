<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Item;
use Illuminate\Support\Facades\DB;
use Mpdf\Tag\Tr;

class DashboardController extends Controller
{
    protected $item;

    public function __construct(Item $item)
    {
        $this->item = $item;
    }

    public function dashboard()
    {
        return view('dashboard');
    }

    public function dashBoardData()
    {

    }


}
