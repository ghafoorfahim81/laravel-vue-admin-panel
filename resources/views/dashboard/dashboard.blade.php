@extends('layouts.master')
@section('title')
    Analytics Dashboard
@endsection
@section('css')
    <style>

        .customCard {
            box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
            border-radius: 5px;
            border: solid lightblue 2px;
        }

        .custom_design_new_blue {
            background-image: linear-gradient(to bottom right, #5761B2, #1FC5A8);
            box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
            border-radius: 5px;
            border: solid white 2px;
        }

        .custom_design_blue {
            background: linear-gradient(40deg, #45cafc, #303f9f) !important;
            box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
            border-radius: 5px;
            border: solid white 2px;
        }

        .custom_design_purple {
            background-image: linear-gradient(120deg, #f093fb 0, #f5576c 100%);
            box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
            border-radius: 5px;
            border: solid white 2px;
        }

        .custom_design_orange {
            background: linear-gradient(40deg, #ffd86f, #fc6262) !important;
            box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
            border-radius: 5px;
            border: solid white 2px;
        }

        .custom_design_cyan {
            background-image: linear-gradient(120deg, #84fab0 0, #8fd3f4 100%);
            box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
            border-radius: 5px;
            border: solid white 2px;
        }

        .skeleton__custom {
            box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
            border-radius: 5px;
            border: solid white 2px;
            width:100% !important;
        }

        .grow {
            transition: all .5s ease-in-out;
        }

        .grow:hover {
            transform: scale(1.07);
        }

        .highcharts-credits {
            display: none;
        }
    </style>
@endsection
@section('content')
    <div id="dashboardApp">
        <main class="px-4">
            <div class="container-fluid p-0" id="app" v-cloak>
                <div class="row" v-show="skeleton">
                    <div class="col-xl-3 col-sm-6 col-12" v-for="skeleton in 4">
                        <skeleton-loader-vue
                            type="rect"
                            class="skeleton__custom"
                            :height="160"
                            :width="280"
                            animation="wave"
                        />
                    </div>

                    <div class="col-xl-12 col-sm-12 col-12" style="margin-top:30px">
                        <skeleton-loader-vue
                            type="rect"
                            class="skeleton__custom"
                            :height="350"
                            :width="1210"
                            animation="wave"
                        />
                    </div>
                </div>

                <div class="row" v-show="!skeleton">
                    @if(hasPermission(['admin_dashboard']))
{{--                        <div class="col-xl-3 col-sm-6 col-12">--}}
{{--                            <div class="card custom_design_blue grow">--}}
{{--                                <div class="card-body">--}}
{{--                                    <div class="row">--}}
{{--                                        <div class="col mt-0">--}}
{{--                                            <h5 class="card-title text-white">Invoice</h5>--}}
{{--                                        </div>--}}

{{--                                        <div class="col-auto">--}}
{{--                                            <div class="stat text-primary">--}}
{{--                                                <i class="align-middle" data-feather="truck"></i>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}

{{--                                    <h3 class="mt-1 mb-3 text-light">--}}
{{--                                        @{{totalInvoices>0?totalInvoices.toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g,--}}
{{--                                        ","):0}} </h3>--}}
{{--                                    <div class="mb-0">--}}
{{--                                        <div class="text-white row justify-content-end">--}}
{{--                                            @if(hasPermission(['invoice_list']))--}}
{{--                                                <a style="text-decoration: none;" class="text-white"--}}
{{--                                                   href=" {{ route('invoice.index') }} ">--}}
{{--                                                    Open Details--}}
{{--                                                </a>--}}
{{--                                            @endif--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-xl-3 col-sm-6 col-12">--}}
{{--                            <div class="card custom_design_purple grow">--}}
{{--                                <div class="card-body">--}}
{{--                                    <div class="row">--}}
{{--                                        <div class="col mt-0">--}}
{{--                                            <h5 class="card-title text-white">Receipt</h5>--}}
{{--                                        </div>--}}

{{--                                        <div class="col-auto">--}}
{{--                                            <div class="stat text-primary">--}}
{{--                                                <i class="align-middle" data-feather="users"></i>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <h3 class="mt-1 mb-3 text-light">--}}
{{--                                        @{{receipts>0?receipts.toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g,--}}
{{--                                        ","):0}} </h3>--}}
{{--                                    <div class="mb-0">--}}
{{--                                        <div class="text-white row justify-content-end">--}}
{{--                                            @if(hasPermission(['receipt_list']))--}}
{{--                                                <a style="text-decoration: none;" class="text-white"--}}
{{--                                                   href=" {{ route('receipt.index') }} ">--}}
{{--                                                    Open Details--}}
{{--                                                </a>--}}
{{--                                            @endif--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-xl-3 col-sm-6 col-12">--}}
{{--                            <div class="card custom_design_orange grow">--}}
{{--                                <div class="card-body">--}}
{{--                                    <div class="row">--}}
{{--                                        <div class="col mt-0">--}}
{{--                                            <h5 class="card-title text-white">Expense</h5>--}}
{{--                                        </div>--}}

{{--                                        <div class="col-auto">--}}
{{--                                            <div class="stat text-primary">--}}
{{--                                                <i class="align-middle" data-feather="shopping-cart"></i>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <h3 class="mt-1 mb-3 text-light">--}}
{{--                                        @{{expenses>0?expenses.toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g,--}}
{{--                                        ","):0}} </h3>--}}
{{--                                    <div class="mb-0">--}}
{{--                                        <div class="text-white row justify-content-end">--}}
{{--                                            @if(hasPermission(['expense_list']))--}}
{{--                                                <a style="text-decoration: none;" class="text-white"--}}
{{--                                                   href=" {{ route('expense.index') }} ">--}}
{{--                                                    Open Details--}}
{{--                                                </a>--}}
{{--                                            @endif--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-xl-3 col-sm-6 col-12">--}}
{{--                            <div class="card custom_design_cyan grow">--}}
{{--                                <div class="card-body">--}}
{{--                                    <div class="row">--}}
{{--                                        <div class="col mt-0">--}}
{{--                                            <h5 class="card-title text-white">Income</h5>--}}
{{--                                        </div>--}}

{{--                                        <div class="col-auto">--}}
{{--                                            <div class="stat text-primary">--}}
{{--                                                <i class="align-middle" data-feather="shopping-cart"></i>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <h3 class="mt-1 mb-3 text-light">--}}
{{--                                        @{{income.toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g,--}}
{{--                                        ",")}} </h3>--}}
{{--                                    <div class="mb-0">--}}
{{--                                        <div class="text-white row justify-content-end">--}}
{{--                                            @if(hasPermission(['balance_sheet']))--}}
{{--                                                <a style="text-decoration: none;" class="text-white"--}}
{{--                                                   href=" {{ route('reports.index') }} ">--}}
{{--                                                    Open Details--}}
{{--                                                </a>--}}
{{--                                            @endif--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                    @endif
                    @if(hasPermission(['organization_dashboard']))

{{--                        <div class="col-xl-3 col-sm-6 col-12">--}}
{{--                            <div class="card custom_design_cyan grow">--}}
{{--                                <div class="card-body">--}}
{{--                                    <div class="row">--}}
{{--                                        <div class="col mt-0">--}}
{{--                                            <h5 class="card-title text-white">Started project</h5>--}}
{{--                                        </div>--}}

{{--                                        <div class="col-auto">--}}
{{--                                            <div class="stat text-primary">--}}
{{--                                                <i class="align-middle" data-feather="shopping-cart"></i>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                        <div class="row">--}}
{{--                                        <div class="col-xl-6"><h3 class="mt-1 mb-3 text-light">--}}
{{--                                        {{$started_projects?$started_projects:0}}</h3></div>--}}
{{--                                        <div class="col-xl-6 text-light align-self-center">@{{started_project_amount.toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g,--}}
{{--                                        ",")}}  </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="mb-0">--}}
{{--                                        <a style="text-decoration: none;" class="text-white"--}}
{{--                                           data-toggle="collapse" @click="filterProjects('started')"--}}
{{--                                           href="#collapseExample" role="button"--}}
{{--                                           aria-expanded="false" aria-controls="collapseExample">--}}
{{--                                            Open Details--}}
{{--                                        </a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="col-xl-3 col-sm-6 col-12">--}}
{{--                            <div class="card custom_design_orange grow">--}}
{{--                                <div class="card-body">--}}
{{--                                    <div class="row">--}}
{{--                                        <div class="col mt-0">--}}
{{--                                            <h5 class="card-title text-white">Pending Project</h5>--}}
{{--                                        </div>--}}

{{--                                        <div class="col-auto">--}}
{{--                                            <div class="stat text-primary">--}}
{{--                                                <i class="align-middle" data-feather="shopping-cart"></i>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                        <div class="row">--}}
{{--                                        <div class="col-xl-6"><h3 class="mt-1 mb-3 text-light">--}}
{{--                                        {{$pending_projects?$pending_projects:0}}</h3></div>--}}
{{--                                        <div class="col-xl-6 text-light align-self-center">@{{pending_project_amount.toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g,--}}
{{--                                        ",")}}</div>--}}
{{--                                    </div>--}}
{{--                                    <div class="mb-0">--}}
{{--                                        <a style="text-decoration: none;" class="text-white"--}}
{{--                                           data-toggle="collapse" @click="filterProjects('pending')"--}}
{{--                                           href="#collapseExample" role="button"--}}
{{--                                           aria-expanded="false" aria-controls="collapseExample">--}}
{{--                                            Open Details--}}
{{--                                        </a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-xl-3 col-sm-6 col-12">--}}
{{--                            <div class="card custom_design_purple grow">--}}
{{--                                <div class="card-body">--}}
{{--                                    <div class="row">--}}
{{--                                        <div class="col mt-0">--}}
{{--                                            <h5 class="card-title text-white">Finished Project</h5>--}}
{{--                                        </div>--}}

{{--                                        <div class="col-auto">--}}
{{--                                            <div class="stat text-primary">--}}
{{--                                                <i class="align-middle" data-feather="users"></i>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                        <div class="row">--}}
{{--                                        <div class="col-xl-6"><h3 class="mt-1 mb-3 text-light">--}}
{{--                                        {{$finished_projects?$finished_projects:0}}</h3></div>--}}
{{--                                        <div class="col-xl-6 text-light align-self-center">--}}
{{--                                            @{{finished_project_amount.toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g,--}}
{{--                                        ",")}}</div>--}}
{{--                                    </div>--}}
{{--                                    <div class="mb-0">--}}
{{--                                        <a style="text-decoration: none;" class="text-white"--}}
{{--                                           data-toggle="collapse" @click="filterProjects('finished')"--}}
{{--                                           href="#collapseExample" role="button"--}}
{{--                                           aria-expanded="false" aria-controls="collapseExample">--}}
{{--                                            Open Details--}}
{{--                                        </a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-xl-3 col-sm-6 col-12">--}}
{{--                            <div class="card custom_design_blue grow">--}}
{{--                                <div class="card-body">--}}
{{--                                    <div class="row">--}}
{{--                                        <div class="col mt-0">--}}
{{--                                            <h5 class="card-title text-white">Paid Invoices</h5>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-auto">--}}
{{--                                            <div class="stat text-primary">--}}
{{--                                                <i class="align-middle" data-feather="truck"></i>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}

{{--                                        <div class="row">--}}
{{--                                        <div class="col-xl-6"><h3 class="mt-1 mb-3 text-light">--}}
{{--                                        {{$paidInvoices?$paidInvoices:0}}</h3></div>--}}
{{--                                        <div class="col-xl-6 text-light align-self-center">@{{paid_invoices_amount.toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g,--}}
{{--                                        ",")}} </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="mb-0">--}}
{{--                                        <a style="text-decoration: none;" class="text-white"--}}
{{--                                           data-toggle="collapse" @click="filterInvoices(1)"--}}
{{--                                           href="#invoiceCollapse" role="button"--}}
{{--                                           aria-expanded="false" aria-controls="invoiceCollapse">--}}
{{--                                            Open Details--}}
{{--                                        </a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                    @endif

{{--                    <div class="collapse" id="collapseExample">--}}
{{--                        <div class="card customCard">--}}
{{--                            <div class="card-body">--}}
{{--                                <div class="row">--}}
{{--                                <h4 class="header-title col">@{{ project_type }} Project</h4>--}}
{{--                                <div class="col text-right pb-2">--}}
{{--                                <button type="button" @click="exortToExcelSingle('all_project')" class="btn btn-success btn-sm">--}}
{{--                                    <i class="fas fa-file-excel"></i>--}}
{{--                                    <span class="ml-1">Excel</span>--}}
{{--                                    </button>--}}
{{--                                    <button type="button" @click="exportToPDF('all_project')" class="btn btn-danger btn-sm ml-1">--}}
{{--                                    <i class="fas fa-file-pdf"></i>--}}
{{--                                    <span class="ml-1">PDF</span>--}}
{{--                                    </button>--}}
{{--                                </div>--}}
{{--                                </div>--}}
{{--                                <div class="table-responsive">--}}
{{--                                    <table class="table mb-0">--}}
{{--                                        <thead>--}}
{{--                                        <tr>--}}
{{--                                            <th>#</th>--}}
{{--                                            <th>Code</th>--}}
{{--                                            <th>Name</th>--}}
{{--                                            <th>Started date</th>--}}
{{--                                            <th>End date</th>--}}
{{--                                            <th>Province</th>--}}
{{--                                            <th>Exports</th>--}}
{{--                                        </tr>--}}
{{--                                        </thead>--}}
{{--                                        <tbody>--}}
{{--                                        <tr v-for="(project,index) in projects">--}}
{{--                                            <th scope="row">@{{ ++index }}</th>--}}
{{--                                            <td>@{{ project.code }}</td>--}}
{{--                                            <td>@{{ project.name }}</td>--}}
{{--                                            <td>@{{ project.start_date }}</td>--}}
{{--                                            <td>@{{ project.end_date }}</td>--}}
{{--                                            <td>@{{ project.location }}</td>--}}

{{--                                            <td>--}}
{{--                                            <div class="row">--}}

{{--                                            <button type="button" @click="exortToExcelSingle('single_project',project.id)" class="btn btn-success btn-floating btn-sm">--}}
{{--                                                <i class="fas fa-file-excel"></i>--}}
{{--                                                </button>--}}

{{--                                                <button type="button" @click="exportToPDF('single_project',project.id)" class="btn btn-danger btn-floating btn-sm ml-1">--}}
{{--                                                <i class="fas fa-file-pdf"></i>--}}
{{--                                                </button>--}}
{{--                                            </div>--}}
{{--                                            </td>--}}
{{--                                        </tr>--}}
{{--                                        <tr v-if="projects.length<=0">--}}
{{--                                            <td colspan="7" class="text-center">No record found</td>--}}
{{--                                        </tr>--}}
{{--                                        </tbody>--}}
{{--                                    </table>--}}
{{--                                </div>--}}

{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="collapse " id="invoiceCollapse">--}}
{{--                        <div class="card customCard">--}}
{{--                            <div class="card-body">--}}
{{--                                <div class="row">--}}
{{--                                <h4 class="header-title col">@{{ invoice_type }} Invoices </h4>--}}
{{--                                <div class="col text-right pb-2">--}}
{{--                                <button type="button" @click="exortToExcelSingle('all_invoice')" class="btn btn-success btn-sm">--}}
{{--                                    <i class="fas fa-file-excel"></i>--}}
{{--                                    <span class="ml-1">Excel</span>--}}
{{--                                    </button>--}}
{{--                                    <button type="button" @click="exportToPDF('all_invoice')" class="btn btn-danger btn-sm ml-1">--}}
{{--                                    <i class="fas fa-file-pdf"></i>--}}
{{--                                    <span class="ml-1">PDF</span>--}}
{{--                                    </button>--}}
{{--                                </div>--}}
{{--                                </div>--}}
{{--                                <div class="table-responsive">--}}
{{--                                    <table class="table mb-0">--}}
{{--                                        <thead>--}}
{{--                                        <tr>--}}
{{--                                            <th>#</th>--}}
{{--                                            <th>Number</th>--}}
{{--                                            <th>Project</th>--}}
{{--                                            <th>Date</th>--}}
{{--                                            <th>Amount</th>--}}
{{--                                            <th>Currency</th>--}}
{{--                                            <th>Exports</th>--}}
{{--                                        </tr>--}}
{{--                                        </thead>--}}
{{--                                        <tbody>--}}
{{--                                        <tr v-for="(invoice,index) in invoices">--}}
{{--                                            <th scope="row">@{{ ++index }}</th>--}}
{{--                                            <td>@{{ invoice.invoice_no }}</td>--}}
{{--                                            <td>@{{ invoice.project}}</td>--}}
{{--                                            <td>@{{ invoice.date }}</td>--}}
{{--                                            <td>@{{ invoice.amount }}</td>--}}
{{--                                            <td>@{{ invoice.currency }}</td>--}}
{{--                                            <td>--}}
{{--                                            <div class="row">--}}
{{--                                            <button type="button" @click="exortToExcelSingle('single_invoice',invoice.id)" class="btn btn-success btn-floating btn-sm">--}}
{{--                                                <i class="fas fa-file-excel"></i>--}}
{{--                                                </button>--}}
{{--                                                <button  @click="exportToPDF('single_invoice',invoice.id)" type="button" class="btn btn-danger btn-floating btn-sm ml-1">--}}
{{--                                                <i class="fas fa-file-pdf"></i>--}}
{{--                                                </button>--}}
{{--                                            </div>--}}
{{--                                            </td>--}}
{{--                                        </tr>--}}
{{--                                        <tr v-if="invoices.length<=0">--}}
{{--                                            <td colspan="7" class="text-center">No record found</td>--}}
{{--                                        </tr>--}}
{{--                                        </tbody>--}}
{{--                                    </table>--}}
{{--                                </div>--}}

{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-xl-12">--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-xl-9">--}}
{{--                                <div class="">--}}
{{--                                    <div id="afgMap"></div>--}}

{{--                                </div>--}}
{{--                                <br>--}}

{{--                            </div>--}}

{{--                                <div class="col-xl-3 col-sm-6 col-12">--}}
{{--                                @if(hasPermission(['organization_dashboard']))--}}
{{--                                    <div class="card custom_design_orange grow">--}}
{{--                                        <div class="card-body">--}}
{{--                                            <div class="row">--}}
{{--                                                <div class="col mt-0">--}}
{{--                                                    <h5 class="card-title text-white">Unpaid Invoices</h5>--}}
{{--                                                </div>--}}

{{--                                                <div class="col-auto">--}}
{{--                                                    <div class="stat text-primary">--}}
{{--                                                        <i class="align-middle" data-feather="shopping-cart"></i>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                                <div class="row">--}}
{{--                                        <div class="col-xl-6"><h3 class="mt-1 mb-3 text-light">--}}
{{--                                        {{$unPaidInvoices?$unPaidInvoices:0}}</h3></div>--}}
{{--                                        <div class="col-xl-6 text-light align-self-center">@{{unpaid_invoices_amount.toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g,--}}
{{--                                        ",")}} </div>--}}
{{--                                    </div>--}}
{{--                                            <div class="mb-0">--}}
{{--                                                <a style="text-decoration: none;" class="text-white"--}}
{{--                                                   data-toggle="collapse" @click="filterInvoices(0)"--}}
{{--                                                   href="#invoiceCollapse" role="button"--}}
{{--                                                   aria-expanded="false" aria-controls="invoiceCollapse">--}}
{{--                                                    Open Details--}}
{{--                                                </a>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                @endif--}}


{{--                                @if(hasPermission(['admin_dashboard']))--}}
{{--                                <div class="card custom_design_new_blue grow">--}}
{{--                                        <div class="card-body">--}}
{{--                                            <div class="row">--}}
{{--                                                <div class="col mt-0">--}}
{{--                                                    <h5 class="card-title text-white">Commission</h5>--}}
{{--                                                </div>--}}

{{--                                                <div class="col-auto">--}}
{{--                                                    <div class="stat text-primary">--}}
{{--                                                        <i class="align-middle" data-feather="shopping-cart"></i>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="row">--}}
{{--                                                <div class="col">--}}
{{--                                                <h3 class="mt-1 mb-3 text-light">--}}
{{--                                                @{{commissions.toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g,--}}
{{--                                                ",")}}  </h3>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="mb-0">--}}
{{--                                                <div class="text-white row justify-content-end">--}}
{{--                                                    <a style="text-decoration: none;" class="text-white"--}}
{{--                                                       href=" {{ route('reports.index') }} ">--}}
{{--                                                        Open Details--}}
{{--                                                    </a>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="card custom_design_new_blue grow">--}}
{{--                                        <div class="card-body">--}}
{{--                                            <div class="row">--}}
{{--                                                <div class="col mt-0">--}}
{{--                                                    <h5 class="card-title text-white">Total Beneficiary</h5>--}}

{{--                                                </div>--}}

{{--                                                <div class="col-auto">--}}
{{--                                                    <div class="stat text-primary">--}}
{{--                                                        <i class="align-middle" data-feather="shopping-cart"></i>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                                <div class="row">--}}
{{--                                        <div class="col-xl-6"><h3 class="mt-1 mb-3 text-light">--}}
{{--                                        {{$binificiaries?$binificiaries:0}}</h3></div>--}}
{{--                                    </div>--}}
{{--                                            <div class="mb-0">--}}
{{--                                                <div class="text-white row justify-content-end">--}}
{{--                                                    <a style="text-decoration: none;" class="text-white"--}}
{{--                                                       data-toggle="collapse"--}}
{{--                                                       href="#benificiaryColl" role="button"--}}
{{--                                                       aria-expanded="false" aria-controls="benificiaryColl">--}}
{{--                                                        Open Details--}}
{{--                                                    </a>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                @endif--}}
{{--                            </div>--}}

{{--                                </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="collapse" id="benificiaryColl">--}}
{{--                    <div class="card">--}}
{{--                                <div class="card-body">--}}
{{--                                    <div class="row">--}}
{{--                                        <h4 class="header-title col">Total Beinificiary </h4>--}}
{{--                                        <div class="col text-right pb-2">--}}
{{--                                            <button type="button" @click="exortToExcelSingle('all_beneficiary')" class="btn btn-success btn-sm">--}}
{{--                                                <i class="fas fa-file-excel"></i>--}}
{{--                                                <span class="ml-1">Excel</span>--}}
{{--                                            </button>--}}
{{--                                            <button @click="exportToPDF('all_beneficiary')" type="button" class="btn btn-danger btn-sm ml-1">--}}
{{--                                                <i class="fas fa-file-pdf"></i>--}}
{{--                                                <span class="ml-1">PDF</span>--}}
{{--                                            </button>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}

{{--                                    <div class="table-responsive">--}}
{{--                                        <table class="table mb-0">--}}
{{--                                            <thead>--}}
{{--                                            <tr>--}}
{{--                                                <th>#</th>--}}
{{--                                                <th>Project</th>--}}
{{--                                                <th>Location</th>--}}
{{--                                                <th>Amount</th>--}}
{{--                                            </tr>--}}
{{--                                            </thead>--}}
{{--                                            <tbody>--}}
{{--                                            <tr v-for="(project,index) in projectList">--}}
{{--                                                <th scope="row">@{{ ++index }}</th>--}}
{{--                                                <td>@{{ project.name }}</td>--}}
{{--                                                <td>@{{ project.location }}</td>--}}
{{--                                                <td>@{{ project.total_beneficiary }}</td>--}}
{{--                                            </tr>--}}
{{--                                            </tbody>--}}
{{--                                        </table>--}}
{{--                                    </div>--}}

{{--                                </div>--}}
{{--    </div>--}}
                </div>
            </div>
        </main>


    </div>
@endsection
@section('js')
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/highmaps/6.0.3/highmaps.js" integrity="sha512-A1i/M0xG1urLv4HcEU7aZkEPsrBW4cCm+E0Pt5vngrwk9fV7fYmLmapO1BPeuxos7z3yz4X4L3wO0/RmovWRJw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>-->

    <script src="{{asset('plugins/map/highmaps.js')}}"></script>
    <script src="{{asset('plugins/map/exporting.js')}}"></script>
    <!--<script src="{{asset('plugins/map/highcharts.js')}}"></script>-->

    <!-- Chart JS -->

    <script type="text/javascript" src="{{asset('plugins/map/loader.js') }}"></script>

    <script>
        var myChar = {};

        let vm = new Vue({
            el: '#dashboardApp',
            components: {
                'skeleton-loader-vue': window.VueSkeletonLoader,
            },
            data() {

                return {
                    skeleton: true,


                    province: [],
                    projects: [],
                    invoices: [],
                    project_type: 'started',
                    invoice_type: 'Paid',

                    selectedProvince: '',

                    selectedProvinceId: ''

                }
            },
            watch: {},

            mounted(){

            },
            computed: {},
            methods: {
                getMapfunction(){
                        axios.get("{{asset('plugins/map/af-all.topo.json')}}")
                        .then((response) => {
                            var topology = response.data;
                            let data = [
                                ['af-kt', 340], ['af-pk', 11], ['af-gz', 12], ['af-bd', 13],
                                ['af-nr', 201], ['af-kr', 300], ['af-kz', 400], ['af-ng', 488],
                                ['af-tk', 218], ['af-bl', 19], ['af-kb', 600], ['af-kp', 800],
                                ['af-pj', 20000], ['af-la', 1002], ['af-lw', 1005], ['af-pv', 1007],
                                ['af-sm', 156], ['af-vr', 133], ['af-pt', 105], ['af-bg', 123],
                                ['af-hr', 200], ['af-bk', 10008], ['af-jw', 6002], ['af-bm', 444444],
                                ['af-gr', 34], ['af-fb', 523], ['af-sp', 36], ['af-fh', 10010],
                                ['af-hm', 5002], ['af-nm', 0], ['af-dy', 5007], ['af-oz', 10000],
                                ['af-kd', 10002], ['af-zb', 10001]
                            ];


                            for (var i = 0; i < data.length; i++) {

                                let f_province = _.find(vm.clientCountByProvince, (f) => f.proCode === data[i][0]);

                                data[i][1] = 0;
                                if (f_province) {
                                    data[i][1] = f_province.clientsTotal;
                                } else {


                                }


                            }


                            // Create the chart
                            var chart = Highcharts.mapChart('afgMap', {
                                chart: {
                                    map: topology,
                                },

                                title: {
                                    text: '',
                                    style: {
                                        display: 'none'
                                    }
                                },
                                subtitle: {
                                    text: '',
                                    style: {
                                        display: 'none'
                                    }
                                },
                                mapNavigation: {
                                    enabled: true,
                                    buttonOptions: {
                                        verticalAlign: 'top'
                                    },
                                    enableDoubleClickZoomTo: true
                                },

                                legend: {
                                    title: {
                                        style: {
                                            color: ( // theme
                                                Highcharts.defaultOptions &&
                                                Highcharts.defaultOptions.legend &&
                                                Highcharts.defaultOptions.legend.title &&
                                                Highcharts.defaultOptions.legend.title.style &&
                                                Highcharts.defaultOptions.legend.title.style.color
                                            ) || 'black'
                                        }
                                    },
                                    align: 'left',
                                    verticalAlign: 'bottom',
                                    floating: true,
                                    layout: 'horzintal',
                                    valueDecimals: 0,
                                    backgroundColor: ( // theme
                                        Highcharts.defaultOptions &&
                                        Highcharts.defaultOptions.legend &&
                                        Highcharts.defaultOptions.legend.backgroundColor
                                    ) || 'rgba(255, 255, 255, 0.1)',
                                    symbolRadius: 0,
                                    symbolHeight: 14
                                },
                                // colorAxis: {
                                //     min: 10,
                                // },
                                colorAxis: {
                                    dataClasses: [{
                                        to: 0
                                    }, {
                                        from: 1,
                                        to: 100
                                    }, {
                                        from: 101,
                                        to: 500
                                    }, {
                                        from: 501,
                                        to: 1000
                                    }, {
                                        from: 1001,
                                        to: 5000
                                    }, {
                                        from: 5001,
                                        to: 10000
                                    }, {
                                        to: 10001
                                    }]
                                },
                                series: [{
                                    joinBy: ['hc-key'],
                                    animation: {
                                        duration: 1000
                                    },
                                    point: {
                                        events: {
                                            // load: function () {
                                            // this.mapZoom(0.5, 100, 100);
                                            // },
                                            click: function () {
                                                var point = this;
                                                let f_province_id = _.find(vm.province, (f) => f.dashboard_client_code === point['hc-key']);

                                                let proId = f_province_id.id;
                                                // this.selectedProvince = point['hc-key'];
                                                // this.selectedProvinceId = proId;


                                                point.zoomTo();
                                                point.select();
                                            }
                                        }
                                    },
                                    data: data.map(elem => {
                                        if (elem[1] == 0) {
                                            elem.push('#FFFFFF')
                                        } else if (elem[1] > 0 && elem[1] < 100) {
                                            elem.push('#DEEAF6');
                                        } else if (elem[1] > 101 && elem[1] < 500) {
                                            elem.push('#BDD6EE');
                                        } else if (elem[1] > 501 && elem[1] < 1000) {
                                            elem.push('#9CC2E5')
                                        } else if (elem[1] > 1001 && elem[1] < 5000) {
                                            elem.push('#5B9BD5')
                                        } else if (elem[1] > 5001 && elem[1] < 10000) {
                                            elem.push('#2E74B5')
                                        } else {
                                            elem.push('#1F4EAB')
                                        }

                                        return elem;
                                    }),

                                    keys: ['hc-key', 'value', 'color'],
                                    name: 'Total Project',
                                    states: {
                                        hover: {
                                            color: '#FCFFC5'
                                        },
                                        select: {
                                            color: '#a4edba'
                                        }
                                    },
                                    dataLabels: {
                                        enabled: true,
                                        format: '{point.name}'
                                    }
                                }]
                            });


                        })
                        .catch((error) => {
                            console.log(error);
                        });
                },
                filterProjects(type) {
                    this.projects = this.projectList.filter(invoice => invoice.status == type);
                    this.project_type = type;
                },
                filterInvoices(type) {
                    this.invoices = this.invoiceList.filter(pro => pro.status == type);
                    this.project_type = type == 1 ? 'Paid' : 'Unpaid';
                },
                exortToExcelSingle(type,id=null){
                    new Promise((resolve, reject)=>{
                        let data =[];
                        const formData = new FormData();
                        if(type =='all_project'){
                            data=this.projectList;
                        }
                        if(type=='single_project'){
                            data = this.projectList.filter(pro => pro.id == id);
                        }
                        if(type =='all_invoice'){
                            data=this.invoiceList;
                        }
                        if(type =='single_invoice'){
                            data = this.invoiceList.filter(pro => pro.id == id)
                        }
                        if(type=='all_beneficiary'){
                            data = this.projectList;
                        }
                         formData.append("data", JSON.stringify(data));
                            axios({
                                method: "post",
                                url: "excel?type=" + type,
                                responseType: "blob",
                                data: formData
                            }).then(response=>{
                                console.log('for test:',response.data);
                                resolve('response');

                                let Fformat= ".xlsx";
                                var fileURL = window.URL.createObjectURL(new Blob([response.data]));
                                var fileLink = document.createElement("a");
                                fileLink.href = fileURL;
                                fileLink.setAttribute("download", "project.xlsx");
                                document.body.appendChild(fileLink);
                                fileLink.click();
                             })
                             .catch((error) => {
                                reject(error);
                                console.log(error);
                            });
                    }).then(()=>resolve('data')).catch(e=>reject(e));
                },
                exportToPDF(type,id=null){
                    new Promise((resolve, reject)=>{
                        let data =[];
                        const formData = new FormData();
                        if(type =='all_project'){
                            data=this.projectList;
                        }
                        if(type=='single_project'){
                            data = this.projectList.filter(pro => pro.id == id);
                        }
                        if(type =='all_invoice'){
                            data=this.invoiceList;
                        }
                        if(type =='single_invoice'){
                            data = this.invoiceList.filter(pro => pro.id == id)
                        }
                        if(type=='all_beneficiary'){
                            data = this.projectList;
                        }
                         formData.append("data", JSON.stringify(data));
                            axios({
                                method: "post",
                                url: "pdf?type=" + type,
                                responseType: "blob",
                                data: formData
                            }).then(response=>{
                                console.log('for test:',response.data);
                                resolve('response');

                                let Fformat= ".xlsx";
                                var fileURL = window.URL.createObjectURL(new Blob([response.data]));
                                var fileLink = document.createElement("a");
                                fileLink.href = fileURL;
                                fileLink.setAttribute("download", type+".pdf");
                                document.body.appendChild(fileLink);
                                fileLink.click();
                             })
                             .catch((error) => {
                                reject(error);
                                console.log(error);
                            });
                    }).then(()=>resolve('data')).catch(e=>reject(e));
                },

                firstDashboardLoad() {
                    axios.get("{{url('dashboardData')}}")
                        .then((response) => {
                            this.getMapfunction()
                            this.skeleton = false;
                            this.province = response.data.province;

                            this.clientCountByProvince = response.data.clientCountByProvince;
                            this.clientsTotalAllPro = response.data.clientsTotalAllPro;

                            let monthsName = response.data.keyss;
                            let totalMonths = response.data.valuess;
                            this.$forceUpdate();


                        })
                        .catch((error) => {
                            console.log(error);
                        });

                },

            },

        });




    </script>
@endsection
