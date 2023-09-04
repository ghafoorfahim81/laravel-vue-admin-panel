<?php

namespace App\Http\Controllers;

use App\Models\Client\Client;
use App\Models\Dashboard;
use App\Models\Expense;
use App\Models\Invoice;
use App\Models\InvoiceDetails;
use App\Models\Order;
use App\Models\Payment;
use App\Models\PaymentDetails;
use App\Models\Project;
use App\Models\Province;
use App\Models\Receipt;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    function __construct()
    {
        // $this->data_client = new Client(); // access to model
    }

    public function index(Request $request)
    {
//        dd('hi');
        if (hasPermission(['dashboard_show']) && auth()->user()->type == 'main' || hasPermission(['organization_dashboard'])) {

            return view('dashboard.dashboard', [
//                'totalInvoices' =>$totalInvoices,
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboardData(Request $request)
    {

        $provinces = (new Province())->get();
        $clientCountByProvince = (new Project())->getProjectByProvince();

        $total = 0;
        $terminataTotal = 0;
        $ongoingTotal = 0;
        $onHoldTotal = 0;
        return [
            'province' => $provinces,
            'clientCountByProvince' => $clientCountByProvince,
            'clientsTotalAllPro' => $total,

        ];


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Dashboard $dashboard
     * @return \Illuminate\Http\Response
     */
    public function show(Dashboard $dashboard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Dashboard $dashboard
     * @return \Illuminate\Http\Response
     */
    public function edit(Dashboard $dashboard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Dashboard $dashboard
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dashboard $dashboard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Dashboard $dashboard
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dashboard $dashboard)
    {
        //
    }

    public function totalClientByGender()
    {

    }


}
