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

<main class="px-4">
    <div class="container-fluid p-0" id="app" v-cloak>
        <div class="row" v-show="skeleton">
            <!-- <div class="col-xl-3 col-sm-6 col-12" v-for="skeleton in 4">
                <skeleton-loader-vue
                    type="rect"
                    class="skeleton__custom"
                    :height="160"
                    :width="280"
                    animation="wave"
                />
                </div>
            </div> -->

            <div class="row" >
                        <div class="col-xl-3 col-sm-6 col-12">
                            <div class="card custom_design_blue grow">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col mt-0">
                                            <h5 class="card-title text-white">Invoice</h5>
                                        </div>

                                        <div class="col-auto">
                                            <div class="stat text-primary">
                                                <i class="align-middle" data-feather="truck"></i>
                                            </div>
                                        </div>
                                    </div>

                                    <h3 class="mt-1 mb-3 text-light">@{{invoices>0?invoices.toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g,
                                        ","):0}} {{homeCurrency()['symbol']}}</h3>
                                    <div class="mb-0">
                                        <div class="text-white row justify-content-end">
                                            @if(hasPermission(['invoice_list']))
                                                <a style="text-decoration: none;" class="text-white"
                                                   href=" {{ route('invoice.index') }} ">
                                                    Open Details
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6 col-12">
                            <div class="card custom_design_purple grow">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col mt-0">
                                            <h5 class="card-title text-white">Projects</h5>
                                        </div>

                                        <div class="col-auto">
                                            <div class="stat text-primary">
                                                <i class="align-middle" data-feather="users"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <h3 class="mt-1 mb-3 text-light">@{{projects>0?projects.toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g,
                                        ","):0}} {{homeCurrency()['symbol']}}</h3>
                                    <div class="mb-0">
                                        <div class="text-white row justify-content-end">
                                            @if(hasPermission(['project_list']))
                                                <a style="text-decoration: none;" class="text-white"
                                                   href=" {{ route('project.index') }} ">
                                                    Open Details
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6 col-12">
                            <div class="card custom_design_orange grow">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col mt-0">
                                            <h5 class="card-title text-white">Expense</h5>
                                        </div>

                                        <div class="col-auto">
                                            <div class="stat text-primary">
                                                <i class="align-middle" data-feather="shopping-cart"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <h3 class="mt-1 mb-3 text-light">
                                        @{{expenses>0?expenses.toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g,
                                        ","):0}} {{homeCurrency()['symbol']}}</h3>
                                    <div class="mb-0">
                                        <div class="text-white row justify-content-end">
                                            @if(hasPermission(['expense_list']))
                                                <a style="text-decoration: none;" class="text-white"
                                                   href=" {{ route('expense.index') }} ">
                                                    Open Details
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6 col-12">
                            <div class="card custom_design_cyan grow">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col mt-0">
                                            <h5 class="card-title text-white">Payments</h5>
                                        </div>

                                        <div class="col-auto">
                                            <div class="stat text-primary">
                                                <i class="align-middle" data-feather="shopping-cart"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <h3 class="mt-1 mb-3 text-light">
                                        @{{payments>0?payments.toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g,
                                        ","):0}} {{homeCurrency()['symbol']}}</h3>
                                     
                                </div>
                            </div>
                        </div>
                             <div class="col-xl-3 col-sm-6 col-12">
                            <div class="card custom_design_cyan grow">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col mt-0">
                                            <h5 class="card-title text-white">Receipts</h5>
                                        </div>

                                        <div class="col-auto">
                                            <div class="stat text-primary">
                                                <i class="align-middle" data-feather="shopping-cart"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <h3 class="mt-1 mb-3 text-light">
                                        @{{receipts>0?receipts.toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g,
                                        ","):0}} {{homeCurrency()['symbol']}}</h3>
                                    <div class="mb-0">
                                        <div class="text-white row justify-content-end">
                                            @if(hasPermission(['receipt_list']))
                                                <a style="text-decoration: none;" class="text-white"
                                                   href=" {{ route('receipt.index') }} ">
                                                    Open Details
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
        </div>
    </div>
</main>


@endsection
@section('js')


    <!-- Chart JS -->

    <!-- <script type="text/javascript" src="{{asset('plugins/map/loader.js') }}"></script> -->
    <script src="{{asset('plugins/map/highmaps.js')}}"></script>
    <script src="{{asset('plugins/map/exporting.js')}}"></script>
    <script src="{{asset('plugins/map/highcharts.js')}}"></script>
    <script>

        let vm = new Vue({
            el: '#app',
            components: {
                'skeleton-loader-vue': window.VueSkeletonLoader,
            },
            data() {
                return {
                    skeleton: true,
                    invoices: {!! $totalInvoices>0?$totalInvoices:0 !!},
                    expenses: {!! $totalExpenses>0?$totalExpenses:0 !!},
                    payments: {!! $totalPayments>0?$totalPayments:0 !!},
                    projects: {!! $totalProject>0?$totalProject:0 !!},
                     receipts: {!! $totalReceipts>0?$totalReceipts:0 !!},
                    
                    

                    // skeleton: true,
                }
            }
        })
        </script>
@endsection
