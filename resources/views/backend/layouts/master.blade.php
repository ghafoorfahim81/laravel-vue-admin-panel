<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8"/>
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description"/>
    <meta content="Themesdesign" name="author"/>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">


    <!-- Bootstrap Css -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
    <!-- Icons Css -->
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css"/>
    <!-- App Css-->
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css"/>
    <!-- Custom css-->
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet" type="text/css"/>
    <!-- <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/libs/alertifyjs/build/css/alertify.min.css') }}" rel="stylesheet" type="text/css" /> -->
    <!-- <link href="{{ asset('assets/quasar/quasar.prod.css') }}" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/quasar@2.7.5/dist/quasar.prod.css" rel="stylesheet" type="text/css"> -->

    <style>
        /* #main-navbar {
          max-height: 46.59px;
        } */

        li a.waves-effect:hover {
            background-color: #c7e9ff;
            box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
            border-radius: 5px;
            border: solid white 2px;
        }

        li a.waves-effect:hover ~ li a.waves-effect div i {
            color: white !important;
        }

        .bg-custom_sidebar_li {
            background-color: #c7e9ff;
            box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
            border-radius: 5px;
            border: solid white 2px;
        }

        /* li a.waves-effect:hover ~ .white__onhover {
            color: white !important;
        } */


        /* li a.waves-effect:visited {
            background-color: #1da1f2;
            color: white !important
        } */
    </style>
    <!-- Font Awesome -->
    <link
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        rel="stylesheet"
    />
    <!-- <link href="{{ asset('assets/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" /> -->
    <!-- Google Fonts -->

    <!-- MDB -->
    <!-- <link
    href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.2.0/mdb.min.css"
    rel="stylesheet"
    /> -->

    <link href="{{ asset('assets/css/mdbootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
    <!-- MDB -->
    <!-- <script
      type="text/javascript"
      src="https://cdnjs.clouvdflare.com/ajax/libs/mdb-ui-kit/4.2.0/mdb.min.js"
    ></script> -->


    @yield('css')
</head>

<body data-topbar="colored">

<!-- Begin page -->
<div id="layout-wrapper">
<!-- style="background-image: linear-gradient(to top, #e6e9f0 0%, #eef1f5 100%);" -->

    <nav
        style="background: #1daff2"
        id="main-navbar"
        class="navbar  navbar-expand-lg navbar-light  fixed-top p-0"

    >
        <!-- Container wrapper -->
        <div class="container-fluid">

            <div class="d-flex">
                <button style="box-shadow: none" type="button" class="btn btn-sm text-white  pr-3 font-size-24 waves-effect"
                        id="vertical-menu-btn">
                    <i class="mdi mdi-backburger"></i>
                </button>

                <!-- Brand -->
                <a class="navbar-brand text-white" href="#">
                <!-- <img style="max-height: 40px" src="{{ asset('assets/logo/logo.png') }}" alt="user-image" class="mr-2" > -->
                <?php
//                    $logo =isset(DB::table('companies')->where('id',auth()->user()->current_company)->first()->logo)?DB::table('companies')->where('id',auth()->user()->current_company)->first()->logo:'';
//                    $name =isset(DB::table('companies')->where('id',auth()->user()->current_company)->first()->name)?DB::table('companies')->where('id',auth()->user()->current_company)->first()->name:'';

                ?>
                <!-- https://uat.medref.unhcr.org/ressources/logo/unhcr.svg -->
{{--                @if($logo)--}}
{{--                <img style="max-height: 40px;" src="{{url('storage/logos/'.$logo)}}" alt="user-image" class="mr-2" >--}}
{{--                @endif--}}
                    <!-- <span>{{auth()->user()->name}}</span> -->
                   Salamat Organic website admin panel



                </a>
            </div>

            <!-- Right links -->
            <div class="d-inline-flex align-items-center">


                <div class="dropdown d-inline-block" id="myavatar-app" v-cloak>
                    <button style="box-shadow: none"  type="button" class="btn text-white waves-effect py-0" id="page-header-user-dropdown"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php
                        $photo = auth()->user()->profile_photo_path;

                        ?>

                        @if($photo)
                            <img class="rounded-circle header-profile-user" src="{{ url('/') . '/' . $photo }}"
                                 alt="{{ Auth::user()->name }}" style="width:45px"
                                 onerror="this.src='{{ myUrl() }}no_image.png';">
                        @else
                            <avatar :username="'{{ Auth::user()->name }} '" class="rounded-circle header-profile-user"
                                    style="display:inline;padding:5px 10px"></avatar>
                        @endif
                        <span class="d-none d-sm-inline-block ml-1">{{ Auth::user()->name }}</span>
                        <i class="mdi mdi-chevron-down d-none d-sm-inline-block"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <!-- item-->

                        <a class="dropdown-item" href="{{ route('user.profile',Auth::user()->id) }}">
                            <i class="fas fa-user-circle fa-lg mr-2"></i>Profile
                        </a>

                        <hr class="m-0 "/>
                        @if(hasPermission(['setting']))
                            <a class="dropdown-item" href="{{ route("setting") }}">
                                <i class="fas fa-cog fa-lg mr-2"></i>Setting
                            </a>
                        @endif

                        <hr class="m-0 "/>

                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            <i class="fa fa-sign-out fa-lg mr-2"></i>Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>

        </div>
        <!-- Container wrapper -->
    </nav>

    <!-- ========== Left Sidebar Start ========== -->
    <div class="vertical-menu">

        <!-- <div data-simplebar class="h-100" id="sidebar-app"> -->
        <div data-simplebar class="h-100" id="sidebar-app" >

            <!--- Sidemenu -->
            <div id="sidebar-menu" >
                <!-- Left Menu Start -->

                <ul class="metismenu list-unstyled pt-2 px-2 " id="side-menu">


                    <!-- {{ (request()->is('transactions.index')) ? 'bg-light-blue-7 text-white mx-3 shadow-lg p-2 rounded border border-white' : '' }} -->
                    @if(hasPermission(['dashboard_show']))
                    <li class="{{ (request()->is('/*')) ? 'bg-custom_sidebar_li' : '' }}">
                        <a href=" {{ route('dashboard') }} " class="waves-effect ">
                            <div class="d-inline-block icons-sm mr-1"><i style="color: #1da1f2" class="fas fa-chart-area"></i></div>
                            <span >Dashboard</span>
                        </a>
                    </li>
                    @endif
                    @if(hasPermission(['category_list']))
                    <li class="{{ (request()->is('categories*')) ? 'bg-custom_sidebar_li' : '' }}">
                        <a href=" {{ route('categories.index') }} " class="waves-effect ">
                            <div class="d-inline-block icons-sm mr-1"><i style="color: #1da1f2" class="fas fa-list-alt"></i></div>
                            <span >Category</span>
                        </a>
                    </li>
                    @endif
                    @if(hasPermission(['product_list']))
                    <li class="{{ (request()->is('products')) ? 'bg-custom_sidebar_li' : '' }}">
                        <a href=" {{ route('products.index') }} " class="waves-effect ">
                            <div class="d-inline-block icons-sm mr-1"><i style="color: #1da1f2" class="fas fa-file-invoice-dollar"></i></div>
                            <span >Product</span>
                        </a>
                    </li>
                    @endif
                    @if(hasPermission(['about_us_list']))
                    <li class="{{ (request()->is('about-us*')) ? 'bg-custom_sidebar_li' : '' }}">
                        <a href=" {{ route('about-us.index') }} " class="waves-effect ">
                            <div class="d-inline-block icons-sm mr-1"><i style="color: #1da1f2" class="fas fa-file-alt"></i></div>
                            <span >About us</span>
                        </a>
                    </li>
                    @endif
                    @if(hasPermission(['contact_us_list']))
                    <li class="{{ (request()->is('contact-us*')) ? 'bg-custom_sidebar_li' : '' }}">
                        <a href=" {{ route('contact-us.index') }} " class="waves-effect">
                            <div class="d-inline-block icons-sm mr-1"><i style="color: #1da1f2" class="fas fa-receipt"></i></div>
                            <span >Contact us</span>
                        </a>
                    </li>
                    @endif

                    @if(hasPermission(['comment_list']))
                    <li class="{{ (request()->is('comment*')) ? 'bg-custom_sidebar_li' : '' }}">
                        <a href=" {{ route('comment.index') }} " class="waves-effect">
                            <div class="d-inline-block icons-sm mr-1"><i style="color: #1da1f2" class="fas fa-briefcase"></i></div>
                            <span >Comments</span>
                        </a>
                    </li>
                    @endif

                    @if(hasPermission(['blog_list']))
                    <li class="{{ (request()->is('blog*')) ? 'bg-custom_sidebar_li' : '' }}">
                        <a href=" {{ route('blog.index') }} " class="waves-effect">
                            <div class="d-inline-block icons-sm mr-1"><i style="color: #1da1f2" class="fas fa-chart-bar"></i></div>
                            <span >Blog</span>
                        </a>
                    </li>
                    @endif
                    @if(hasPermission(['blog_list']))
                    <li class="{{ (request()->is('site-info*')) ? 'bg-custom_sidebar_li' : '' }}">
                        <a href=" {{ route('site-info.index') }} " class="waves-effect">
                            <div class="d-inline-block icons-sm mr-1"><i style="color: #1da1f2" class="fas fa-chart-bar"></i></div>
                            <span >Site Info</span>
                        </a>
                    </li>
                    @endif

                    @if(hasPermission(['blog_list']))
                    <li class="{{ (request()->is('post-category*')) ? 'bg-custom_sidebar_li' : '' }}">
                        <a href=" {{ route('post-category.index') }} " class="waves-effect">
                            <div class="d-inline-block icons-sm mr-1"><i style="color: #1da1f2" class="fas fa-chart-bar"></i></div>
                            <span >Post Category</span>
                        </a>
                    </li>
                    @endif

                    @if(hasPermission(['user_list'])
                    || hasPermission(['role_list']))
                        <!-- <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <div class="d-inline-block icons-sm mr-1"><i class="fa fa-user-tie menu-icon-color"></i>
                                </div>
                                <span>@lang('lang.user_management')</span>
                            </a>
                        </li> -->
                        @if(hasPermission(['user_list']))
                            <li class="my-2 {{ (request()->is('user*')) ? 'bg-custom_sidebar_li' : '' }}">
                                <a href="{{ route('user.index') }}" class="waves-effect">
                                    <div class="d-inline-block icons-sm mr-1"><i style="color: #1da1f2" class="fas fa-user-alt"></i></div>
                                     <span>@lang('lang.users')</span>
                                </a>
                            </li>
                        @endif

                        @if(hasPermission(['role_list']))
                            <li class="{{ (request()->is('role*')) ? 'bg-custom_sidebar_li' : '' }}">
                                <a href="{{ route('role.index') }}" class="waves-effect">
                                    <div class="d-inline-block icons-sm mr-1"><i style="color: #1da1f2" class="fas fa-user-cog"></i></div>
                                     <span>@lang('lang.user_role')</span>
                                </a>
                            </li>
                        @endif
                    @endif




                    @if(hasPermission(['user_list'])
                    || hasPermission(['role_list']))
                        <li>
                            <!-- <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <div class="d-inline-block icons-sm mr-1"><i class="fas fa-user-tie"></i>
                            </div>
                            <span>@lang('lang.user_management')</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            @if(hasPermission(['user_list']))
                                <li><a href="{{ route('user.index') }}">@lang('lang.users')</a></li>


                            @endif
                            @if(hasPermission(['role_list']))
                                <li><a href="{{ route('role.index') }}">@lang('lang.roles')</a></li>


                            @endif
                            </ul> -->

                            <!-- <div class="accordion accordion-flush" id="accordionFlushExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingOne">
                                <button
                                    class="accordion-button collapsed"
                                    type="button"
                                    data-mdb-toggle="collapse"
                                    data-mdb-target="#flush-collapseOne"
                                    aria-expanded="false"
                                    aria-controls="flush-collapseOne"
                                >
                                <div class="d-inline-block icons-sm mr-1"><i class="fas fa-user-tie"></i>
                            </div>
                                <span>@lang('lang.user_management')</span>
                                </button>
                                </h2>
                                <div
                                id="flush-collapseOne"
                                class="accordion-collapse collapse"
                                aria-labelledby="flush-headingOne"
                                data-mdb-parent="#accordionFlushExample"
                                >
                                <div class="accordion-body">
                                    <ul class="sub-menu" aria-expanded="false">
                                        @if(hasPermission(['user_list']))
                                <li><a class="p-0" href="{{ route('user.index') }}">@lang('lang.users')</a></li>


                            @endif
                            @if(hasPermission(['role_list']))
                                <li><a class="p-0 mt-3" href="{{ route('role.index') }}">@lang('lang.roles')</a></li>


                            @endif
                            </ul>
                        </div>
                        </div>
                    </div>
                </div> -->

                        </li>
                    @endif
                </ul>

            </div>
            <!-- Sidebar -->
        </div>
    </div>
    <!-- Left Sidebar End -->

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">
        <!-- end page title end breadcrumb -->
        <div class="page-content" style="padding-bottom: 5px;">
            <!-- Page-Title -->
            <div class="page-title-box bg-transparent px-4 pb-5 pt-0">
                <div class="container-fluid  shadow-lg p-2 bg-custom_sidebar_li">
                    <div class="row align-items-center">
                        <div class="row">
                            <a class="text-secondary w-auto align-self-center ml-2 py-2 row   border-white"
                               href="javascript: void(0);" onclick="history.back()"><i
                                    class="fa fa-arrow-left  fa-lg" style="color: #0078e0"></i></a>
                            <div class="align-self-center w-auto">
                                <span class="text-xl h4 font-weight-bold " style="color: #0078e0">@yield('title')</span>
                            </div>
                            <!-- <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a class="text-secondary" href="javascript: void(0);" onclick="history.back()">@lang('lang.back')</a></li>
                                <li class="breadcrumb-item active text-secondary">@yield('title')</li>
                            </ol> -->
                        </div>
                        <div class="col-md-4">
                            <div class="float-right d-none d-md-block">
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- end page title end breadcrumb -->
            @yield('content')
            <!-- end page-content-wrapper -->
        </div>
        <!-- End Page-content -->
    </div>
    <!-- end main content-->

</div>
<!-- END layout-wrapper -->

<!-- /Right-bar -->

<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>

<!-- JAVASCRIPT -->

<script src="{{ asset('assets/js/mdbootstrap.min.js') }}"></script>
<script src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script>
<script src="{{asset('assets/libs/tinymce/tinymce.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/libs/ckeditor4/ckeditor.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/js/pages/form-editor.init.js')}}" type="text/javascript"></script>

<script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<script src="{{ asset('assets/libs/metismenu/metisMenu.min.js') }}"></script>
<script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>

<script src="{{ asset('https://unicons.iconscout.com/release/v2.0.1/script/monochrome/bundle.js') }}"></script>


<script src="{{ asset('assets/js/app.js') }}"></script>
<!-- Custom js -->
<script src="{{ asset('js/custom.js') }}"></script>

<script src="{{ asset('assets/libs/alertifyjs/build/alertify.min.js') }}"></script>

<script src="{{ asset('assets/js/pages/alertifyjs.init.js') }}"></script>


<script src="{{ asset('js/app.js') }}"></script>


<script>
    @if(App::getLocale() == 'fa' || App::getLocale() == 'pa')
    Validator.localize('fa');
    @else
    Validator.localize('en');
    @endif

    // block ui for event
    function toggleBlock(type = true) {
        if (type == true) {
            $('#btn-loading').removeAttr('hidden');
        } else {
            $('#btn-loading').attr('hidden', true);
        }
    }

    function numToWord(num) {
        if ((num = num.toString()).length > 9) return 'overflow';
        n = ('000000000' + num).substr(-9).match(/^(\d{2})(\d{2})(\d{2})(\d{1})(\d{2})$/);
        if (!n) return;
        var str = '';
        str += (n[1] != 0) ? (a[Number(n[1])] || b[n[1][0]] + ' ' + a[n[1][1]]) + 'crore ' : '';
        str += (n[2] != 0) ? (a[Number(n[2])] || b[n[2][0]] + ' ' + a[n[2][1]]) + 'lakh ' : '';
        str += (n[3] != 0) ? (a[Number(n[3])] || b[n[3][0]] + ' ' + a[n[3][1]]) + 'thousand ' : '';
        str += (n[4] != 0) ? (a[Number(n[4])] || b[n[4][0]] + ' ' + a[n[4][1]]) + 'hundred ' : '';
        str += (n[5] != 0) ? ((str != '') ? 'and ' : '') + (a[Number(n[5])] || b[n[5][0]] + ' ' + a[n[5][1]]) + 'only ' : '';
        return str;
    }

    // promp delete alert
    function deleteConfirm(msg = '') {
        var msg = (msg != '') ? msg : "{{ __('lang.delete_msg') }}";
        var r = confirm(msg);
        if (r == true) {
            return true;
        } else {
            return false;
        }
    }

    function deleteItem(url, customeData = []) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                // console.log('test delete', JSON.stringify(customeData));
                // const formData = new FormData();
                // formData.append('', customeData);
                let ids = {ids:customeData };
                axios.post(url, ids)
                    .then((response) => {
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                toast.addEventListener('mouseleave', Swal.resumeTimer)
                            }
                        });

                        if (response.data.result == 0) {

                            Toast.fire({
                                icon: 'danger',
                                title: response.data.message
                            });
                        } else {

                            Toast.fire({
                                icon: 'success',
                                title: response.data.message
                            });
                            vm.getRecord();
                        }
                    })
                    .catch((error) => {
                        let msg = "@lang('message.error')";
                        alertify.error(msg);
                    });
            } else {


            }
        })
    }

    function toastSuccess(message, type = 'success') {
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })
        Toast.fire({
            icon: type,
            title: message
        })
    }
</script>
<script>

    var messageApp = new Vue({
        // el: '#mymessage-app',
        components: {
            'avatar': window.Avatar
        },
        data: {
            messages: [],


        },
        computed: {},
        mounted: function () {


        },
        methods: {
            // getUnreadMessage: _.debounce(() => {

            // }, 200),

            markAllAsRead() {


            },
            formatDate(date = '') {
                let result = '';
                if (date != '' && date.length > 9) {
                    result = date.slice(0, 10);
                }
                return result;
            }

        }
    });


    function notifyMe(message = '') {
        // Let's check if the browser supports notifications
        if (!("Notification" in window)) {
            console.log('This browser does not support desktop notification')
        } else if (Notification.permission === "granted") {
            // If it's okay let's create a notification
            var notification = new Notification(message);
        } else if (Notification.permission !== "denied") {
            Notification.requestPermission().then(function (permission) {
                // If the user accepts, let's create a notification
                if (permission === "granted") {
                    var notification = new Notification(message);
                }
            });
        }

    }


    var avatarApp = new Vue({
        el: '#myavatar-app',
        components: {
            'avatar': window.Avatar
        },
        data: {},

        mounted: function () {

        },
        methods: {}
    });


    var sideBar = new Vue({
        el: '#sidebar-app',
        components: {},
        data: {
            activeRoute: 'dashboard'
        },

        mounted: function () {

        },
        methods: {}
    });


</script>
<script src="https://rawgit.com/RobinHerbots/jquery.inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>
@yield('js')
@stack('scripts')
</body>

</html>
