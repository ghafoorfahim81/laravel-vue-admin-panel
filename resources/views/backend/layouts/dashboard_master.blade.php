<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesdesign" name="author" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">


    <!-- Bootstrap Css -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Custom css-->
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/libs/alertifyjs/build/css/alertify.min.css') }}" rel="stylesheet" type="text/css" />


    @yield('css')
</head>

<body data-topbar="colored">

    <!-- Begin page -->
    <div id="layout-wrapper">

        <header id="page-topbar">
            <div class="navbar-header">
                <div class="d-flex">
                    <!-- LOGO -->
                    <div class="navbar-brand-box">
                        <a href="index.html" class="logo logo-dark">
                            <span class="logo-sm">
                                <img src="{{ asset('assets/images/company_logo/left-logo.png') }}" alt="" height="10">
                            </span>
                            <span class="logo-lg">
                                <img src="{{ asset('assets/images/company_logo/left-logo.png') }}" alt="" height="50">
                            </span>
                        </a>

                    </div>

                    <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect"
                        id="vertical-menu-btn">
                        <i class="mdi mdi-backburger"></i>
                    </button>

                    <!-- App Search-->
                    <form class="app-search d-none d-lg-block">
                        <div class="position-relative">
                            <input type="text" class="form-control" placeholder="Search...">
                            <span class="mdi mdi-magnify"></span>
                        </div>
                    </form>
                </div>

                <div class="d-flex">

                    <div class="dropdown d-inline-block d-lg-none ml-2">
                        <button type="button" class="btn header-item noti-icon waves-effect"
                            id="page-header-search-dropdown" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <i class="mdi mdi-magnify"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0"
                            aria-labelledby="page-header-search-dropdown">

                            <form class="p-3">
                                <div class="form-group m-0">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search ..."
                                            aria-label="Recipient's username">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="submit"><i
                                                    class="mdi mdi-magnify"></i></button>
                                        </div>
                            </form>
                        </div>
                    </div>

                  
                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect">
                            <i class="mdi mdi-tune"></i>
                        </button>
                    </div>

                

                </div>
            </div>

            <div class="dropdown d-inline-block" id="message-app" v-cloak>
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                    <i class="mdi mdi-email-outline"></i>
                    <span class="badge badge-pill badge-success" style="top: -14px;">@{{ messages.length }}</span>


                </button>
                <div class="dropdown-menu dropdown-menu-right scrollable-element" style="max-height:300px;overflow-y:scroll" v-if="messages.length">
                    <a href='javascript:;' @click="markAllAsRead()">@lang('lang.mark_all_message_as_read')</a>
                    <div class="dropdown-divider"></div>
                    <template v-for="mes in messages">
                        <template v-if="mes.data !=undefined">
                            <a class="dropdown-item" :href="`{{url('notification/')}}/${mes.id}`" ><i
                            class="mdi mdi-face-profile font-size-16 align-middle mr-1" v></i> @{{mes.data.message}}</a>
                        </template>


                    </template>



                </div>




            </div>

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect">
                    <i class="mdi mdi-tune"></i>
                </button>
            </div>

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php
                    $photo = auth()->user()->profile_photo_path;

                    ?>
                    <img class="rounded-circle header-profile-user" src="{{ url('/') . '/' . $photo }}"
                        alt="{{ Auth::user()->name }}" style="width:45px"
                        onerror="this.src='{{ myUrl() }}no_image.png';">
                    <span class="d-none d-sm-inline-block ml-1">{{ Auth::user()->name }}</span>
                    <i class="mdi mdi-chevron-down d-none d-sm-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                    <!-- item-->
                
                 
                    <a class="dropdown-item"  href="{{ route('logout') }}"  onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();" >
                    <i class="fa fa-sign-out fa-lg"></i>Logout 
                </a>
                 <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                </div>
            </div>

    </div>
    </div>

    </header>

    <!-- ========== Left Sidebar Start ========== -->
    <div class="vertical-menu">

        <div data-simplebar class="h-100">

            <!--- Sidemenu -->
            <div id="sidebar-menu">
                <!-- Left Menu Start -->
                <ul class="metismenu list-unstyled" id="side-menu">
                    <li class="menu-title">Menu</li>

                    <li>
                        <a href=" {{ route('dashbaord') }} " class="waves-effect">
                            <div class="d-inline-block icons-sm mr-1"><i class="uim uim-airplay"></i></div><span
                                class="badge badge-pill badge-success float-right">3</span>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    @if(hasPermission(['open_schedule_case'])
                    || hasPermission(['update_schedule'])
                    || hasPermission(['view_schedule'])
                    || hasPermission(['client']))
                    <li>
                        <a href="{{ route('reception.index') }}" class=" waves-effect">
                            <div class="d-inline-block icons-sm mr-1"><i class="uim uim-schedule"></i></div>
                            <span>@lang('lang.reception')</span>
                        </a>
                    </li>
                    @endif
                    <li>
                        <a href="{{ route('client.index') }}" class=" waves-effect">
                            <div class="d-inline-block icons-sm mr-1"><i class="uim uim-schedule"></i></div>
                            <span>Clients</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('psychology.index') }}" class=" waves-effect">
                            <div class="d-inline-block icons-sm mr-1"><i class="uim uim-schedule"></i></div>
                            <span>Psychologist</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('symptom.index') }}" class=" waves-effect">
                            <div class="d-inline-block icons-sm mr-1"><i class="uim uim-schedule"></i></div>
                            <span>Categories Management</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('timing.create') }}" class=" waves-effect">
                            <div class="d-inline-block icons-sm mr-1"><i class="uim uim-clock-three"></i></div>
                            <span>Time Management</span>
                        </a>
                    </li>
                    @if(hasPermission(['user_list'])
                    || hasPermission(['role_list']))
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <div class="d-inline-block icons-sm mr-1"><i class="uim uim-comment-message"></i></div>
                            <span>@lang('lang.user_management')</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            @if(hasPermission(['user_list']))
                            <li><a href="{{ route('user.index') }}">@lang('lang.users')</a></li>
                            @endif
                                @if(hasPermission(['role_list']))
                            <li><a href="{{ route('role.index') }}">@lang('lang.roles')</a></li>
                                @endif
                        </ul>
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
        @yield('content')
        <!-- end page-content-wrapper -->
        <!-- End Page-content -->
    </div>
    <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    <!-- Right Sidebar -->
    <div class="right-bar">
        <div data-simplebar class="h-100">

            <!-- Nav tabs -->
            <ul class="nav nav-tabs nav-tabs-custom rightbar-nav-tab nav-justified" role="tablist">
            
              
                <li class="nav-item">
                    <a class="nav-link py-3 active" data-toggle="tab" href="#settings-tab" role="tab">
                        <i class="mdi mdi-settings font-size-22"></i>
                    </a>
                </li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content text-muted">
            
                <div class="tab-pane active" id="settings-tab" role="tabpanel">
                    <h6 class="px-4 py-3 bg-light">General Settings</h6>

                    <div class="p-4">
                      

                        <h6 class="mt-4">Backup Setup</h6>
                        <div class="custom-control custom-switch mb-1">
                            <input type="checkbox" class="custom-control-input" id="settings-check3"
                                name="settings-check3">
                            <label class="custom-control-label font-weight-normal" for="settings-check3">Auto
                                backup</label>
                        </div>

                    </div>
                </div>
            </div>

        </div> <!-- end slimscroll-menu-->
    </div>
    <!-- /Right-bar -->

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <!-- JAVASCRIPT -->
    <script src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
        @if (App::getLocale() == 'fa' || App::getLocale() == 'pa')
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
                if (!n) return; var str = '';
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

        function deleteItem(url) {
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
                    axios.delete(url)
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
                            })
                            Toast.fire({
                                icon: 'success',
                                title: 'Deleted  successfully'
                            })
                            vm.getRecord();
                        })
                } else {
                    console.log('oooooooooooooooooooo')
                }
            })
        }

        function toastSuccess(message) {
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
                icon: 'success',
                title: message
            })
        }
    </script>
    <script>
var messageApp=new Vue({
    el:'#message-app',
    data:{
        messages: [],


  },
  mounted:function(){
        // this.getUnreadMessage();
        // Echo.channel('channel')
        // .listen('Appointment',(e)=>{
        //     console.log(e);
        //     console.log('RealTimeMessage: ' + e.message)
        // });


        // Echo.private(`App.Models.User.{{auth()->user()->id}}`)
        //     .notification((msg) => {

        //         let data={message:msg.message};
        //         msg.data=data;
        //         this.messages.push(msg);
        //         toastSuccess(msg.message);
        //         notifyMe(msg.message);


        //     });

        // Echo.private('channel')
        // .listen('Appointment',(e)=>{
        //     console.log(e);
        //     console.log('RealTimeMessage: ' + e.message)
        // });

    },
  methods:{


        getUnreadMessage:_.debounce(()=>
        {
         
        },200),

      markAllAsRead()
      {
         
      }

  }
 });



    function notifyMe(message='')
    {
            // Let's check if the browser supports notifications
            if (!("Notification" in window)) {
                console.log('This browser does not support desktop notification')
            }

            else if (Notification.permission === "granted") {
                // If it's okay let's create a notification
                var notification = new Notification(message);
            }

            else if (Notification.permission !== "denied") {
                Notification.requestPermission().then(function (permission) {
                // If the user accepts, let's create a notification
                if (permission === "granted") {
                    var notification = new Notification(message);
                }
                });
            }

    }







    </script>
    <script src="https://rawgit.com/RobinHerbots/jquery.inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>
    @yield('js')
    @stack('scripts')
</body>

</html>
