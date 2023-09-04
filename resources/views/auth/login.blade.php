<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesdesign" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">
        <!-- Bootstrap Css -->
        <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{asset('assets/css/app.min.css')}}" rel="stylesheet" type="text/css" />

        <style>
            .customCard{
                box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px;
                border-radius: 100%;

                border: solid white 3px;
            }


      .bg-custom_sidebar_li {
            background-color: white;
            box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
            border-radius: 5px;
            border: solid lightblue 1px;
        }
        </style>
    </head>
    <body  class=" bg-white">
       
        <div class="account-pages my-5 pt-sm-5">
            <div class="container">
                <!-- end row -->

                <div class="row justify-content-center">
                    <div class="col-xl-9 col-sm-8 row bg-custom_sidebar_li">
                        <div class="col-xl-6 " style="place-self: center; text-align: center;">
                        <a> <img width="70%" class="" src="{{ asset('assets/logo/logo.png') }}" alt="user-image"
                                            class="mr-2" ></a>
                        </div>
                        <div class="col-xl-6 ">
                            <div class="card-body p-4">
                                <div class="p-2">
                                    <div class="text-center mb-5">
                                        <!-- <a  class="logo"> <img src="{{ asset('assets/images/company_logo/left-logo.png') }}" alt="user-image" -->
                                        
                                    </div>
                                    <h5 class="mb-5 text-center text-xl h2 font-weight-bold text-info">Afghan Sharq MSP Login Page</h5>
                                    <x-jet-validation-errors class="mb-4 text-danger text-center" />
                                    @if (session('status'))
                                        <div class="mb-4 font-medium text-sm text-green-600">
                                            {{ session('status') }}
                                        </div>
                                    @endif
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group form-group-custom mb-4">
                                                    <input type="text" class="form-control " placeholder="Email"  name="email" :value="old('email')" required autofocus />
                                                    {{-- <label for="email">Email</label> --}}
                                                </div>
                                                <div class="form-group form-group-custom mb-4">
                                                    <input type="password" class="form-control " placeholder="Password" :value=" old('password')" name="password" required autofocus/>
                                                    {{-- <label for="password" >Password</label> --}}
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="custom-control custom-checkbox">
                                                            <label for="remember_me" class="flex items-center">
                                                                <x-jet-checkbox id="remember_me" name="remember" />
                                                                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="text-md-right mt-3 mt-md-0">
                                                            @if (Route::has('password.request'))
                                                                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                                                                    {{ __('Forgot your password?') }}
                                                                </a>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mt-4">
                                                    <button class="btn btn-info btn-block waves-effect waves-light rounded-pill" type="submit">Log In</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    
                </div>
                <!-- end row -->
            </div>
        </div>
        <!-- end Account pages -->

        <!-- JAVASCRIPT -->
        <script src="{{asset('assets/libs/jquery/jquery.min.js')}}"></script>
        <script src="{{asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('assets/libs/metismenu/metisMenu.min.js')}}"></script>
        <script src="{{asset('assets/libs/simplebar/simplebar.min.js')}}"></script>
        <script src="{{asset('assets/libs/node-waves/waves.min.js')}}"></script>
        <script src="{{asset('assets/js/app.js')}}"></script>

    </body>
</html>
