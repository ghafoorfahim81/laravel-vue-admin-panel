<!doctype html>
<html class="no-js')}}" lang="en">


<!-- Mirrored from htmldemo.net/safira/safira/index-3.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 03 Sep 2023 11:08:30 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Salamat Organic </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ url('assets/frontend/img/favicon.ico')}}">

    <!-- CSS
    ========================= -->
    <!--bootstrap min css-->
    <link rel="stylesheet" href="{{ url('assets/frontend/css/bootstrap.min.css')}}">
    <!--owl carousel min css-->
    <link rel="stylesheet" href="{{ url('assets/frontend/css/owl.carousel.min.css')}}">
    <!--slick min css-->
    <link rel="stylesheet" href="{{ url('assets/frontend/css/slick.css')}}">
    <!--magnific popup min css-->
    <link rel="stylesheet" href="{{ url('assets/frontend/css/magnific-popup.css')}}">
    <!--font awesome css-->
    <link rel="stylesheet" href="{{ url('assets/frontend/css/font.awesome.css')}}">
    <!--ionicons css-->
    <link rel="stylesheet" href="{{ url('assets/frontend/css/ionicons.min.css')}}">
    <!--linearicons css-->
    <link rel="stylesheet" href="{{ url('assets/frontend/css/linearicons.css')}}">
    <!--animate css-->
    <link rel="stylesheet" href="{{ url('assets/frontend/css/animate.css')}}">
    <!--jquery ui min css-->
    <link rel="stylesheet" href="{{ url('assets/frontend/css/jquery-ui.min.css')}}">
    <!--slinky menu css-->
    <link rel="stylesheet" href="{{ url('assets/frontend/css/slinky.menu.css')}}">
    <!--plugins css-->
    <link rel="stylesheet" href="{{ url('assets/frontend/css/plugins.css')}}">

    <!-- Main Style CSS -->
    <link rel="stylesheet" href="{{ url('assets/frontend/css/style.css')}}">

    <!--modernizr min js here-->
    <script src="{{ url('assets/frontend/js/vendor/modernizr-3.7.1.min.js')}}"></script>
</head>

<body>

<!--header area start-->

<!--offcanvas menu area start-->
<div class="off_canvars_overlay">

</div>
@include('frontend.layouts.top')

<!--offcanvas menu area end-->
<div class="home_three_container">
    @include('frontend.layouts.header')
    <!--header area end-->

    <!--slider area start-->

    <!--slider area end-->

    <!--shipping area start-->

    <!--shipping area end-->
    @yield('content')


    <!--footer area start-->
    @include('frontend.layouts.footer')

    <!--footer area end-->
</div>

<!-- modal area start-->
<div class="modal fade" id="modal_box" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true"><i class="icon-x"></i></span>
            </button>
            <div class="modal_body">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5 col-md-5 col-sm-12">
                            <div class="modal_tab">
                                <div class="tab-content product-details-large">
                                    <div class="tab-pane fade show active" id="tab1" role="tabpanel">
                                        <div class="modal_tab_img">
                                            <a href="#"><img
                                                    src="{{ url('assets/frontend/img/product/productbig1.jpg')}}"
                                                    alt=""></a>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="tab2" role="tabpanel">
                                        <div class="modal_tab_img">
                                            <a href="#"><img
                                                    src="{{ url('assets/frontend/img/product/productbig2.jpg')}}"
                                                    alt=""></a>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="tab3" role="tabpanel">
                                        <div class="modal_tab_img">
                                            <a href="#"><img
                                                    src="{{ url('assets/frontend/img/product/productbig3.jpg')}}"
                                                    alt=""></a>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="tab4" role="tabpanel">
                                        <div class="modal_tab_img">
                                            <a href="#"><img
                                                    src="{{ url('assets/frontend/img/product/productbig4.jpg')}}"
                                                    alt=""></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal_tab_button">
                                    <ul class="nav product_navactive owl-carousel" role="tablist">
                                        <li>
                                            <a class="nav-link active" data-toggle="tab" href="#tab1" role="tab"
                                               aria-controls="tab1" aria-selected="false"><img
                                                    src="{{ url('assets/frontend/img/product/product1.jpg')}}"
                                                    alt=""></a>
                                        </li>
                                        <li>
                                            <a class="nav-link" data-toggle="tab" href="#tab2" role="tab"
                                               aria-controls="tab2" aria-selected="false"><img
                                                    src="{{ url('assets/frontend/img/product/product6.jpg')}}"
                                                    alt=""></a>
                                        </li>
                                        <li>
                                            <a class="nav-link button_three" data-toggle="tab" href="#tab3" role="tab"
                                               aria-controls="tab3" aria-selected="false"><img
                                                    src="{{ url('assets/frontend/img/product/product2.jpg')}}"
                                                    alt=""></a>
                                        </li>
                                        <li>
                                            <a class="nav-link" data-toggle="tab" href="#tab4" role="tab"
                                               aria-controls="tab4" aria-selected="false"><img
                                                    src="{{ url('assets/frontend/img/product/product7.jpg')}}"
                                                    alt=""></a>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-7 col-sm-12">
                            <div class="modal_right">
                                <div class="modal_title mb-10">
                                    <h2>Donec Ac Tempus</h2>
                                </div>
                                <div class="modal_price mb-10">
                                    <span class="new_price">$64.99</span>
                                    <span class="old_price">$78.99</span>
                                </div>
                                <div class="modal_description mb-15">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia iste laborum
                                        ad impedit pariatur esse optio tempora sint ullam autem deleniti nam in quos qui
                                        nemo ipsum numquam, reiciendis maiores quidem aperiam, rerum vel recusandae </p>
                                </div>
                                <div class="variants_selects">
                                    <div class="variants_size">
                                        <h2>size</h2>
                                        <select class="select_option">
                                            <option selected value="1">s</option>
                                            <option value="1">m</option>
                                            <option value="1">l</option>
                                            <option value="1">xl</option>
                                            <option value="1">xxl</option>
                                        </select>
                                    </div>
                                    <div class="variants_color">
                                        <h2>color</h2>
                                        <select class="select_option">
                                            <option selected value="1">purple</option>
                                            <option value="1">violet</option>
                                            <option value="1">black</option>
                                            <option value="1">pink</option>
                                            <option value="1">orange</option>
                                        </select>
                                    </div>
                                    <div class="modal_add_to_cart">
                                        <form action="#">
                                            <input min="1" max="100" step="2" value="1" type="number">
                                            <button type="submit">add to cart</button>
                                        </form>
                                    </div>
                                </div>
                                <div class="modal_social">
                                    <h2>Share this product</h2>
                                    <ul>
                                        <li class="facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li class="pinterest"><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                        <li class="google-plus"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                        <li class="linkedin"><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- modal area end-->


<!-- JS
============================================ -->
<!--jquery min js-->
<script src="{{ url('assets/frontend/js/vendor/jquery-3.4.1.min.js')}}"></script>
<!--popper min js-->
<script src="{{ url('assets/frontend/js/popper.js')}}"></script>
<!--bootstrap min js-->
<script src="{{ url('assets/frontend/js/bootstrap.min.js')}}"></script>
<!--owl carousel min js-->
<script src="{{ url('assets/frontend/js/owl.carousel.min.js')}}"></script>
<!--slick min js-->
<script src="{{ url('assets/frontend/js/slick.min.js')}}"></script>
<!--magnific popup min js-->
<script src="{{ url('assets/frontend/js/jquery.magnific-popup.min.js')}}"></script>
<!--counterup min js-->
<script src="{{ url('assets/frontend/js/jquery.counterup.min.js')}}"></script>
<!--jquery countdown min js-->
<script src="{{ url('assets/frontend/js/jquery.countdown.js')}}"></script>
<!--jquery ui min js-->
<script src="{{ url('assets/frontend/js/jquery.ui.js')}}"></script>
<!--jquery elevatezoom min js-->
<script src="{{ url('assets/frontend/js/jquery.elevatezoom.js')}}"></script>
<!--isotope packaged min js-->
<script src="{{ url('assets/frontend/js/isotope.pkgd.min.js')}}"></script>
<!--slinky menu js-->
<script src="{{ url('assets/frontend/js/slinky.menu.js')}}"></script>
<!--instagramfeed menu js-->
<script src="{{ url('assets/frontend/js/jquery.instagramFeed.min.js')}}"></script>
<!-- tippy bundle umd js -->
<script src="{{ url('assets/frontend/js/tippy-bundle.umd.js')}}"></script>
<!-- Plugins JS -->
<script src="{{ url('assets/frontend/js/plugins.js')}}"></script>

<!-- Main JS -->
<script src="{{ url('assets/frontend/js/main.js')}}"></script>
<script src="{{ asset('js/app.js') }}"></script>


@yield('scripts')

</body>


<!-- Mirrored from htmldemo.net/safira/safira/index-3.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 03 Sep 2023 11:08:33 GMT -->
</html>
