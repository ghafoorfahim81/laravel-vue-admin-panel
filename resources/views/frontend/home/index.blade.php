@extends('frontend.layouts.master')
@section('content')
    <div id="app" v-cloak>
        <section class="slider_section slider_s_three">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 offset-lg-3">
                        <div class="slider_area owl-carousel">
                            <?php $slider = ['hi','how are you','I am fine','and you']; ?>
                            @foreach($slider as $key=>$value)
                            <div class="single_slider d-flex align-items-center" data-bgimg="assets/img/slider/slider7.jpg">
                                <div class="slider_content slider_c_three">
                                    <h1>{{$value}}</h1>
                                    <p>
                                        Organic ingredients & healthy recipes
                                    </p>
                                    <a href="shop.html">{{$key}} </a>
                                </div>
                            </div>
                                @endforeach
                        </div>
                    </div>
                </div>
            </div>
{{--            <div class="container">--}}
{{--                <div class="row">--}}
{{--                    <div class="col-lg-9 offset-lg-3">--}}
{{--                        <div class="slider_area owl-carousel" >--}}
{{--                            <div class="single_slider d-flex align-items-center" data-bgimg="assets/img/slider/slider10.jpg">--}}
{{--                                <div class="slider_content slider_c_three c_four">--}}
{{--                                    <h1>Spring Sale 50% Off</h1>--}}
{{--                                    <p>--}}
{{--                                        Fresh Tomatoes Organic Shop--}}
{{--                                    </p>--}}
{{--                                    <a href="shop.html">Read more </a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div  >--}}
{{--                                <div v-for="product in products" class="single_slider d-flex align-items-center"--}}
{{--                                     :data-bgimg="`{{url('products')}}/${product.image}`">--}}
{{--                                    <div class="slider_content slider_c_three">--}}
{{--                                        <h1>@{{ product.name }}</h1>--}}
{{--                                        <p>--}}
{{--                                            @{{ product.description }}--}}
{{--                                        </p>--}}
{{--                                        <a href="shop.html">Read more </a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

        </section>
        <div class="shipping_area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="single_shipping">
                            <div class="shipping_icone">
                                <img src="{{ url('assets/frontend/img/about/shipping5.jpg')}}" alt="">
                            </div>
                            <div class="shipping_content">
                                <h3>Free Shipping</h3>
                                <p>Free shipping on all US order or order above $200</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="single_shipping col_2">
                            <div class="shipping_icone">
                                <img src="{{ url('assets/frontend/img/about/shipping6.jpg')}}" alt="">
                            </div>
                            <div class="shipping_content">
                                <h3>Support 24/7</h3>
                                <p>Contact us 24 hours a day, 7 days a week</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="single_shipping col_3">
                            <div class="shipping_icone">
                                <img src="{{ url('assets/frontend/img/about/shipping7.jpg')}}" alt="">
                            </div>
                            <div class="shipping_content">
                                <h3>30 Days Return</h3>
                                <p>Simply return it within 30 days for an exchange</p>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="single_shipping col_4">
                            <div class="shipping_icone">
                                <img src="{{ url('assets/frontend/img/about/shipping8.jpg')}}" alt="">
                            </div>
                            <div class="shipping_content">
                                <h3>100% Payment Secure</h3>
                                <p>We ensure secure payment with PEV</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--product area start-->
        <div class="product_area color_three mb-64">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="product_header product_header3">
                            <div class="section_title">
                                <h2>Trending Products</h2>
                            </div>
                            <div class="product_tab_btn">
                                <ul class="nav" role="tablist" id="nav-tab">
                                    <li>
                                        <a class="active" data-toggle="tab" href="#plant1" role="tab"
                                           aria-controls="plant1" aria-selected="true">
                                            Vegetables
                                        </a>
                                    </li>
                                    <li>
                                        <a data-toggle="tab" href="#plant2" role="tab" aria-controls="plant2"
                                           aria-selected="false">
                                            Fruits
                                        </a>
                                    </li>
                                    <li>
                                        <a data-toggle="tab" href="#plant3" role="tab" aria-controls="plant3"
                                           aria-selected="false">
                                            Salads
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product_container">
                    <div class="row">
                        <div class="col-12">
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="plant1" role="tabpanel">
                                    <div class="product_carousel product_column5 owl-carousel">
                                        <article class="single_product">
                                            <figure>
                                                <div class="product_thumb">
                                                    <a class="primary_img" href="product-details.html"><img
                                                            src="{{ url('assets/frontend/img/product/product1.jpg')}}"
                                                            alt=""></a>
                                                    <a class="secondary_img" href="product-details.html"><img
                                                            src="{{ url('assets/frontend/img/product/product2.jpg')}}"
                                                            alt=""></a>
                                                    <div class="label_product">
                                                        <span class="label_sale">Sale</span>
                                                        <span class="label_new">New</span>
                                                    </div>
                                                    <div class="action_links">
                                                        <ul>
                                                            <li class="add_to_cart"><a href="cart.html"
                                                                                       data-tippy="Add to cart"
                                                                                       data-tippy-placement="top"
                                                                                       data-tippy-arrow="true"
                                                                                       data-tippy-inertia="true"> <span
                                                                        class="lnr lnr-cart"></span></a></li>
                                                            <li class="quick_button"><a href="#" data-tippy="quick view"
                                                                                        data-tippy-placement="top"
                                                                                        data-tippy-arrow="true"
                                                                                        data-tippy-inertia="true"
                                                                                        data-bs-toggle="modal"
                                                                                        data-bs-target="#modal_box">
                                                                    <span class="lnr lnr-magnifier"></span></a></li>
                                                            <li class="wishlist"><a href="wishlist.html"
                                                                                    data-tippy="Add to Wishlist"
                                                                                    data-tippy-placement="top"
                                                                                    data-tippy-arrow="true"
                                                                                    data-tippy-inertia="true"><span
                                                                        class="lnr lnr-heart"></span></a></li>
                                                            <li class="compare"><a href="#" data-tippy="Add to Compare"
                                                                                   data-tippy-placement="top"
                                                                                   data-tippy-arrow="true"
                                                                                   data-tippy-inertia="true"><span
                                                                        class="lnr lnr-sync"></span></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <figcaption class="product_content">
                                                    <h4 class="product_name"><a href="product-details.html">Aliquam
                                                            Consequat</a></h4>
                                                    <p><a href="#">Fruits</a></p>
                                                    <div class="price_box">
                                                        <span class="current_price">$26.00</span>
                                                        <span class="old_price">$362.00</span>
                                                    </div>
                                                </figcaption>
                                            </figure>
                                        </article>
                                        <article class="single_product">
                                            <figure>
                                                <div class="product_thumb">
                                                    <a class="primary_img" href="product-details.html"><img
                                                            src="{{ url('assets/frontend/img/product/product3.jpg')}}"
                                                            alt=""></a>
                                                    <a class="secondary_img" href="product-details.html"><img
                                                            src="{{ url('assets/frontend/img/product/product4.jpg')}}"
                                                            alt=""></a>
                                                    <div class="label_product">
                                                        <span class="label_sale">Sale</span>
                                                    </div>
                                                    <div class="action_links">
                                                        <ul>
                                                            <li class="add_to_cart"><a href="cart.html"
                                                                                       data-tippy="Add to cart"
                                                                                       data-tippy-placement="top"
                                                                                       data-tippy-arrow="true"
                                                                                       data-tippy-inertia="true"> <span
                                                                        class="lnr lnr-cart"></span></a></li>
                                                            <li class="quick_button"><a href="#" data-tippy="quick view"
                                                                                        data-tippy-placement="top"
                                                                                        data-tippy-arrow="true"
                                                                                        data-tippy-inertia="true"
                                                                                        data-bs-toggle="modal"
                                                                                        data-bs-target="#modal_box">
                                                                    <span class="lnr lnr-magnifier"></span></a></li>
                                                            <li class="wishlist"><a href="wishlist.html"
                                                                                    data-tippy="Add to Wishlist"
                                                                                    data-tippy-placement="top"
                                                                                    data-tippy-arrow="true"
                                                                                    data-tippy-inertia="true"><span
                                                                        class="lnr lnr-heart"></span></a></li>
                                                            <li class="compare"><a href="#" data-tippy="Add to Compare"
                                                                                   data-tippy-placement="top"
                                                                                   data-tippy-arrow="true"
                                                                                   data-tippy-inertia="true"><span
                                                                        class="lnr lnr-sync"></span></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <figcaption class="product_content">
                                                    <h4 class="product_name"><a href="product-details.html">Donec Non
                                                            Est</a></h4>
                                                    <p><a href="#">Fruits</a></p>
                                                    <div class="price_box">
                                                        <span class="current_price">$46.00</span>
                                                        <span class="old_price">$382.00</span>
                                                    </div>
                                                </figcaption>
                                            </figure>
                                        </article>
                                        <article class="single_product">
                                            <figure>
                                                <div class="product_thumb">
                                                    <a class="primary_img" href="product-details.html"><img
                                                            src="{{ url('assets/frontend/img/product/product5.jpg')}}"
                                                            alt=""></a>
                                                    <a class="secondary_img" href="product-details.html"><img
                                                            src="{{ url('assets/frontend/img/product/product6.jpg')}}"
                                                            alt=""></a>
                                                    <div class="label_product">
                                                        <span class="label_sale">Sale</span>

                                                    </div>
                                                    <div class="action_links">
                                                        <ul>
                                                            <li class="add_to_cart"><a href="cart.html"
                                                                                       data-tippy="Add to cart"
                                                                                       data-tippy-placement="top"
                                                                                       data-tippy-arrow="true"
                                                                                       data-tippy-inertia="true"> <span
                                                                        class="lnr lnr-cart"></span></a></li>
                                                            <li class="quick_button"><a href="#" data-tippy="quick view"
                                                                                        data-tippy-placement="top"
                                                                                        data-tippy-arrow="true"
                                                                                        data-tippy-inertia="true"
                                                                                        data-bs-toggle="modal"
                                                                                        data-bs-target="#modal_box">
                                                                    <span class="lnr lnr-magnifier"></span></a></li>
                                                            <li class="wishlist"><a href="wishlist.html"
                                                                                    data-tippy="Add to Wishlist"
                                                                                    data-tippy-placement="top"
                                                                                    data-tippy-arrow="true"
                                                                                    data-tippy-inertia="true"><span
                                                                        class="lnr lnr-heart"></span></a></li>
                                                            <li class="compare"><a href="#" data-tippy="Add to Compare"
                                                                                   data-tippy-placement="top"
                                                                                   data-tippy-arrow="true"
                                                                                   data-tippy-inertia="true"><span
                                                                        class="lnr lnr-sync"></span></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <figcaption class="product_content">
                                                    <h4 class="product_name"><a href="product-details.html">Etiam
                                                            Gravida</a></h4>
                                                    <p><a href="#">Fruits</a></p>
                                                    <div class="price_box">
                                                        <span class="current_price">$56.00</span>
                                                        <span class="old_price">$322.00</span>
                                                    </div>
                                                </figcaption>
                                            </figure>
                                        </article>
                                        <article class="single_product">
                                            <figure>
                                                <div class="product_thumb">
                                                    <a class="primary_img" href="product-details.html"><img
                                                            src="{{ url('assets/frontend/img/product/product7.jpg')}}"
                                                            alt=""></a>
                                                    <a class="secondary_img" href="product-details.html"><img
                                                            src="{{ url('assets/frontend/img/product/product8.jpg')}}"
                                                            alt=""></a>
                                                    <div class="label_product">
                                                        <span class="label_sale">Sale</span>
                                                        <span class="label_new">New</span>
                                                    </div>
                                                    <div class="action_links">
                                                        <ul>
                                                            <li class="add_to_cart"><a href="cart.html"
                                                                                       data-tippy="Add to cart"
                                                                                       data-tippy-placement="top"
                                                                                       data-tippy-arrow="true"
                                                                                       data-tippy-inertia="true"> <span
                                                                        class="lnr lnr-cart"></span></a></li>
                                                            <li class="quick_button"><a href="#" data-tippy="quick view"
                                                                                        data-tippy-placement="top"
                                                                                        data-tippy-arrow="true"
                                                                                        data-tippy-inertia="true"
                                                                                        data-bs-toggle="modal"
                                                                                        data-bs-target="#modal_box">
                                                                    <span class="lnr lnr-magnifier"></span></a></li>
                                                            <li class="wishlist"><a href="wishlist.html"
                                                                                    data-tippy="Add to Wishlist"
                                                                                    data-tippy-placement="top"
                                                                                    data-tippy-arrow="true"
                                                                                    data-tippy-inertia="true"><span
                                                                        class="lnr lnr-heart"></span></a></li>
                                                            <li class="compare"><a href="#" data-tippy="Add to Compare"
                                                                                   data-tippy-placement="top"
                                                                                   data-tippy-arrow="true"
                                                                                   data-tippy-inertia="true"><span
                                                                        class="lnr lnr-sync"></span></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <figcaption class="product_content">
                                                    <h4 class="product_name"><a href="product-details.html">Fusce
                                                            Aliquam</a></h4>
                                                    <p><a href="#">Fruits</a></p>
                                                    <div class="price_box">
                                                        <span class="current_price">$66.00</span>
                                                        <span class="old_price">$312.00</span>
                                                    </div>
                                                </figcaption>
                                            </figure>
                                        </article>
                                        <article class="single_product">
                                            <figure>
                                                <div class="product_thumb">
                                                    <a class="primary_img" href="product-details.html"><img
                                                            src="{{ url('assets/frontend/img/product/product9.jpg')}}"
                                                            alt=""></a>
                                                    <a class="secondary_img" href="product-details.html"><img
                                                            src="{{ url('assets/frontend/img/product/product10.jpg')}}"
                                                            alt=""></a>
                                                    <div class="label_product">
                                                        <span class="label_sale">Sale</span>
                                                    </div>
                                                    <div class="action_links">
                                                        <ul>
                                                            <li class="add_to_cart"><a href="cart.html"
                                                                                       data-tippy="Add to cart"
                                                                                       data-tippy-placement="top"
                                                                                       data-tippy-arrow="true"
                                                                                       data-tippy-inertia="true"> <span
                                                                        class="lnr lnr-cart"></span></a></li>
                                                            <li class="quick_button"><a href="#" data-tippy="quick view"
                                                                                        data-tippy-placement="top"
                                                                                        data-tippy-arrow="true"
                                                                                        data-tippy-inertia="true"
                                                                                        data-bs-toggle="modal"
                                                                                        data-bs-target="#modal_box">
                                                                    <span class="lnr lnr-magnifier"></span></a></li>
                                                            <li class="wishlist"><a href="wishlist.html"
                                                                                    data-tippy="Add to Wishlist"
                                                                                    data-tippy-placement="top"
                                                                                    data-tippy-arrow="true"
                                                                                    data-tippy-inertia="true"><span
                                                                        class="lnr lnr-heart"></span></a></li>
                                                            <li class="compare"><a href="#" data-tippy="Add to Compare"
                                                                                   data-tippy-placement="top"
                                                                                   data-tippy-arrow="true"
                                                                                   data-tippy-inertia="true"><span
                                                                        class="lnr lnr-sync"></span></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <figcaption class="product_content">
                                                    <h4 class="product_name"><a href="product-details.html">Letraset
                                                            Sheets</a></h4>
                                                    <p><a href="#">Fruits</a></p>
                                                    <div class="price_box">
                                                        <span class="current_price">$38.00</span>
                                                        <span class="old_price">$262.00</span>
                                                    </div>
                                                </figcaption>
                                            </figure>
                                        </article>
                                        <article class="single_product">
                                            <figure>
                                                <div class="product_thumb">
                                                    <a class="primary_img" href="product-details.html"><img
                                                            src="{{ url('assets/frontend/img/product/product11.jpg')}}"
                                                            alt=""></a>
                                                    <a class="secondary_img" href="product-details.html"><img
                                                            src="{{ url('assets/frontend/img/product/product12.jpg')}}"
                                                            alt=""></a>
                                                    <div class="label_product">
                                                        <span class="label_sale">Sale</span>
                                                        <span class="label_new">New</span>
                                                    </div>
                                                    <div class="action_links">
                                                        <ul>
                                                            <li class="add_to_cart"><a href="cart.html"
                                                                                       data-tippy="Add to cart"
                                                                                       data-tippy-placement="top"
                                                                                       data-tippy-arrow="true"
                                                                                       data-tippy-inertia="true"> <span
                                                                        class="lnr lnr-cart"></span></a></li>
                                                            <li class="quick_button"><a href="#" data-tippy="quick view"
                                                                                        data-tippy-placement="top"
                                                                                        data-tippy-arrow="true"
                                                                                        data-tippy-inertia="true"
                                                                                        data-bs-toggle="modal"
                                                                                        data-bs-target="#modal_box">
                                                                    <span class="lnr lnr-magnifier"></span></a></li>
                                                            <li class="wishlist"><a href="wishlist.html"
                                                                                    data-tippy="Add to Wishlist"
                                                                                    data-tippy-placement="top"
                                                                                    data-tippy-arrow="true"
                                                                                    data-tippy-inertia="true"><span
                                                                        class="lnr lnr-heart"></span></a></li>
                                                            <li class="compare"><a href="#" data-tippy="Add to Compare"
                                                                                   data-tippy-placement="top"
                                                                                   data-tippy-arrow="true"
                                                                                   data-tippy-inertia="true"><span
                                                                        class="lnr lnr-sync"></span></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <figcaption class="product_content">
                                                    <h4 class="product_name"><a href="product-details.html">Lorem Ipsum
                                                            Lec</a></h4>
                                                    <p><a href="#">Fruits</a></p>
                                                    <div class="price_box">
                                                        <span class="current_price">$36.00</span>
                                                        <span class="old_price">$145.00</span>
                                                    </div>
                                                </figcaption>
                                            </figure>
                                        </article>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="plant2" role="tabpanel">
                                    <div class="product_carousel product_column5 owl-carousel">
                                        <article class="single_product">
                                            <figure>
                                                <div class="product_thumb">
                                                    <a class="primary_img" href="product-details.html"><img
                                                            src="{{ url('assets/frontend/img/product/product13.jpg')}}"
                                                            alt=""></a>
                                                    <a class="secondary_img" href="product-details.html"><img
                                                            src="{{ url('assets/frontend/img/product/product1.jpg')}}"
                                                            alt=""></a>
                                                    <div class="label_product">
                                                        <span class="label_sale">Sale</span>
                                                        <span class="label_new">New</span>
                                                    </div>
                                                    <div class="action_links">
                                                        <ul>
                                                            <li class="add_to_cart"><a href="cart.html"
                                                                                       data-tippy="Add to cart"
                                                                                       data-tippy-placement="top"
                                                                                       data-tippy-arrow="true"
                                                                                       data-tippy-inertia="true"> <span
                                                                        class="lnr lnr-cart"></span></a></li>
                                                            <li class="quick_button"><a href="#" data-tippy="quick view"
                                                                                        data-tippy-placement="top"
                                                                                        data-tippy-arrow="true"
                                                                                        data-tippy-inertia="true"
                                                                                        data-bs-toggle="modal"
                                                                                        data-bs-target="#modal_box">
                                                                    <span class="lnr lnr-magnifier"></span></a></li>
                                                            <li class="wishlist"><a href="wishlist.html"
                                                                                    data-tippy="Add to Wishlist"
                                                                                    data-tippy-placement="top"
                                                                                    data-tippy-arrow="true"
                                                                                    data-tippy-inertia="true"><span
                                                                        class="lnr lnr-heart"></span></a></li>
                                                            <li class="compare"><a href="#" data-tippy="Add to Compare"
                                                                                   data-tippy-placement="top"
                                                                                   data-tippy-arrow="true"
                                                                                   data-tippy-inertia="true"><span
                                                                        class="lnr lnr-sync"></span></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <figcaption class="product_content">
                                                    <h4 class="product_name"><a href="product-details.html">Mauris Vel
                                                            Tellus</a></h4>
                                                    <p><a href="#">Fruits</a></p>
                                                    <div class="price_box">
                                                        <span class="current_price">$48.00</span>
                                                        <span class="old_price">$257.00</span>
                                                    </div>
                                                </figcaption>
                                            </figure>
                                        </article>
                                        <article class="single_product">
                                            <figure>
                                                <div class="product_thumb">
                                                    <a class="primary_img" href="product-details.html"><img
                                                            src="{{ url('assets/frontend/img/product/product12.jpg')}}"
                                                            alt=""></a>
                                                    <a class="secondary_img" href="product-details.html"><img
                                                            src="{{ url('assets/frontend/img/product/product2.jpg')}}"
                                                            alt=""></a>
                                                    <div class="label_product">
                                                        <span class="label_sale">Sale</span>
                                                    </div>
                                                    <div class="action_links">
                                                        <ul>
                                                            <li class="add_to_cart"><a href="cart.html"
                                                                                       data-tippy="Add to cart"
                                                                                       data-tippy-placement="top"
                                                                                       data-tippy-arrow="true"
                                                                                       data-tippy-inertia="true"> <span
                                                                        class="lnr lnr-cart"></span></a></li>
                                                            <li class="quick_button"><a href="#" data-tippy="quick view"
                                                                                        data-tippy-placement="top"
                                                                                        data-tippy-arrow="true"
                                                                                        data-tippy-inertia="true"
                                                                                        data-bs-toggle="modal"
                                                                                        data-bs-target="#modal_box">
                                                                    <span class="lnr lnr-magnifier"></span></a></li>
                                                            <li class="wishlist"><a href="wishlist.html"
                                                                                    data-tippy="Add to Wishlist"
                                                                                    data-tippy-placement="top"
                                                                                    data-tippy-arrow="true"
                                                                                    data-tippy-inertia="true"><span
                                                                        class="lnr lnr-heart"></span></a></li>
                                                            <li class="compare"><a href="#" data-tippy="Add to Compare"
                                                                                   data-tippy-placement="top"
                                                                                   data-tippy-arrow="true"
                                                                                   data-tippy-inertia="true"><span
                                                                        class="lnr lnr-sync"></span></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <figcaption class="product_content">
                                                    <h4 class="product_name"><a href="product-details.html">Nunc Neque
                                                            Eros</a></h4>
                                                    <p><a href="#">Fruits</a></p>
                                                    <div class="price_box">
                                                        <span class="current_price">$35.00</span>
                                                        <span class="old_price">$245.00</span>
                                                    </div>
                                                </figcaption>
                                            </figure>
                                        </article>
                                        <article class="single_product">
                                            <figure>
                                                <div class="product_thumb">
                                                    <a class="primary_img" href="product-details.html"><img
                                                            src="{{ url('assets/frontend/img/product/product11.jpg')}}"
                                                            alt=""></a>
                                                    <a class="secondary_img" href="product-details.html"><img
                                                            src="{{ url('assets/frontend/img/product/product3.jpg')}}"
                                                            alt=""></a>
                                                    <div class="label_product">
                                                        <span class="label_sale">Sale</span>
                                                    </div>
                                                    <div class="action_links">
                                                        <ul>
                                                            <li class="add_to_cart"><a href="cart.html"
                                                                                       data-tippy="Add to cart"
                                                                                       data-tippy-placement="top"
                                                                                       data-tippy-arrow="true"
                                                                                       data-tippy-inertia="true"> <span
                                                                        class="lnr lnr-cart"></span></a></li>
                                                            <li class="quick_button"><a href="#" data-tippy="quick view"
                                                                                        data-tippy-placement="top"
                                                                                        data-tippy-arrow="true"
                                                                                        data-tippy-inertia="true"
                                                                                        data-bs-toggle="modal"
                                                                                        data-bs-target="#modal_box">
                                                                    <span class="lnr lnr-magnifier"></span></a></li>
                                                            <li class="wishlist"><a href="wishlist.html"
                                                                                    data-tippy="Add to Wishlist"
                                                                                    data-tippy-placement="top"
                                                                                    data-tippy-arrow="true"
                                                                                    data-tippy-inertia="true"><span
                                                                        class="lnr lnr-heart"></span></a></li>
                                                            <li class="compare"><a href="#" data-tippy="Add to Compare"
                                                                                   data-tippy-placement="top"
                                                                                   data-tippy-arrow="true"
                                                                                   data-tippy-inertia="true"><span
                                                                        class="lnr lnr-sync"></span></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <figcaption class="product_content">
                                                    <h4 class="product_name"><a href="product-details.html">Proin Lectus
                                                            Ipsum</a></h4>
                                                    <p><a href="#">Fruits</a></p>
                                                    <div class="price_box">
                                                        <span class="current_price">$26.00</span>
                                                        <span class="old_price">$362.00</span>
                                                    </div>
                                                </figcaption>
                                            </figure>
                                        </article>
                                        <article class="single_product">
                                            <figure>
                                                <div class="product_thumb">
                                                    <a class="primary_img" href="product-details.html"><img
                                                            src="{{ url('assets/frontend/img/product/product9.jpg')}}"
                                                            alt=""></a>
                                                    <a class="secondary_img" href="product-details.html"><img
                                                            src="{{ url('assets/frontend/img/product/product4.jpg')}}"
                                                            alt=""></a>
                                                    <div class="label_product">
                                                        <span class="label_sale">Sale</span>
                                                        <span class="label_new">New</span>
                                                    </div>
                                                    <div class="action_links">
                                                        <ul>
                                                            <li class="add_to_cart"><a href="cart.html"
                                                                                       data-tippy="Add to cart"
                                                                                       data-tippy-placement="top"
                                                                                       data-tippy-arrow="true"
                                                                                       data-tippy-inertia="true"> <span
                                                                        class="lnr lnr-cart"></span></a></li>
                                                            <li class="quick_button"><a href="#" data-tippy="quick view"
                                                                                        data-tippy-placement="top"
                                                                                        data-tippy-arrow="true"
                                                                                        data-tippy-inertia="true"
                                                                                        data-bs-toggle="modal"
                                                                                        data-bs-target="#modal_box">
                                                                    <span class="lnr lnr-magnifier"></span></a></li>
                                                            <li class="wishlist"><a href="wishlist.html"
                                                                                    data-tippy="Add to Wishlist"
                                                                                    data-tippy-placement="top"
                                                                                    data-tippy-arrow="true"
                                                                                    data-tippy-inertia="true"><span
                                                                        class="lnr lnr-heart"></span></a></li>
                                                            <li class="compare"><a href="#" data-tippy="Add to Compare"
                                                                                   data-tippy-placement="top"
                                                                                   data-tippy-arrow="true"
                                                                                   data-tippy-inertia="true"><span
                                                                        class="lnr lnr-sync"></span></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <figcaption class="product_content">
                                                    <h4 class="product_name"><a href="product-details.html">Quisque In
                                                            Arcu</a></h4>
                                                    <p><a href="#">Fruits</a></p>
                                                    <div class="price_box">
                                                        <span class="current_price">$55.00</span>
                                                        <span class="old_price">$235.00</span>
                                                    </div>
                                                </figcaption>
                                            </figure>
                                        </article>
                                        <article class="single_product">
                                            <figure>
                                                <div class="product_thumb">
                                                    <a class="primary_img" href="product-details.html"><img
                                                            src="{{ url('assets/frontend/img/product/product8.jpg')}}"
                                                            alt=""></a>
                                                    <a class="secondary_img" href="product-details.html"><img
                                                            src="{{ url('assets/frontend/img/product/product5.jpg')}}"
                                                            alt=""></a>
                                                    <div class="label_product">
                                                        <span class="label_sale">Sale</span>
                                                    </div>
                                                    <div class="action_links">
                                                        <ul>
                                                            <li class="add_to_cart"><a href="cart.html"
                                                                                       data-tippy="Add to cart"
                                                                                       data-tippy-placement="top"
                                                                                       data-tippy-arrow="true"
                                                                                       data-tippy-inertia="true"> <span
                                                                        class="lnr lnr-cart"></span></a></li>
                                                            <li class="quick_button"><a href="#" data-tippy="quick view"
                                                                                        data-tippy-placement="top"
                                                                                        data-tippy-arrow="true"
                                                                                        data-tippy-inertia="true"
                                                                                        data-bs-toggle="modal"
                                                                                        data-bs-target="#modal_box">
                                                                    <span class="lnr lnr-magnifier"></span></a></li>
                                                            <li class="wishlist"><a href="wishlist.html"
                                                                                    data-tippy="Add to Wishlist"
                                                                                    data-tippy-placement="top"
                                                                                    data-tippy-arrow="true"
                                                                                    data-tippy-inertia="true"><span
                                                                        class="lnr lnr-heart"></span></a></li>
                                                            <li class="compare"><a href="#" data-tippy="Add to Compare"
                                                                                   data-tippy-placement="top"
                                                                                   data-tippy-arrow="true"
                                                                                   data-tippy-inertia="true"><span
                                                                        class="lnr lnr-sync"></span></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <figcaption class="product_content">
                                                    <h4 class="product_name"><a href="product-details.html">Cas Meque
                                                            Metus</a></h4>
                                                    <p><a href="#">Fruits</a></p>
                                                    <div class="price_box">
                                                        <span class="current_price">$26.00</span>
                                                        <span class="old_price">$362.00</span>
                                                    </div>
                                                </figcaption>
                                            </figure>
                                        </article>
                                        <article class="single_product">
                                            <figure>
                                                <div class="product_thumb">
                                                    <a class="primary_img" href="product-details.html"><img
                                                            src="{{ url('assets/frontend/img/product/product7.jpg')}}"
                                                            alt=""></a>
                                                    <a class="secondary_img" href="product-details.html"><img
                                                            src="{{ url('assets/frontend/img/product/product6.jpg')}}"
                                                            alt=""></a>
                                                    <div class="label_product">
                                                        <span class="label_sale">Sale</span>
                                                    </div>
                                                    <div class="action_links">
                                                        <ul>
                                                            <li class="add_to_cart"><a href="cart.html"
                                                                                       data-tippy="Add to cart"
                                                                                       data-tippy-placement="top"
                                                                                       data-tippy-arrow="true"
                                                                                       data-tippy-inertia="true"> <span
                                                                        class="lnr lnr-cart"></span></a></li>
                                                            <li class="quick_button"><a href="#" data-tippy="quick view"
                                                                                        data-tippy-placement="top"
                                                                                        data-tippy-arrow="true"
                                                                                        data-tippy-inertia="true"
                                                                                        data-bs-toggle="modal"
                                                                                        data-bs-target="#modal_box">
                                                                    <span class="lnr lnr-magnifier"></span></a></li>
                                                            <li class="wishlist"><a href="wishlist.html"
                                                                                    data-tippy="Add to Wishlist"
                                                                                    data-tippy-placement="top"
                                                                                    data-tippy-arrow="true"
                                                                                    data-tippy-inertia="true"><span
                                                                        class="lnr lnr-heart"></span></a></li>
                                                            <li class="compare"><a href="#" data-tippy="Add to Compare"
                                                                                   data-tippy-placement="top"
                                                                                   data-tippy-arrow="true"
                                                                                   data-tippy-inertia="true"><span
                                                                        class="lnr lnr-sync"></span></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <figcaption class="product_content">
                                                    <h4 class="product_name"><a href="product-details.html">Aliquam
                                                            Consequat</a></h4>
                                                    <p><a href="#">Fruits</a></p>
                                                    <div class="price_box">
                                                        <span class="current_price">$26.00</span>
                                                        <span class="old_price">$362.00</span>
                                                    </div>
                                                </figcaption>
                                            </figure>
                                        </article>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="plant3" role="tabpanel">
                                    <div class="product_carousel product_column5 owl-carousel">
                                        <article class="single_product">
                                            <figure>
                                                <div class="product_thumb">
                                                    <a class="primary_img" href="product-details.html"><img
                                                            src="{{ url('assets/frontend/img/product/product11.jpg')}}"
                                                            alt=""></a>
                                                    <a class="secondary_img" href="product-details.html"><img
                                                            src="{{ url('assets/frontend/img/product/product3.jpg')}}"
                                                            alt=""></a>
                                                    <div class="label_product">
                                                        <span class="label_sale">Sale</span>
                                                    </div>
                                                    <div class="action_links">
                                                        <ul>
                                                            <li class="add_to_cart"><a href="cart.html"
                                                                                       data-tippy="Add to cart"
                                                                                       data-tippy-placement="top"
                                                                                       data-tippy-arrow="true"
                                                                                       data-tippy-inertia="true"> <span
                                                                        class="lnr lnr-cart"></span></a></li>
                                                            <li class="quick_button"><a href="#" data-tippy="quick view"
                                                                                        data-tippy-placement="top"
                                                                                        data-tippy-arrow="true"
                                                                                        data-tippy-inertia="true"
                                                                                        data-bs-toggle="modal"
                                                                                        data-bs-target="#modal_box">
                                                                    <span class="lnr lnr-magnifier"></span></a></li>
                                                            <li class="wishlist"><a href="wishlist.html"
                                                                                    data-tippy="Add to Wishlist"
                                                                                    data-tippy-placement="top"
                                                                                    data-tippy-arrow="true"
                                                                                    data-tippy-inertia="true"><span
                                                                        class="lnr lnr-heart"></span></a></li>
                                                            <li class="compare"><a href="#" data-tippy="Add to Compare"
                                                                                   data-tippy-placement="top"
                                                                                   data-tippy-arrow="true"
                                                                                   data-tippy-inertia="true"><span
                                                                        class="lnr lnr-sync"></span></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <figcaption class="product_content">
                                                    <h4 class="product_name"><a href="product-details.html">Proin Lectus
                                                            Ipsum</a></h4>
                                                    <p><a href="#">Fruits</a></p>
                                                    <div class="price_box">
                                                        <span class="current_price">$26.00</span>
                                                        <span class="old_price">$362.00</span>
                                                    </div>
                                                </figcaption>
                                            </figure>
                                        </article>
                                        <article class="single_product">
                                            <figure>
                                                <div class="product_thumb">
                                                    <a class="primary_img" href="product-details.html"><img
                                                            src="{{ url('assets/frontend/img/product/product9.jpg')}}"
                                                            alt=""></a>
                                                    <a class="secondary_img" href="product-details.html"><img
                                                            src="{{ url('assets/frontend/img/product/product4.jpg')}}"
                                                            alt=""></a>
                                                    <div class="label_product">
                                                        <span class="label_sale">Sale</span>
                                                        <span class="label_new">New</span>
                                                    </div>
                                                    <div class="action_links">
                                                        <ul>
                                                            <li class="add_to_cart"><a href="cart.html"
                                                                                       data-tippy="Add to cart"
                                                                                       data-tippy-placement="top"
                                                                                       data-tippy-arrow="true"
                                                                                       data-tippy-inertia="true"> <span
                                                                        class="lnr lnr-cart"></span></a></li>
                                                            <li class="quick_button"><a href="#" data-tippy="quick view"
                                                                                        data-tippy-placement="top"
                                                                                        data-tippy-arrow="true"
                                                                                        data-tippy-inertia="true"
                                                                                        data-bs-toggle="modal"
                                                                                        data-bs-target="#modal_box">
                                                                    <span class="lnr lnr-magnifier"></span></a></li>
                                                            <li class="wishlist"><a href="wishlist.html"
                                                                                    data-tippy="Add to Wishlist"
                                                                                    data-tippy-placement="top"
                                                                                    data-tippy-arrow="true"
                                                                                    data-tippy-inertia="true"><span
                                                                        class="lnr lnr-heart"></span></a></li>
                                                            <li class="compare"><a href="#" data-tippy="Add to Compare"
                                                                                   data-tippy-placement="top"
                                                                                   data-tippy-arrow="true"
                                                                                   data-tippy-inertia="true"><span
                                                                        class="lnr lnr-sync"></span></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <figcaption class="product_content">
                                                    <h4 class="product_name"><a href="product-details.html">Quisque In
                                                            Arcu</a></h4>
                                                    <p><a href="#">Fruits</a></p>
                                                    <div class="price_box">
                                                        <span class="current_price">$55.00</span>
                                                        <span class="old_price">$235.00</span>
                                                    </div>
                                                </figcaption>
                                            </figure>
                                        </article>
                                        <article class="single_product">
                                            <figure>
                                                <div class="product_thumb">
                                                    <a class="primary_img" href="product-details.html"><img
                                                            src="{{ url('assets/frontend/img/product/product13.jpg')}}"
                                                            alt=""></a>
                                                    <a class="secondary_img" href="product-details.html"><img
                                                            src="{{ url('assets/frontend/img/product/product1.jpg')}}"
                                                            alt=""></a>
                                                    <div class="label_product">
                                                        <span class="label_sale">Sale</span>
                                                        <span class="label_new">New</span>
                                                    </div>
                                                    <div class="action_links">
                                                        <ul>
                                                            <li class="add_to_cart"><a href="cart.html"
                                                                                       data-tippy="Add to cart"
                                                                                       data-tippy-placement="top"
                                                                                       data-tippy-arrow="true"
                                                                                       data-tippy-inertia="true"> <span
                                                                        class="lnr lnr-cart"></span></a></li>
                                                            <li class="quick_button"><a href="#" data-tippy="quick view"
                                                                                        data-tippy-placement="top"
                                                                                        data-tippy-arrow="true"
                                                                                        data-tippy-inertia="true"
                                                                                        data-bs-toggle="modal"
                                                                                        data-bs-target="#modal_box">
                                                                    <span class="lnr lnr-magnifier"></span></a></li>
                                                            <li class="wishlist"><a href="wishlist.html"
                                                                                    data-tippy="Add to Wishlist"
                                                                                    data-tippy-placement="top"
                                                                                    data-tippy-arrow="true"
                                                                                    data-tippy-inertia="true"><span
                                                                        class="lnr lnr-heart"></span></a></li>
                                                            <li class="compare"><a href="#" data-tippy="Add to Compare"
                                                                                   data-tippy-placement="top"
                                                                                   data-tippy-arrow="true"
                                                                                   data-tippy-inertia="true"><span
                                                                        class="lnr lnr-sync"></span></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <figcaption class="product_content">
                                                    <h4 class="product_name"><a href="product-details.html">Mauris Vel
                                                            Tellus</a></h4>
                                                    <p><a href="#">Fruits</a></p>
                                                    <div class="price_box">
                                                        <span class="current_price">$48.00</span>
                                                        <span class="old_price">$257.00</span>
                                                    </div>
                                                </figcaption>
                                            </figure>
                                        </article>
                                        <article class="single_product">
                                            <figure>
                                                <div class="product_thumb">
                                                    <a class="primary_img" href="product-details.html"><img
                                                            src="{{ url('assets/frontend/img/product/product12.jpg')}}"
                                                            alt=""></a>
                                                    <a class="secondary_img" href="product-details.html"><img
                                                            src="{{ url('assets/frontend/img/product/product2.jpg')}}"
                                                            alt=""></a>
                                                    <div class="label_product">
                                                        <span class="label_sale">Sale</span>
                                                    </div>
                                                    <div class="action_links">
                                                        <ul>
                                                            <li class="add_to_cart"><a href="cart.html"
                                                                                       data-tippy="Add to cart"
                                                                                       data-tippy-placement="top"
                                                                                       data-tippy-arrow="true"
                                                                                       data-tippy-inertia="true"> <span
                                                                        class="lnr lnr-cart"></span></a></li>
                                                            <li class="quick_button"><a href="#" data-tippy="quick view"
                                                                                        data-tippy-placement="top"
                                                                                        data-tippy-arrow="true"
                                                                                        data-tippy-inertia="true"
                                                                                        data-bs-toggle="modal"
                                                                                        data-bs-target="#modal_box">
                                                                    <span class="lnr lnr-magnifier"></span></a></li>
                                                            <li class="wishlist"><a href="wishlist.html"
                                                                                    data-tippy="Add to Wishlist"
                                                                                    data-tippy-placement="top"
                                                                                    data-tippy-arrow="true"
                                                                                    data-tippy-inertia="true"><span
                                                                        class="lnr lnr-heart"></span></a></li>
                                                            <li class="compare"><a href="#" data-tippy="Add to Compare"
                                                                                   data-tippy-placement="top"
                                                                                   data-tippy-arrow="true"
                                                                                   data-tippy-inertia="true"><span
                                                                        class="lnr lnr-sync"></span></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <figcaption class="product_content">
                                                    <h4 class="product_name"><a href="product-details.html">Nunc Neque
                                                            Eros</a></h4>
                                                    <p><a href="#">Fruits</a></p>
                                                    <div class="price_box">
                                                        <span class="current_price">$35.00</span>
                                                        <span class="old_price">$245.00</span>
                                                    </div>
                                                </figcaption>
                                            </figure>
                                        </article>
                                        <article class="single_product">
                                            <figure>
                                                <div class="product_thumb">
                                                    <a class="primary_img" href="product-details.html"><img
                                                            src="{{ url('assets/frontend/img/product/product1.jpg')}}"
                                                            alt=""></a>
                                                    <a class="secondary_img" href="product-details.html"><img
                                                            src="{{ url('assets/frontend/img/product/product2.jpg')}}"
                                                            alt=""></a>
                                                    <div class="label_product">
                                                        <span class="label_sale">Sale</span>
                                                        <span class="label_new">New</span>
                                                    </div>
                                                    <div class="action_links">
                                                        <ul>
                                                            <li class="add_to_cart"><a href="cart.html"
                                                                                       data-tippy="Add to cart"
                                                                                       data-tippy-placement="top"
                                                                                       data-tippy-arrow="true"
                                                                                       data-tippy-inertia="true"> <span
                                                                        class="lnr lnr-cart"></span></a></li>
                                                            <li class="quick_button"><a href="#" data-tippy="quick view"
                                                                                        data-tippy-placement="top"
                                                                                        data-tippy-arrow="true"
                                                                                        data-tippy-inertia="true"
                                                                                        data-bs-toggle="modal"
                                                                                        data-bs-target="#modal_box">
                                                                    <span class="lnr lnr-magnifier"></span></a></li>
                                                            <li class="wishlist"><a href="wishlist.html"
                                                                                    data-tippy="Add to Wishlist"
                                                                                    data-tippy-placement="top"
                                                                                    data-tippy-arrow="true"
                                                                                    data-tippy-inertia="true"><span
                                                                        class="lnr lnr-heart"></span></a></li>
                                                            <li class="compare"><a href="#" data-tippy="Add to Compare"
                                                                                   data-tippy-placement="top"
                                                                                   data-tippy-arrow="true"
                                                                                   data-tippy-inertia="true"><span
                                                                        class="lnr lnr-sync"></span></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <figcaption class="product_content">
                                                    <h4 class="product_name"><a href="product-details.html">Aliquam
                                                            Consequat</a></h4>
                                                    <p><a href="#">Fruits</a></p>
                                                    <div class="price_box">
                                                        <span class="current_price">$26.00</span>
                                                        <span class="old_price">$362.00</span>
                                                    </div>
                                                </figcaption>
                                            </figure>
                                        </article>
                                        <article class="single_product">
                                            <figure>
                                                <div class="product_thumb">
                                                    <a class="primary_img" href="product-details.html"><img
                                                            src="{{ url('assets/frontend/img/product/product3.jpg')}}"
                                                            alt=""></a>
                                                    <a class="secondary_img" href="product-details.html"><img
                                                            src="{{ url('assets/frontend/img/product/product4.jpg')}}"
                                                            alt=""></a>
                                                    <div class="label_product">
                                                        <span class="label_sale">Sale</span>
                                                    </div>
                                                    <div class="action_links">
                                                        <ul>
                                                            <li class="add_to_cart"><a href="cart.html"
                                                                                       data-tippy="Add to cart"
                                                                                       data-tippy-placement="top"
                                                                                       data-tippy-arrow="true"
                                                                                       data-tippy-inertia="true"> <span
                                                                        class="lnr lnr-cart"></span></a></li>
                                                            <li class="quick_button"><a href="#" data-tippy="quick view"
                                                                                        data-tippy-placement="top"
                                                                                        data-tippy-arrow="true"
                                                                                        data-tippy-inertia="true"
                                                                                        data-bs-toggle="modal"
                                                                                        data-bs-target="#modal_box">
                                                                    <span class="lnr lnr-magnifier"></span></a></li>
                                                            <li class="wishlist"><a href="wishlist.html"
                                                                                    data-tippy="Add to Wishlist"
                                                                                    data-tippy-placement="top"
                                                                                    data-tippy-arrow="true"
                                                                                    data-tippy-inertia="true"><span
                                                                        class="lnr lnr-heart"></span></a></li>
                                                            <li class="compare"><a href="#" data-tippy="Add to Compare"
                                                                                   data-tippy-placement="top"
                                                                                   data-tippy-arrow="true"
                                                                                   data-tippy-inertia="true"><span
                                                                        class="lnr lnr-sync"></span></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <figcaption class="product_content">
                                                    <h4 class="product_name"><a href="product-details.html">Donec Non
                                                            Est</a></h4>
                                                    <p><a href="#">Fruits</a></p>
                                                    <div class="price_box">
                                                        <span class="current_price">$46.00</span>
                                                        <span class="old_price">$382.00</span>
                                                    </div>
                                                </figcaption>
                                            </figure>
                                        </article>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{--    <--product area end-->--}}

        <!--banner area start-->
        <div class="banner_area banner3_col2">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="single_banner">
                            <div class="banner_thumb">
                                <a href="shop.html"><img src="{{ url('assets/frontend/img/bg/banner10.jpg')}}"
                                                         alt=""></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="single_banner">
                            <div class="banner_thumb">
                                <a href="shop.html"><img src="{{ url('assets/frontend/img/bg/banner11.jpg')}}"
                                                         alt=""></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--banner area end-->

        <!--home three bg area start-->
        <div class="home3_bg_area color_three">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-5">
                        <div class="productbg_right_left">
                            <div class="deals_prodict_three">
                                <div class="deals_title">
                                    <h2>Deals Of The Weeks</h2>
                                </div>
                                <div class="deals_prodict_inner3">
                                    <div class="product_carousel deals3_column1 owl-carousel">
                                        <article class="single_product">
                                            <figure>
                                                <div class="product_thumb">
                                                    <a class="primary_img" href="product-details.html"><img
                                                            src="{{ url('assets/frontend/img/product/product17.jpg')}}"
                                                            alt=""></a>
                                                    <a class="secondary_img" href="product-details.html"><img
                                                            src="{{ url('assets/frontend/img/product/product18.jpg')}}"
                                                            alt=""></a>
                                                    <div class="label_product">
                                                        <span class="label_sale">Sale</span>
                                                    </div>
                                                    <div class="action_links">
                                                        <ul>
                                                            <li class="add_to_cart"><a href="cart.html"
                                                                                       data-tippy="Add to cart"
                                                                                       data-tippy-placement="top"
                                                                                       data-tippy-arrow="true"
                                                                                       data-tippy-inertia="true"> <span
                                                                        class="lnr lnr-cart"></span></a></li>
                                                            <li class="quick_button"><a href="#" data-tippy="quick view"
                                                                                        data-tippy-placement="top"
                                                                                        data-tippy-arrow="true"
                                                                                        data-tippy-inertia="true"
                                                                                        data-bs-toggle="modal"
                                                                                        data-bs-target="#modal_box">
                                                                    <span class="lnr lnr-magnifier"></span></a></li>
                                                            <li class="wishlist"><a href="wishlist.html"
                                                                                    data-tippy="Add to Wishlist"
                                                                                    data-tippy-placement="top"
                                                                                    data-tippy-arrow="true"
                                                                                    data-tippy-inertia="true"><span
                                                                        class="lnr lnr-heart"></span></a></li>
                                                            <li class="compare"><a href="#" data-tippy="Add to Compare"
                                                                                   data-tippy-placement="top"
                                                                                   data-tippy-arrow="true"
                                                                                   data-tippy-inertia="true"><span
                                                                        class="lnr lnr-sync"></span></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <figcaption class="product_content">
                                                    <h4 class="product_name"><a href="product-details.html">Mauris Vel
                                                            Tellus</a></h4>
                                                    <p><a href="#">Fruits</a></p>
                                                    <div class="price_box">
                                                        <span class="current_price">$48.00</span>
                                                        <span class="old_price">$257.00</span>
                                                    </div>
                                                    <div class="product_timing">
                                                        <div data-countdown="2021/12/15"></div>
                                                    </div>
                                                    <div class="addto_cart_btn">
                                                        <a href="cart.html" title="Add to cart">Add to Cart</a>
                                                    </div>
                                                </figcaption>
                                            </figure>
                                        </article>
                                        <article class="single_product">
                                            <figure>
                                                <div class="product_thumb">
                                                    <a class="primary_img" href="product-details.html"><img
                                                            src="{{ url('assets/frontend/img/product/product19.jpg')}}"
                                                            alt=""></a>
                                                    <a class="secondary_img" href="product-details.html"><img
                                                            src="{{ url('assets/frontend/img/product/product20.jpg')}}"
                                                            alt=""></a>
                                                    <div class="label_product">
                                                        <span class="label_sale">Sale</span>
                                                    </div>
                                                    <div class="action_links">
                                                        <ul>
                                                            <li class="add_to_cart"><a href="cart.html"
                                                                                       data-tippy="Add to cart"
                                                                                       data-tippy-placement="top"
                                                                                       data-tippy-arrow="true"
                                                                                       data-tippy-inertia="true"> <span
                                                                        class="lnr lnr-cart"></span></a></li>
                                                            <li class="quick_button"><a href="#" data-tippy="quick view"
                                                                                        data-tippy-placement="top"
                                                                                        data-tippy-arrow="true"
                                                                                        data-tippy-inertia="true"
                                                                                        data-bs-toggle="modal"
                                                                                        data-bs-target="#modal_box">
                                                                    <span class="lnr lnr-magnifier"></span></a></li>
                                                            <li class="wishlist"><a href="wishlist.html"
                                                                                    data-tippy="Add to Wishlist"
                                                                                    data-tippy-placement="top"
                                                                                    data-tippy-arrow="true"
                                                                                    data-tippy-inertia="true"><span
                                                                        class="lnr lnr-heart"></span></a></li>
                                                            <li class="compare"><a href="#" data-tippy="Add to Compare"
                                                                                   data-tippy-placement="top"
                                                                                   data-tippy-arrow="true"
                                                                                   data-tippy-inertia="true"><span
                                                                        class="lnr lnr-sync"></span></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <figcaption class="product_content">
                                                    <h4 class="product_name"><a href="product-details.html">Donec Ac
                                                            Tempus</a></h4>
                                                    <p><a href="#">Fruits</a></p>
                                                    <div class="price_box">
                                                        <span class="current_price">$48.00</span>
                                                        <span class="old_price">$257.00</span>
                                                    </div>
                                                    <div class="product_timing">
                                                        <div data-countdown="2021/12/15"></div>
                                                    </div>
                                                    <div class="addto_cart_btn">
                                                        <a href="cart.html" title="Add to cart">Add to Cart</a>
                                                    </div>
                                                </figcaption>
                                            </figure>
                                        </article>
                                        <article class="single_product">
                                            <figure>
                                                <div class="product_thumb">
                                                    <a class="primary_img" href="product-details.html"><img
                                                            src="{{ url('assets/frontend/img/product/product15.jpg')}}"
                                                            alt=""></a>
                                                    <a class="secondary_img" href="product-details.html"><img
                                                            src="{{ url('assets/frontend/img/product/product16.jpg')}}"
                                                            alt=""></a>
                                                    <div class="label_product">
                                                        <span class="label_sale">Sale</span>
                                                    </div>
                                                    <div class="action_links">
                                                        <ul>
                                                            <li class="add_to_cart"><a href="cart.html"
                                                                                       data-tippy="Add to cart"
                                                                                       data-tippy-placement="top"
                                                                                       data-tippy-arrow="true"
                                                                                       data-tippy-inertia="true"> <span
                                                                        class="lnr lnr-cart"></span></a></li>
                                                            <li class="quick_button"><a href="#" data-tippy="quick view"
                                                                                        data-tippy-placement="top"
                                                                                        data-tippy-arrow="true"
                                                                                        data-tippy-inertia="true"
                                                                                        data-bs-toggle="modal"
                                                                                        data-bs-target="#modal_box">
                                                                    <span class="lnr lnr-magnifier"></span></a></li>
                                                            <li class="wishlist"><a href="wishlist.html"
                                                                                    data-tippy="Add to Wishlist"
                                                                                    data-tippy-placement="top"
                                                                                    data-tippy-arrow="true"
                                                                                    data-tippy-inertia="true"><span
                                                                        class="lnr lnr-heart"></span></a></li>
                                                            <li class="compare"><a href="#" data-tippy="Add to Compare"
                                                                                   data-tippy-placement="top"
                                                                                   data-tippy-arrow="true"
                                                                                   data-tippy-inertia="true"><span
                                                                        class="lnr lnr-sync"></span></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <figcaption class="product_content">
                                                    <h4 class="product_name"><a href="product-details.html">Mauris Vel
                                                            Tellus</a></h4>
                                                    <p><a href="#">Fruits</a></p>
                                                    <div class="price_box">
                                                        <span class="current_price">$48.00</span>
                                                        <span class="old_price">$257.00</span>
                                                    </div>
                                                    <div class="product_timing">
                                                        <div data-countdown="2021/12/15"></div>
                                                    </div>
                                                    <div class="addto_cart_btn">
                                                        <a href="cart.html" title="Add to cart">Add to Cart</a>
                                                    </div>
                                                </figcaption>
                                            </figure>
                                        </article>
                                    </div>
                                </div>
                            </div>
                            <div class="banner_thumb">
                                <a href="shop.html"><img src="{{ url('assets/frontend/img/bg/banner12.jpg')}}"
                                                         alt=""></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-7">
                        <div class="productbg_right_side">
                            <div class="small_product_inner3">
                                <div class="section_title">
                                    <h2>Best Sellers</h2>
                                </div>
                                <div class="small_product_area product_carousel smallp_column2 owl-carousel">
                                    <div class="product_items">
                                        <article class="single_product">
                                            <figure>
                                                <div class="product_thumb">
                                                    <a class="primary_img" href="product-details.html"><img
                                                            src="{{ url('assets/frontend/img/product/product1.jpg')}}"
                                                            alt=""></a>
                                                    <a class="secondary_img" href="product-details.html"><img
                                                            src="{{ url('assets/frontend/img/product/product2.jpg')}}"
                                                            alt=""></a>
                                                </div>
                                                <figcaption class="product_content">
                                                    <h4 class="product_name"><a href="product-details.html">Aliquam
                                                            Consequat</a></h4>
                                                    <p><a href="#">Fruits</a></p>
                                                    <div class="action_links">
                                                        <ul>
                                                            <li class="add_to_cart"><a href="cart.html"
                                                                                       data-tippy="Add to cart"
                                                                                       data-tippy-placement="top"
                                                                                       data-tippy-arrow="true"
                                                                                       data-tippy-inertia="true"> <span
                                                                        class="lnr lnr-cart"></span></a></li>
                                                            <li class="quick_button"><a href="#" data-tippy="quick view"
                                                                                        data-tippy-placement="top"
                                                                                        data-tippy-arrow="true"
                                                                                        data-tippy-inertia="true"
                                                                                        data-bs-toggle="modal"
                                                                                        data-bs-target="#modal_box">
                                                                    <span class="lnr lnr-magnifier"></span></a></li>
                                                            <li class="wishlist"><a href="wishlist.html"
                                                                                    data-tippy="Add to Wishlist"
                                                                                    data-tippy-placement="top"
                                                                                    data-tippy-arrow="true"
                                                                                    data-tippy-inertia="true"><span
                                                                        class="lnr lnr-heart"></span></a></li>
                                                            <li class="compare"><a href="#" data-tippy="Add to Compare"
                                                                                   data-tippy-placement="top"
                                                                                   data-tippy-arrow="true"
                                                                                   data-tippy-inertia="true"><span
                                                                        class="lnr lnr-sync"></span></a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="price_box">
                                                        <span class="current_price">$26.00</span>
                                                        <span class="old_price">$362.00</span>
                                                    </div>
                                                </figcaption>
                                            </figure>
                                        </article>
                                        <article class="single_product">
                                            <figure>
                                                <div class="product_thumb">
                                                    <a class="primary_img" href="product-details.html"><img
                                                            src="{{ url('assets/frontend/img/product/product3.jpg')}}"
                                                            alt=""></a>
                                                    <a class="secondary_img" href="product-details.html"><img
                                                            src="{{ url('assets/frontend/img/product/product4.jpg')}}"
                                                            alt=""></a>
                                                </div>
                                                <figcaption class="product_content">
                                                    <h4 class="product_name"><a href="product-details.html">Donec Non
                                                            Est</a></h4>
                                                    <p><a href="#">Fruits</a></p>
                                                    <div class="action_links">
                                                        <ul>
                                                            <li class="add_to_cart"><a href="cart.html"
                                                                                       data-tippy="Add to cart"
                                                                                       data-tippy-placement="top"
                                                                                       data-tippy-arrow="true"
                                                                                       data-tippy-inertia="true"> <span
                                                                        class="lnr lnr-cart"></span></a></li>
                                                            <li class="quick_button"><a href="#" data-tippy="quick view"
                                                                                        data-tippy-placement="top"
                                                                                        data-tippy-arrow="true"
                                                                                        data-tippy-inertia="true"
                                                                                        data-bs-toggle="modal"
                                                                                        data-bs-target="#modal_box">
                                                                    <span class="lnr lnr-magnifier"></span></a></li>
                                                            <li class="wishlist"><a href="wishlist.html"
                                                                                    data-tippy="Add to Wishlist"
                                                                                    data-tippy-placement="top"
                                                                                    data-tippy-arrow="true"
                                                                                    data-tippy-inertia="true"><span
                                                                        class="lnr lnr-heart"></span></a></li>
                                                            <li class="compare"><a href="#" data-tippy="Add to Compare"
                                                                                   data-tippy-placement="top"
                                                                                   data-tippy-arrow="true"
                                                                                   data-tippy-inertia="true"><span
                                                                        class="lnr lnr-sync"></span></a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="price_box">
                                                        <span class="current_price">$46.00</span>
                                                        <span class="old_price">$382.00</span>
                                                    </div>
                                                </figcaption>
                                            </figure>
                                        </article>
                                    </div>
                                    <div class="product_items">
                                        <article class="single_product">
                                            <figure>
                                                <div class="product_thumb">
                                                    <a class="primary_img" href="product-details.html"><img
                                                            src="{{ url('assets/frontend/img/product/product7.jpg')}}"
                                                            alt=""></a>
                                                    <a class="secondary_img" href="product-details.html"><img
                                                            src="{{ url('assets/frontend/img/product/product8.jpg')}}"
                                                            alt=""></a>
                                                </div>
                                                <figcaption class="product_content">
                                                    <h4 class="product_name"><a href="product-details.html">Quisque In
                                                            Arcu</a></h4>
                                                    <p><a href="#">Fruits</a></p>
                                                    <div class="action_links">
                                                        <ul>
                                                            <li class="add_to_cart"><a href="cart.html"
                                                                                       data-tippy="Add to cart"
                                                                                       data-tippy-placement="top"
                                                                                       data-tippy-arrow="true"
                                                                                       data-tippy-inertia="true"> <span
                                                                        class="lnr lnr-cart"></span></a></li>
                                                            <li class="quick_button"><a href="#" data-tippy="quick view"
                                                                                        data-tippy-placement="top"
                                                                                        data-tippy-arrow="true"
                                                                                        data-tippy-inertia="true"
                                                                                        data-bs-toggle="modal"
                                                                                        data-bs-target="#modal_box">
                                                                    <span class="lnr lnr-magnifier"></span></a></li>
                                                            <li class="wishlist"><a href="wishlist.html"
                                                                                    data-tippy="Add to Wishlist"
                                                                                    data-tippy-placement="top"
                                                                                    data-tippy-arrow="true"
                                                                                    data-tippy-inertia="true"><span
                                                                        class="lnr lnr-heart"></span></a></li>
                                                            <li class="compare"><a href="#" data-tippy="Add to Compare"
                                                                                   data-tippy-placement="top"
                                                                                   data-tippy-arrow="true"
                                                                                   data-tippy-inertia="true"><span
                                                                        class="lnr lnr-sync"></span></a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="price_box">
                                                        <span class="current_price">$20.00</span>
                                                        <span class="old_price">$352.00</span>
                                                    </div>
                                                </figcaption>
                                            </figure>
                                        </article>
                                        <article class="single_product">
                                            <figure>
                                                <div class="product_thumb">
                                                    <a class="primary_img" href="product-details.html"><img
                                                            src="{{ url('assets/frontend/img/product/product9.jpg')}}"
                                                            alt=""></a>
                                                    <a class="secondary_img" href="product-details.html"><img
                                                            src="{{ url('assets/frontend/img/product/product10.jpg')}}"
                                                            alt=""></a>
                                                </div>
                                                <figcaption class="product_content">
                                                    <h4 class="product_name"><a href="product-details.html">Cas Meque
                                                            Metus</a></h4>
                                                    <p><a href="#">Fruits</a></p>
                                                    <div class="action_links">
                                                        <ul>
                                                            <li class="add_to_cart"><a href="cart.html"
                                                                                       data-tippy="Add to cart"
                                                                                       data-tippy-placement="top"
                                                                                       data-tippy-arrow="true"
                                                                                       data-tippy-inertia="true"> <span
                                                                        class="lnr lnr-cart"></span></a></li>
                                                            <li class="quick_button"><a href="#" data-tippy="quick view"
                                                                                        data-tippy-placement="top"
                                                                                        data-tippy-arrow="true"
                                                                                        data-tippy-inertia="true"
                                                                                        data-bs-toggle="modal"
                                                                                        data-bs-target="#modal_box">
                                                                    <span class="lnr lnr-magnifier"></span></a></li>
                                                            <li class="wishlist"><a href="wishlist.html"
                                                                                    data-tippy="Add to Wishlist"
                                                                                    data-tippy-placement="top"
                                                                                    data-tippy-arrow="true"
                                                                                    data-tippy-inertia="true"><span
                                                                        class="lnr lnr-heart"></span></a></li>
                                                            <li class="compare"><a href="#" data-tippy="Add to Compare"
                                                                                   data-tippy-placement="top"
                                                                                   data-tippy-arrow="true"
                                                                                   data-tippy-inertia="true"><span
                                                                        class="lnr lnr-sync"></span></a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="price_box">
                                                        <span class="current_price">$72.00</span>
                                                        <span class="old_price">$352.00</span>
                                                    </div>
                                                </figcaption>
                                            </figure>
                                        </article>
                                    </div>
                                    <div class="product_items">
                                        <article class="single_product">
                                            <figure>
                                                <div class="product_thumb">
                                                    <a class="primary_img" href="product-details.html"><img
                                                            src="{{ url('assets/frontend/img/product/product13.jpg')}}"
                                                            alt=""></a>
                                                    <a class="secondary_img" href="product-details.html"><img
                                                            src="{{ url('assets/frontend/img/product/product1.jpg')}}"
                                                            alt=""></a>
                                                </div>
                                                <figcaption class="product_content">
                                                    <h4 class="product_name"><a href="product-details.html">Mauris Vel
                                                            Tellus</a></h4>
                                                    <p><a href="#">Fruits</a></p>
                                                    <div class="action_links">
                                                        <ul>
                                                            <li class="add_to_cart"><a href="cart.html"
                                                                                       data-tippy="Add to cart"
                                                                                       data-tippy-placement="top"
                                                                                       data-tippy-arrow="true"
                                                                                       data-tippy-inertia="true"> <span
                                                                        class="lnr lnr-cart"></span></a></li>
                                                            <li class="quick_button"><a href="#" data-tippy="quick view"
                                                                                        data-tippy-placement="top"
                                                                                        data-tippy-arrow="true"
                                                                                        data-tippy-inertia="true"
                                                                                        data-bs-toggle="modal"
                                                                                        data-bs-target="#modal_box">
                                                                    <span class="lnr lnr-magnifier"></span></a></li>
                                                            <li class="wishlist"><a href="wishlist.html"
                                                                                    data-tippy="Add to Wishlist"
                                                                                    data-tippy-placement="top"
                                                                                    data-tippy-arrow="true"
                                                                                    data-tippy-inertia="true"><span
                                                                        class="lnr lnr-heart"></span></a></li>
                                                            <li class="compare"><a href="#" data-tippy="Add to Compare"
                                                                                   data-tippy-placement="top"
                                                                                   data-tippy-arrow="true"
                                                                                   data-tippy-inertia="true"><span
                                                                        class="lnr lnr-sync"></span></a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="price_box">
                                                        <span class="current_price">$45.00</span>
                                                        <span class="old_price">$162.00</span>
                                                    </div>
                                                </figcaption>
                                            </figure>
                                        </article>
                                        <article class="single_product">
                                            <figure>
                                                <div class="product_thumb">
                                                    <a class="primary_img" href="product-details.html"><img
                                                            src="{{ url('assets/frontend/img/product/product10.jpg')}}"
                                                            alt=""></a>
                                                    <a class="secondary_img" href="product-details.html"><img
                                                            src="{{ url('assets/frontend/img/product/product3.jpg')}}"
                                                            alt=""></a>
                                                </div>
                                                <figcaption class="product_content">
                                                    <h4 class="product_name"><a href="product-details.html">Donec Non
                                                            Est</a></h4>
                                                    <p><a href="#">Fruits</a></p>
                                                    <div class="action_links">
                                                        <ul>
                                                            <li class="add_to_cart"><a href="cart.html"
                                                                                       data-tippy="Add to cart"
                                                                                       data-tippy-placement="top"
                                                                                       data-tippy-arrow="true"
                                                                                       data-tippy-inertia="true"> <span
                                                                        class="lnr lnr-cart"></span></a></li>
                                                            <li class="quick_button"><a href="#" data-tippy="quick view"
                                                                                        data-tippy-placement="top"
                                                                                        data-tippy-arrow="true"
                                                                                        data-tippy-inertia="true"
                                                                                        data-bs-toggle="modal"
                                                                                        data-bs-target="#modal_box">
                                                                    <span class="lnr lnr-magnifier"></span></a></li>
                                                            <li class="wishlist"><a href="wishlist.html"
                                                                                    data-tippy="Add to Wishlist"
                                                                                    data-tippy-placement="top"
                                                                                    data-tippy-arrow="true"
                                                                                    data-tippy-inertia="true"><span
                                                                        class="lnr lnr-heart"></span></a></li>
                                                            <li class="compare"><a href="#" data-tippy="Add to Compare"
                                                                                   data-tippy-placement="top"
                                                                                   data-tippy-arrow="true"
                                                                                   data-tippy-inertia="true"><span
                                                                        class="lnr lnr-sync"></span></a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="price_box">
                                                        <span class="current_price">$46.00</span>
                                                        <span class="old_price">$382.00</span>
                                                    </div>
                                                </figcaption>
                                            </figure>
                                        </article>
                                    </div>
                                </div>
                            </div>
                            <div class="product_conatiner3">
                                <div class="section_title">
                                    <h2>New Products</h2>
                                </div>
                                <div class="product_carousel product3_column3 owl-carousel">
                                    <div class="product_items">
                                        <article class="single_product">
                                            <figure>
                                                <div class="product_thumb">
                                                    <a class="primary_img" href="product-details.html"><img
                                                            src="{{ url('assets/frontend/img/product/product1.jpg')}}"
                                                            alt=""></a>
                                                    <a class="secondary_img" href="product-details.html"><img
                                                            src="{{ url('assets/frontend/img/product/product2.jpg')}}"
                                                            alt=""></a>
                                                    <div class="label_product">
                                                        <span class="label_sale">Sale</span>
                                                        <span class="label_new">New</span>
                                                    </div>
                                                    <div class="action_links">
                                                        <ul>
                                                            <li class="add_to_cart"><a href="cart.html"
                                                                                       data-tippy="Add to cart"
                                                                                       data-tippy-placement="top"
                                                                                       data-tippy-arrow="true"
                                                                                       data-tippy-inertia="true"> <span
                                                                        class="lnr lnr-cart"></span></a></li>
                                                            <li class="quick_button"><a href="#" data-tippy="quick view"
                                                                                        data-tippy-placement="top"
                                                                                        data-tippy-arrow="true"
                                                                                        data-tippy-inertia="true"
                                                                                        data-bs-toggle="modal"
                                                                                        data-bs-target="#modal_box">
                                                                    <span class="lnr lnr-magnifier"></span></a></li>
                                                            <li class="wishlist"><a href="wishlist.html"
                                                                                    data-tippy="Add to Wishlist"
                                                                                    data-tippy-placement="top"
                                                                                    data-tippy-arrow="true"
                                                                                    data-tippy-inertia="true"><span
                                                                        class="lnr lnr-heart"></span></a></li>
                                                            <li class="compare"><a href="#" data-tippy="Add to Compare"
                                                                                   data-tippy-placement="top"
                                                                                   data-tippy-arrow="true"
                                                                                   data-tippy-inertia="true"><span
                                                                        class="lnr lnr-sync"></span></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <figcaption class="product_content">
                                                    <h4 class="product_name"><a href="product-details.html">Aliquam
                                                            Consequat</a></h4>
                                                    <p><a href="#">Fruits</a></p>
                                                    <div class="price_box">
                                                        <span class="current_price">$26.00</span>
                                                        <span class="old_price">$362.00</span>
                                                    </div>
                                                </figcaption>
                                            </figure>
                                        </article>
                                        <article class="single_product">
                                            <figure>
                                                <div class="product_thumb">
                                                    <a class="primary_img" href="product-details.html"><img
                                                            src="{{ url('assets/frontend/img/product/product3.jpg')}}"
                                                            alt=""></a>
                                                    <a class="secondary_img" href="product-details.html"><img
                                                            src="{{ url('assets/frontend/img/product/product4.jpg')}}"
                                                            alt=""></a>
                                                    <div class="label_product">
                                                        <span class="label_sale">Sale</span>
                                                    </div>
                                                    <div class="action_links">
                                                        <ul>
                                                            <li class="add_to_cart"><a href="cart.html"
                                                                                       data-tippy="Add to cart"
                                                                                       data-tippy-placement="top"
                                                                                       data-tippy-arrow="true"
                                                                                       data-tippy-inertia="true"> <span
                                                                        class="lnr lnr-cart"></span></a></li>
                                                            <li class="quick_button"><a href="#" data-tippy="quick view"
                                                                                        data-tippy-placement="top"
                                                                                        data-tippy-arrow="true"
                                                                                        data-tippy-inertia="true"
                                                                                        data-bs-toggle="modal"
                                                                                        data-bs-target="#modal_box">
                                                                    <span class="lnr lnr-magnifier"></span></a></li>
                                                            <li class="wishlist"><a href="wishlist.html"
                                                                                    data-tippy="Add to Wishlist"
                                                                                    data-tippy-placement="top"
                                                                                    data-tippy-arrow="true"
                                                                                    data-tippy-inertia="true"><span
                                                                        class="lnr lnr-heart"></span></a></li>
                                                            <li class="compare"><a href="#" data-tippy="Add to Compare"
                                                                                   data-tippy-placement="top"
                                                                                   data-tippy-arrow="true"
                                                                                   data-tippy-inertia="true"><span
                                                                        class="lnr lnr-sync"></span></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <figcaption class="product_content">
                                                    <h4 class="product_name"><a href="product-details.html">Donec Non
                                                            Est</a></h4>
                                                    <p><a href="#">Fruits</a></p>
                                                    <div class="price_box">
                                                        <span class="current_price">$46.00</span>
                                                        <span class="old_price">$382.00</span>
                                                    </div>
                                                </figcaption>
                                            </figure>
                                        </article>
                                    </div>
                                    <div class="product_items">
                                        <article class="single_product">
                                            <figure>
                                                <div class="product_thumb">
                                                    <a class="primary_img" href="product-details.html"><img
                                                            src="{{ url('assets/frontend/img/product/product5.jpg')}}"
                                                            alt=""></a>
                                                    <a class="secondary_img" href="product-details.html"><img
                                                            src="{{ url('assets/frontend/img/product/product6.jpg')}}"
                                                            alt=""></a>
                                                    <div class="label_product">
                                                        <span class="label_sale">Sale</span>

                                                    </div>
                                                    <div class="action_links">
                                                        <ul>
                                                            <li class="add_to_cart"><a href="cart.html"
                                                                                       data-tippy="Add to cart"
                                                                                       data-tippy-placement="top"
                                                                                       data-tippy-arrow="true"
                                                                                       data-tippy-inertia="true"> <span
                                                                        class="lnr lnr-cart"></span></a></li>
                                                            <li class="quick_button"><a href="#" data-tippy="quick view"
                                                                                        data-tippy-placement="top"
                                                                                        data-tippy-arrow="true"
                                                                                        data-tippy-inertia="true"
                                                                                        data-bs-toggle="modal"
                                                                                        data-bs-target="#modal_box">
                                                                    <span class="lnr lnr-magnifier"></span></a></li>
                                                            <li class="wishlist"><a href="wishlist.html"
                                                                                    data-tippy="Add to Wishlist"
                                                                                    data-tippy-placement="top"
                                                                                    data-tippy-arrow="true"
                                                                                    data-tippy-inertia="true"><span
                                                                        class="lnr lnr-heart"></span></a></li>
                                                            <li class="compare"><a href="#" data-tippy="Add to Compare"
                                                                                   data-tippy-placement="top"
                                                                                   data-tippy-arrow="true"
                                                                                   data-tippy-inertia="true"><span
                                                                        class="lnr lnr-sync"></span></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <figcaption class="product_content">
                                                    <h4 class="product_name"><a href="product-details.html">Etiam
                                                            Gravida</a></h4>
                                                    <p><a href="#">Fruits</a></p>
                                                    <div class="price_box">
                                                        <span class="current_price">$56.00</span>
                                                        <span class="old_price">$322.00</span>
                                                    </div>
                                                </figcaption>
                                            </figure>
                                        </article>
                                        <article class="single_product">
                                            <figure>
                                                <div class="product_thumb">
                                                    <a class="primary_img" href="product-details.html"><img
                                                            src="{{ url('assets/frontend/img/product/product7.jpg')}}"
                                                            alt=""></a>
                                                    <a class="secondary_img" href="product-details.html"><img
                                                            src="{{ url('assets/frontend/img/product/product8.jpg')}}"
                                                            alt=""></a>
                                                    <div class="label_product">
                                                        <span class="label_sale">Sale</span>
                                                        <span class="label_new">New</span>
                                                    </div>
                                                    <div class="action_links">
                                                        <ul>
                                                            <li class="add_to_cart"><a href="cart.html"
                                                                                       data-tippy="Add to cart"
                                                                                       data-tippy-placement="top"
                                                                                       data-tippy-arrow="true"
                                                                                       data-tippy-inertia="true"> <span
                                                                        class="lnr lnr-cart"></span></a></li>
                                                            <li class="quick_button"><a href="#" data-tippy="quick view"
                                                                                        data-tippy-placement="top"
                                                                                        data-tippy-arrow="true"
                                                                                        data-tippy-inertia="true"
                                                                                        data-bs-toggle="modal"
                                                                                        data-bs-target="#modal_box">
                                                                    <span class="lnr lnr-magnifier"></span></a></li>
                                                            <li class="wishlist"><a href="wishlist.html"
                                                                                    data-tippy="Add to Wishlist"
                                                                                    data-tippy-placement="top"
                                                                                    data-tippy-arrow="true"
                                                                                    data-tippy-inertia="true"><span
                                                                        class="lnr lnr-heart"></span></a></li>
                                                            <li class="compare"><a href="#" data-tippy="Add to Compare"
                                                                                   data-tippy-placement="top"
                                                                                   data-tippy-arrow="true"
                                                                                   data-tippy-inertia="true"><span
                                                                        class="lnr lnr-sync"></span></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <figcaption class="product_content">
                                                    <h4 class="product_name"><a href="product-details.html">Fusce
                                                            Aliquam</a></h4>
                                                    <p><a href="#">Fruits</a></p>
                                                    <div class="price_box">
                                                        <span class="current_price">$66.00</span>
                                                        <span class="old_price">$312.00</span>
                                                    </div>
                                                </figcaption>
                                            </figure>
                                        </article>
                                    </div>
                                    <div class="product_items">
                                        <article class="single_product">
                                            <figure>
                                                <div class="product_thumb">
                                                    <a class="primary_img" href="product-details.html"><img
                                                            src="{{ url('assets/frontend/img/product/product9.jpg')}}"
                                                            alt=""></a>
                                                    <a class="secondary_img" href="product-details.html"><img
                                                            src="{{ url('assets/frontend/img/product/product10.jpg')}}"
                                                            alt=""></a>
                                                    <div class="label_product">
                                                        <span class="label_sale">Sale</span>
                                                    </div>
                                                    <div class="action_links">
                                                        <ul>
                                                            <li class="add_to_cart"><a href="cart.html"
                                                                                       data-tippy="Add to cart"
                                                                                       data-tippy-placement="top"
                                                                                       data-tippy-arrow="true"
                                                                                       data-tippy-inertia="true"> <span
                                                                        class="lnr lnr-cart"></span></a></li>
                                                            <li class="quick_button"><a href="#" data-tippy="quick view"
                                                                                        data-tippy-placement="top"
                                                                                        data-tippy-arrow="true"
                                                                                        data-tippy-inertia="true"
                                                                                        data-bs-toggle="modal"
                                                                                        data-bs-target="#modal_box">
                                                                    <span class="lnr lnr-magnifier"></span></a></li>
                                                            <li class="wishlist"><a href="wishlist.html"
                                                                                    data-tippy="Add to Wishlist"
                                                                                    data-tippy-placement="top"
                                                                                    data-tippy-arrow="true"
                                                                                    data-tippy-inertia="true"><span
                                                                        class="lnr lnr-heart"></span></a></li>
                                                            <li class="compare"><a href="#" data-tippy="Add to Compare"
                                                                                   data-tippy-placement="top"
                                                                                   data-tippy-arrow="true"
                                                                                   data-tippy-inertia="true"><span
                                                                        class="lnr lnr-sync"></span></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <figcaption class="product_content">
                                                    <h4 class="product_name"><a href="product-details.html">Letraset
                                                            Sheets</a></h4>
                                                    <p><a href="#">Fruits</a></p>
                                                    <div class="price_box">
                                                        <span class="current_price">$38.00</span>
                                                        <span class="old_price">$262.00</span>
                                                    </div>
                                                </figcaption>
                                            </figure>
                                        </article>
                                        <article class="single_product">
                                            <figure>
                                                <div class="product_thumb">
                                                    <a class="primary_img" href="product-details.html"><img
                                                            src="{{ url('assets/frontend/img/product/product11.jpg')}}"
                                                            alt=""></a>
                                                    <a class="secondary_img" href="product-details.html"><img
                                                            src="{{ url('assets/frontend/img/product/product12.jpg')}}"
                                                            alt=""></a>
                                                    <div class="label_product">
                                                        <span class="label_sale">Sale</span>
                                                        <span class="label_new">New</span>
                                                    </div>
                                                    <div class="action_links">
                                                        <ul>
                                                            <li class="add_to_cart"><a href="cart.html"
                                                                                       data-tippy="Add to cart"
                                                                                       data-tippy-placement="top"
                                                                                       data-tippy-arrow="true"
                                                                                       data-tippy-inertia="true"> <span
                                                                        class="lnr lnr-cart"></span></a></li>
                                                            <li class="quick_button"><a href="#" data-tippy="quick view"
                                                                                        data-tippy-placement="top"
                                                                                        data-tippy-arrow="true"
                                                                                        data-tippy-inertia="true"
                                                                                        data-bs-toggle="modal"
                                                                                        data-bs-target="#modal_box">
                                                                    <span class="lnr lnr-magnifier"></span></a></li>
                                                            <li class="wishlist"><a href="wishlist.html"
                                                                                    data-tippy="Add to Wishlist"
                                                                                    data-tippy-placement="top"
                                                                                    data-tippy-arrow="true"
                                                                                    data-tippy-inertia="true"><span
                                                                        class="lnr lnr-heart"></span></a></li>
                                                            <li class="compare"><a href="#" data-tippy="Add to Compare"
                                                                                   data-tippy-placement="top"
                                                                                   data-tippy-arrow="true"
                                                                                   data-tippy-inertia="true"><span
                                                                        class="lnr lnr-sync"></span></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <figcaption class="product_content">
                                                    <h4 class="product_name"><a href="product-details.html">Lorem Ipsum
                                                            Lec</a></h4>
                                                    <p><a href="#">Fruits</a></p>
                                                    <div class="price_box">
                                                        <span class="current_price">$36.00</span>
                                                        <span class="old_price">$145.00</span>
                                                    </div>
                                                </figcaption>
                                            </figure>
                                        </article>
                                    </div>
                                    <div class="product_items">
                                        <article class="single_product">
                                            <figure>
                                                <div class="product_thumb">
                                                    <a class="primary_img" href="product-details.html"><img
                                                            src="{{ url('assets/frontend/img/product/product13.jpg')}}"
                                                            alt=""></a>
                                                    <a class="secondary_img" href="product-details.html"><img
                                                            src="{{ url('assets/frontend/img/product/product1.jpg')}}"
                                                            alt=""></a>
                                                    <div class="label_product">
                                                        <span class="label_sale">Sale</span>
                                                        <span class="label_new">New</span>
                                                    </div>
                                                    <div class="action_links">
                                                        <ul>
                                                            <li class="add_to_cart"><a href="cart.html"
                                                                                       data-tippy="Add to cart"
                                                                                       data-tippy-placement="top"
                                                                                       data-tippy-arrow="true"
                                                                                       data-tippy-inertia="true"> <span
                                                                        class="lnr lnr-cart"></span></a></li>
                                                            <li class="quick_button"><a href="#" data-tippy="quick view"
                                                                                        data-tippy-placement="top"
                                                                                        data-tippy-arrow="true"
                                                                                        data-tippy-inertia="true"
                                                                                        data-bs-toggle="modal"
                                                                                        data-bs-target="#modal_box">
                                                                    <span class="lnr lnr-magnifier"></span></a></li>
                                                            <li class="wishlist"><a href="wishlist.html"
                                                                                    data-tippy="Add to Wishlist"
                                                                                    data-tippy-placement="top"
                                                                                    data-tippy-arrow="true"
                                                                                    data-tippy-inertia="true"><span
                                                                        class="lnr lnr-heart"></span></a></li>
                                                            <li class="compare"><a href="#" data-tippy="Add to Compare"
                                                                                   data-tippy-placement="top"
                                                                                   data-tippy-arrow="true"
                                                                                   data-tippy-inertia="true"><span
                                                                        class="lnr lnr-sync"></span></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <figcaption class="product_content">
                                                    <h4 class="product_name"><a href="product-details.html">Mauris Vel
                                                            Tellus</a></h4>
                                                    <p><a href="#">Fruits</a></p>
                                                    <div class="price_box">
                                                        <span class="current_price">$48.00</span>
                                                        <span class="old_price">$257.00</span>
                                                    </div>
                                                </figcaption>
                                            </figure>
                                        </article>
                                        <article class="single_product">
                                            <figure>
                                                <div class="product_thumb">
                                                    <a class="primary_img" href="product-details.html"><img
                                                            src="{{ url('assets/frontend/img/product/product12.jpg')}}"
                                                            alt=""></a>
                                                    <a class="secondary_img" href="product-details.html"><img
                                                            src="{{ url('assets/frontend/img/product/product2.jpg')}}"
                                                            alt=""></a>
                                                    <div class="label_product">
                                                        <span class="label_sale">Sale</span>
                                                    </div>
                                                    <div class="action_links">
                                                        <ul>
                                                            <li class="add_to_cart"><a href="cart.html"
                                                                                       data-tippy="Add to cart"
                                                                                       data-tippy-placement="top"
                                                                                       data-tippy-arrow="true"
                                                                                       data-tippy-inertia="true"> <span
                                                                        class="lnr lnr-cart"></span></a></li>
                                                            <li class="quick_button"><a href="#" data-tippy="quick view"
                                                                                        data-tippy-placement="top"
                                                                                        data-tippy-arrow="true"
                                                                                        data-tippy-inertia="true"
                                                                                        data-bs-toggle="modal"
                                                                                        data-bs-target="#modal_box">
                                                                    <span class="lnr lnr-magnifier"></span></a></li>
                                                            <li class="wishlist"><a href="wishlist.html"
                                                                                    data-tippy="Add to Wishlist"
                                                                                    data-tippy-placement="top"
                                                                                    data-tippy-arrow="true"
                                                                                    data-tippy-inertia="true"><span
                                                                        class="lnr lnr-heart"></span></a></li>
                                                            <li class="compare"><a href="#" data-tippy="Add to Compare"
                                                                                   data-tippy-placement="top"
                                                                                   data-tippy-arrow="true"
                                                                                   data-tippy-inertia="true"><span
                                                                        class="lnr lnr-sync"></span></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <figcaption class="product_content">
                                                    <h4 class="product_name"><a href="product-details.html">Nunc Neque
                                                            Eros</a></h4>
                                                    <p><a href="#">Fruits</a></p>
                                                    <div class="price_box">
                                                        <span class="current_price">$35.00</span>
                                                        <span class="old_price">$245.00</span>
                                                    </div>
                                                </figcaption>
                                            </figure>
                                        </article>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--home three bg area end-->

        <!--blog area start-->
        <section class="blog_section blog_s_three color_three">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section_title">
                            <p>Our recent articles about Organic</p>
                            <h2>Our Blog Posts</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="blog_carousel blog_column3 owl-carousel">
                        <div class="col-lg-3">
                            <article class="single_blog">
                                <figure>
                                    <div class="blog_thumb">
                                        <a href="blog-details.html"><img
                                                src="{{ url('assets/frontend/img/blog/blog1.jpg')}}" alt=""></a>
                                    </div>
                                    <figcaption class="blog_content">
                                        <div class="articles_date">
                                            <p>23/06/2021 | <a href="#">eCommerce</a></p>
                                        </div>
                                        <h4 class="post_title"><a href="blog-details.html">Lorem ipsum dolor sit amet,
                                                elit. Impedit, aliquam animi, saepe ex.</a></h4>
                                        <footer class="blog_footer">
                                            <a href="blog-details.html">Show more</a>
                                        </footer>
                                    </figcaption>
                                </figure>
                            </article>
                        </div>
                        <div class="col-lg-3">
                            <article class="single_blog">
                                <figure>
                                    <div class="blog_thumb">
                                        <a href="blog-details.html"><img
                                                src="{{ url('assets/frontend/img/blog/blog2.jpg')}}" alt=""></a>
                                    </div>
                                    <figcaption class="blog_content">
                                        <div class="articles_date">
                                            <p>23/06/2021 | <a href="#">eCommerce</a></p>
                                        </div>
                                        <h4 class="post_title"><a href="blog-details.html"> dolor sit amet, elit. Illo
                                                iste sed animi quaerat nobis odit nulla.</a></h4>
                                        <footer class="blog_footer">
                                            <a href="blog-details.html">Show more</a>
                                        </footer>
                                    </figcaption>
                                </figure>
                            </article>
                        </div>
                        <div class="col-lg-3">
                            <article class="single_blog">
                                <figure>
                                    <div class="blog_thumb">
                                        <a href="blog-details.html"><img
                                                src="{{ url('assets/frontend/img/blog/blog3.jpg')}}" alt=""></a>
                                    </div>
                                    <figcaption class="blog_content">
                                        <div class="articles_date">
                                            <p>23/06/2021 | <a href="#">eCommerce</a></p>
                                        </div>
                                        <h4 class="post_title"><a href="blog-details.html">maxime laborum voluptas
                                                minus, est, unde eaque esse tenetur.</a></h4>
                                        <footer class="blog_footer">
                                            <a href="blog-details.html">Show more</a>
                                        </footer>
                                    </figcaption>
                                </figure>
                            </article>
                        </div>
                        <div class="col-lg-3">
                            <article class="single_blog">
                                <figure>
                                    <div class="blog_thumb">
                                        <a href="blog-details.html"><img
                                                src="{{ url('assets/frontend/img/blog/blog2.jpg')}}" alt=""></a>
                                    </div>
                                    <figcaption class="blog_content">
                                        <div class="articles_date">
                                            <p>23/06/2021 | <a href="#">eCommerce</a></p>
                                        </div>
                                        <h4 class="post_title"><a href="blog-details.html">Lorem ipsum dolor sit amet,
                                                elit. Impedit, aliquam animi, saepe ex.</a></h4>
                                        <footer class="blog_footer">
                                            <a href="blog-details.html">Show more</a>
                                        </footer>
                                    </figcaption>
                                </figure>
                            </article>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--blog area end-->

        <!--banner area start-->
        <div class="banner_area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="banner_thumb">
                            <a href="shop.html"><img src="{{ url('assets/frontend/img/bg/banner13.jpg')}}" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--banner area end-->

        <!--custom product area start-->
        <div class="custom_product_area custom_product3 color_three">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="single_custom_product3">
                            <div class="section_title">
                                <h2>Fruits</h2>
                            </div>
                            <div class="small_product_area product_carousel product_column1 owl-carousel">
                                <div class="product_items">
                                    <article class="single_product">
                                        <figure>
                                            <div class="product_thumb">
                                                <a class="primary_img" href="product-details.html"><img
                                                        src="{{ url('assets/frontend/img/product/product1.jpg')}}"
                                                        alt=""></a>
                                                <a class="secondary_img" href="product-details.html"><img
                                                        src="{{ url('assets/frontend/img/product/product2.jpg')}}"
                                                        alt=""></a>
                                            </div>
                                            <figcaption class="product_content">
                                                <h4 class="product_name"><a href="product-details.html">Aliquam
                                                        Consequat</a></h4>
                                                <p><a href="#">Fruits</a></p>
                                                <div class="action_links">
                                                    <ul>
                                                        <li class="add_to_cart"><a href="cart.html"
                                                                                   data-tippy="Add to cart"
                                                                                   data-tippy-placement="top"
                                                                                   data-tippy-arrow="true"
                                                                                   data-tippy-inertia="true"> <span
                                                                    class="lnr lnr-cart"></span></a></li>
                                                        <li class="quick_button"><a href="#" data-tippy="quick view"
                                                                                    data-tippy-placement="top"
                                                                                    data-tippy-arrow="true"
                                                                                    data-tippy-inertia="true"
                                                                                    data-bs-toggle="modal"
                                                                                    data-bs-target="#modal_box"> <span
                                                                    class="lnr lnr-magnifier"></span></a></li>
                                                        <li class="wishlist"><a href="wishlist.html"
                                                                                data-tippy="Add to Wishlist"
                                                                                data-tippy-placement="top"
                                                                                data-tippy-arrow="true"
                                                                                data-tippy-inertia="true"><span
                                                                    class="lnr lnr-heart"></span></a></li>
                                                        <li class="compare"><a href="#" data-tippy="Add to Compare"
                                                                               data-tippy-placement="top"
                                                                               data-tippy-arrow="true"
                                                                               data-tippy-inertia="true"><span
                                                                    class="lnr lnr-sync"></span></a></li>
                                                    </ul>
                                                </div>
                                                <div class="price_box">
                                                    <span class="current_price">$26.00</span>
                                                    <span class="old_price">$362.00</span>
                                                </div>
                                            </figcaption>
                                        </figure>
                                    </article>
                                    <article class="single_product">
                                        <figure>
                                            <div class="product_thumb">
                                                <a class="primary_img" href="product-details.html"><img
                                                        src="{{ url('assets/frontend/img/product/product3.jpg')}}"
                                                        alt=""></a>
                                                <a class="secondary_img" href="product-details.html"><img
                                                        src="{{ url('assets/frontend/img/product/product4.jpg')}}"
                                                        alt=""></a>
                                            </div>
                                            <figcaption class="product_content">
                                                <h4 class="product_name"><a href="product-details.html">Donec Non
                                                        Est</a></h4>
                                                <p><a href="#">Fruits</a></p>
                                                <div class="action_links">
                                                    <ul>
                                                        <li class="add_to_cart"><a href="cart.html"
                                                                                   data-tippy="Add to cart"
                                                                                   data-tippy-placement="top"
                                                                                   data-tippy-arrow="true"
                                                                                   data-tippy-inertia="true"> <span
                                                                    class="lnr lnr-cart"></span></a></li>
                                                        <li class="quick_button"><a href="#" data-tippy="quick view"
                                                                                    data-tippy-placement="top"
                                                                                    data-tippy-arrow="true"
                                                                                    data-tippy-inertia="true"
                                                                                    data-bs-toggle="modal"
                                                                                    data-bs-target="#modal_box"> <span
                                                                    class="lnr lnr-magnifier"></span></a></li>
                                                        <li class="wishlist"><a href="wishlist.html"
                                                                                data-tippy="Add to Wishlist"
                                                                                data-tippy-placement="top"
                                                                                data-tippy-arrow="true"
                                                                                data-tippy-inertia="true"><span
                                                                    class="lnr lnr-heart"></span></a></li>
                                                        <li class="compare"><a href="#" data-tippy="Add to Compare"
                                                                               data-tippy-placement="top"
                                                                               data-tippy-arrow="true"
                                                                               data-tippy-inertia="true"><span
                                                                    class="lnr lnr-sync"></span></a></li>
                                                    </ul>
                                                </div>
                                                <div class="price_box">
                                                    <span class="current_price">$46.00</span>
                                                    <span class="old_price">$382.00</span>
                                                </div>
                                            </figcaption>
                                        </figure>
                                    </article>
                                    <article class="single_product">
                                        <figure>
                                            <div class="product_thumb">
                                                <a class="primary_img" href="product-details.html"><img
                                                        src="{{ url('assets/frontend/img/product/product5.jpg')}}"
                                                        alt=""></a>
                                                <a class="secondary_img" href="product-details.html"><img
                                                        src="{{ url('assets/frontend/img/product/product6.jpg')}}"
                                                        alt=""></a>
                                            </div>
                                            <figcaption class="product_content">
                                                <h4 class="product_name"><a href="product-details.html">Mauris Vel
                                                        Tellus</a></h4>
                                                <p><a href="#">Fruits</a></p>
                                                <div class="action_links">
                                                    <ul>
                                                        <li class="add_to_cart"><a href="cart.html"
                                                                                   data-tippy="Add to cart"
                                                                                   data-tippy-placement="top"
                                                                                   data-tippy-arrow="true"
                                                                                   data-tippy-inertia="true"> <span
                                                                    class="lnr lnr-cart"></span></a></li>
                                                        <li class="quick_button"><a href="#" data-tippy="quick view"
                                                                                    data-tippy-placement="top"
                                                                                    data-tippy-arrow="true"
                                                                                    data-tippy-inertia="true"
                                                                                    data-bs-toggle="modal"
                                                                                    data-bs-target="#modal_box"> <span
                                                                    class="lnr lnr-magnifier"></span></a></li>
                                                        <li class="wishlist"><a href="wishlist.html"
                                                                                data-tippy="Add to Wishlist"
                                                                                data-tippy-placement="top"
                                                                                data-tippy-arrow="true"
                                                                                data-tippy-inertia="true"><span
                                                                    class="lnr lnr-heart"></span></a></li>
                                                        <li class="compare"><a href="#" data-tippy="Add to Compare"
                                                                               data-tippy-placement="top"
                                                                               data-tippy-arrow="true"
                                                                               data-tippy-inertia="true"><span
                                                                    class="lnr lnr-sync"></span></a></li>
                                                    </ul>
                                                </div>
                                                <div class="price_box">
                                                    <span class="current_price">$56.00</span>
                                                    <span class="old_price">$362.00</span>
                                                </div>
                                            </figcaption>
                                        </figure>
                                    </article>
                                </div>
                                <div class="product_items">
                                    <article class="single_product">
                                        <figure>
                                            <div class="product_thumb">
                                                <a class="primary_img" href="product-details.html"><img
                                                        src="{{ url('assets/frontend/img/product/product7.jpg')}}"
                                                        alt=""></a>
                                                <a class="secondary_img" href="product-details.html"><img
                                                        src="{{ url('assets/frontend/img/product/product8.jpg')}}"
                                                        alt=""></a>
                                            </div>
                                            <figcaption class="product_content">
                                                <h4 class="product_name"><a href="product-details.html">Quisque In
                                                        Arcu</a></h4>
                                                <p><a href="#">Fruits</a></p>
                                                <div class="action_links">
                                                    <ul>
                                                        <li class="add_to_cart"><a href="cart.html"
                                                                                   data-tippy="Add to cart"
                                                                                   data-tippy-placement="top"
                                                                                   data-tippy-arrow="true"
                                                                                   data-tippy-inertia="true"> <span
                                                                    class="lnr lnr-cart"></span></a></li>
                                                        <li class="quick_button"><a href="#" data-tippy="quick view"
                                                                                    data-tippy-placement="top"
                                                                                    data-tippy-arrow="true"
                                                                                    data-tippy-inertia="true"
                                                                                    data-bs-toggle="modal"
                                                                                    data-bs-target="#modal_box"> <span
                                                                    class="lnr lnr-magnifier"></span></a></li>
                                                        <li class="wishlist"><a href="wishlist.html"
                                                                                data-tippy="Add to Wishlist"
                                                                                data-tippy-placement="top"
                                                                                data-tippy-arrow="true"
                                                                                data-tippy-inertia="true"><span
                                                                    class="lnr lnr-heart"></span></a></li>
                                                        <li class="compare"><a href="#" data-tippy="Add to Compare"
                                                                               data-tippy-placement="top"
                                                                               data-tippy-arrow="true"
                                                                               data-tippy-inertia="true"><span
                                                                    class="lnr lnr-sync"></span></a></li>
                                                    </ul>
                                                </div>
                                                <div class="price_box">
                                                    <span class="current_price">$20.00</span>
                                                    <span class="old_price">$352.00</span>
                                                </div>
                                            </figcaption>
                                        </figure>
                                    </article>
                                    <article class="single_product">
                                        <figure>
                                            <div class="product_thumb">
                                                <a class="primary_img" href="product-details.html"><img
                                                        src="{{ url('assets/frontend/img/product/product9.jpg')}}"
                                                        alt=""></a>
                                                <a class="secondary_img" href="product-details.html"><img
                                                        src="{{ url('assets/frontend/img/product/product10.jpg')}}"
                                                        alt=""></a>
                                            </div>
                                            <figcaption class="product_content">
                                                <h4 class="product_name"><a href="product-details.html">Cas Meque
                                                        Metus</a></h4>
                                                <p><a href="#">Fruits</a></p>
                                                <div class="action_links">
                                                    <ul>
                                                        <li class="add_to_cart"><a href="cart.html"
                                                                                   data-tippy="Add to cart"
                                                                                   data-tippy-placement="top"
                                                                                   data-tippy-arrow="true"
                                                                                   data-tippy-inertia="true"> <span
                                                                    class="lnr lnr-cart"></span></a></li>
                                                        <li class="quick_button"><a href="#" data-tippy="quick view"
                                                                                    data-tippy-placement="top"
                                                                                    data-tippy-arrow="true"
                                                                                    data-tippy-inertia="true"
                                                                                    data-bs-toggle="modal"
                                                                                    data-bs-target="#modal_box"> <span
                                                                    class="lnr lnr-magnifier"></span></a></li>
                                                        <li class="wishlist"><a href="wishlist.html"
                                                                                data-tippy="Add to Wishlist"
                                                                                data-tippy-placement="top"
                                                                                data-tippy-arrow="true"
                                                                                data-tippy-inertia="true"><span
                                                                    class="lnr lnr-heart"></span></a></li>
                                                        <li class="compare"><a href="#" data-tippy="Add to Compare"
                                                                               data-tippy-placement="top"
                                                                               data-tippy-arrow="true"
                                                                               data-tippy-inertia="true"><span
                                                                    class="lnr lnr-sync"></span></a></li>
                                                    </ul>
                                                </div>
                                                <div class="price_box">
                                                    <span class="current_price">$72.00</span>
                                                    <span class="old_price">$352.00</span>
                                                </div>
                                            </figcaption>
                                        </figure>
                                    </article>
                                    <article class="single_product">
                                        <figure>
                                            <div class="product_thumb">
                                                <a class="primary_img" href="product-details.html"><img
                                                        src="{{ url('assets/frontend/img/product/product11.jpg')}}"
                                                        alt=""></a>
                                                <a class="secondary_img" href="product-details.html"><img
                                                        src="{{ url('assets/frontend/img/product/product12.jpg')}}"
                                                        alt=""></a>
                                            </div>
                                            <figcaption class="product_content">
                                                <h4 class="product_name"><a href="product-details.html">Proin Lectus
                                                        Ipsum</a></h4>
                                                <p><a href="#">Fruits</a></p>
                                                <div class="action_links">
                                                    <ul>
                                                        <li class="add_to_cart"><a href="cart.html"
                                                                                   data-tippy="Add to cart"
                                                                                   data-tippy-placement="top"
                                                                                   data-tippy-arrow="true"
                                                                                   data-tippy-inertia="true"> <span
                                                                    class="lnr lnr-cart"></span></a></li>
                                                        <li class="quick_button"><a href="#" data-tippy="quick view"
                                                                                    data-tippy-placement="top"
                                                                                    data-tippy-arrow="true"
                                                                                    data-tippy-inertia="true"
                                                                                    data-bs-toggle="modal"
                                                                                    data-bs-target="#modal_box"> <span
                                                                    class="lnr lnr-magnifier"></span></a></li>
                                                        <li class="wishlist"><a href="wishlist.html"
                                                                                data-tippy="Add to Wishlist"
                                                                                data-tippy-placement="top"
                                                                                data-tippy-arrow="true"
                                                                                data-tippy-inertia="true"><span
                                                                    class="lnr lnr-heart"></span></a></li>
                                                        <li class="compare"><a href="#" data-tippy="Add to Compare"
                                                                               data-tippy-placement="top"
                                                                               data-tippy-arrow="true"
                                                                               data-tippy-inertia="true"><span
                                                                    class="lnr lnr-sync"></span></a></li>
                                                    </ul>
                                                </div>
                                                <div class="price_box">
                                                    <span class="current_price">$36.00</span>
                                                    <span class="old_price">$282.00</span>
                                                </div>
                                            </figcaption>
                                        </figure>
                                    </article>
                                </div>
                                <div class="product_items">
                                    <article class="single_product">
                                        <figure>
                                            <div class="product_thumb">
                                                <a class="primary_img" href="product-details.html"><img
                                                        src="{{ url('assets/frontend/img/product/product13.jpg')}}"
                                                        alt=""></a>
                                                <a class="secondary_img" href="product-details.html"><img
                                                        src="{{ url('assets/frontend/img/product/product1.jpg')}}"
                                                        alt=""></a>
                                            </div>
                                            <figcaption class="product_content">
                                                <h4 class="product_name"><a href="product-details.html">Mauris Vel
                                                        Tellus</a></h4>
                                                <p><a href="#">Fruits</a></p>
                                                <div class="action_links">
                                                    <ul>
                                                        <li class="add_to_cart"><a href="cart.html"
                                                                                   data-tippy="Add to cart"
                                                                                   data-tippy-placement="top"
                                                                                   data-tippy-arrow="true"
                                                                                   data-tippy-inertia="true"> <span
                                                                    class="lnr lnr-cart"></span></a></li>
                                                        <li class="quick_button"><a href="#" data-tippy="quick view"
                                                                                    data-tippy-placement="top"
                                                                                    data-tippy-arrow="true"
                                                                                    data-tippy-inertia="true"
                                                                                    data-bs-toggle="modal"
                                                                                    data-bs-target="#modal_box"> <span
                                                                    class="lnr lnr-magnifier"></span></a></li>
                                                        <li class="wishlist"><a href="wishlist.html"
                                                                                data-tippy="Add to Wishlist"
                                                                                data-tippy-placement="top"
                                                                                data-tippy-arrow="true"
                                                                                data-tippy-inertia="true"><span
                                                                    class="lnr lnr-heart"></span></a></li>
                                                        <li class="compare"><a href="#" data-tippy="Add to Compare"
                                                                               data-tippy-placement="top"
                                                                               data-tippy-arrow="true"
                                                                               data-tippy-inertia="true"><span
                                                                    class="lnr lnr-sync"></span></a></li>
                                                    </ul>
                                                </div>
                                                <div class="price_box">
                                                    <span class="current_price">$45.00</span>
                                                    <span class="old_price">$162.00</span>
                                                </div>
                                            </figcaption>
                                        </figure>
                                    </article>
                                    <article class="single_product">
                                        <figure>
                                            <div class="product_thumb">
                                                <a class="primary_img" href="product-details.html"><img
                                                        src="{{ url('assets/frontend/img/product/product10.jpg')}}"
                                                        alt=""></a>
                                                <a class="secondary_img" href="product-details.html"><img
                                                        src="{{ url('assets/frontend/img/product/product3.jpg')}}"
                                                        alt=""></a>
                                            </div>
                                            <figcaption class="product_content">
                                                <h4 class="product_name"><a href="product-details.html">Donec Non
                                                        Est</a></h4>
                                                <p><a href="#">Fruits</a></p>
                                                <div class="action_links">
                                                    <ul>
                                                        <li class="add_to_cart"><a href="cart.html"
                                                                                   data-tippy="Add to cart"
                                                                                   data-tippy-placement="top"
                                                                                   data-tippy-arrow="true"
                                                                                   data-tippy-inertia="true"> <span
                                                                    class="lnr lnr-cart"></span></a></li>
                                                        <li class="quick_button"><a href="#" data-tippy="quick view"
                                                                                    data-tippy-placement="top"
                                                                                    data-tippy-arrow="true"
                                                                                    data-tippy-inertia="true"
                                                                                    data-bs-toggle="modal"
                                                                                    data-bs-target="#modal_box"> <span
                                                                    class="lnr lnr-magnifier"></span></a></li>
                                                        <li class="wishlist"><a href="wishlist.html"
                                                                                data-tippy="Add to Wishlist"
                                                                                data-tippy-placement="top"
                                                                                data-tippy-arrow="true"
                                                                                data-tippy-inertia="true"><span
                                                                    class="lnr lnr-heart"></span></a></li>
                                                        <li class="compare"><a href="#" data-tippy="Add to Compare"
                                                                               data-tippy-placement="top"
                                                                               data-tippy-arrow="true"
                                                                               data-tippy-inertia="true"><span
                                                                    class="lnr lnr-sync"></span></a></li>
                                                    </ul>
                                                </div>
                                                <div class="price_box">
                                                    <span class="current_price">$46.00</span>
                                                    <span class="old_price">$382.00</span>
                                                </div>
                                            </figcaption>
                                        </figure>
                                    </article>
                                    <article class="single_product">
                                        <figure>
                                            <div class="product_thumb">
                                                <a class="primary_img" href="product-details.html"><img
                                                        src="{{ url('assets/frontend/img/product/product8.jpg')}}"
                                                        alt=""></a>
                                                <a class="secondary_img" href="product-details.html"><img
                                                        src="{{ url('assets/frontend/img/product/product5.jpg')}}"
                                                        alt=""></a>
                                            </div>
                                            <figcaption class="product_content">
                                                <h4 class="product_name"><a href="product-details.html">Donec Non
                                                        Est</a></h4>
                                                <p><a href="#">Fruits</a></p>
                                                <div class="action_links">
                                                    <ul>
                                                        <li class="add_to_cart"><a href="cart.html"
                                                                                   data-tippy="Add to cart"
                                                                                   data-tippy-placement="top"
                                                                                   data-tippy-arrow="true"
                                                                                   data-tippy-inertia="true"> <span
                                                                    class="lnr lnr-cart"></span></a></li>
                                                        <li class="quick_button"><a href="#" data-tippy="quick view"
                                                                                    data-tippy-placement="top"
                                                                                    data-tippy-arrow="true"
                                                                                    data-tippy-inertia="true"
                                                                                    data-bs-toggle="modal"
                                                                                    data-bs-target="#modal_box"> <span
                                                                    class="lnr lnr-magnifier"></span></a></li>
                                                        <li class="wishlist"><a href="wishlist.html"
                                                                                data-tippy="Add to Wishlist"
                                                                                data-tippy-placement="top"
                                                                                data-tippy-arrow="true"
                                                                                data-tippy-inertia="true"><span
                                                                    class="lnr lnr-heart"></span></a></li>
                                                        <li class="compare"><a href="#" data-tippy="Add to Compare"
                                                                               data-tippy-placement="top"
                                                                               data-tippy-arrow="true"
                                                                               data-tippy-inertia="true"><span
                                                                    class="lnr lnr-sync"></span></a></li>
                                                    </ul>
                                                </div>
                                                <div class="price_box">
                                                    <span class="current_price">$46.00</span>
                                                    <span class="old_price">$382.00</span>
                                                </div>
                                            </figcaption>
                                        </figure>
                                    </article>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="single_custom_product3">
                            <div class="section_title">
                                <h2>Salads</h2>
                            </div>
                            <div class="small_product_area product_carousel product_column1 owl-carousel">
                                <div class="product_items">
                                    <article class="single_product">
                                        <figure>
                                            <div class="product_thumb">
                                                <a class="primary_img" href="product-details.html"><img
                                                        src="{{ url('assets/frontend/img/product/product7.jpg')}}"
                                                        alt=""></a>
                                                <a class="secondary_img" href="product-details.html"><img
                                                        src="{{ url('assets/frontend/img/product/product8.jpg')}}"
                                                        alt=""></a>
                                            </div>
                                            <figcaption class="product_content">
                                                <h4 class="product_name"><a href="product-details.html">Quisque In
                                                        Arcu</a></h4>
                                                <p><a href="#">Fruits</a></p>
                                                <div class="action_links">
                                                    <ul>
                                                        <li class="add_to_cart"><a href="cart.html"
                                                                                   data-tippy="Add to cart"
                                                                                   data-tippy-placement="top"
                                                                                   data-tippy-arrow="true"
                                                                                   data-tippy-inertia="true"> <span
                                                                    class="lnr lnr-cart"></span></a></li>
                                                        <li class="quick_button"><a href="#" data-tippy="quick view"
                                                                                    data-tippy-placement="top"
                                                                                    data-tippy-arrow="true"
                                                                                    data-tippy-inertia="true"
                                                                                    data-bs-toggle="modal"
                                                                                    data-bs-target="#modal_box"> <span
                                                                    class="lnr lnr-magnifier"></span></a></li>
                                                        <li class="wishlist"><a href="wishlist.html"
                                                                                data-tippy="Add to Wishlist"
                                                                                data-tippy-placement="top"
                                                                                data-tippy-arrow="true"
                                                                                data-tippy-inertia="true"><span
                                                                    class="lnr lnr-heart"></span></a></li>
                                                        <li class="compare"><a href="#" data-tippy="Add to Compare"
                                                                               data-tippy-placement="top"
                                                                               data-tippy-arrow="true"
                                                                               data-tippy-inertia="true"><span
                                                                    class="lnr lnr-sync"></span></a></li>
                                                    </ul>
                                                </div>
                                                <div class="price_box">
                                                    <span class="current_price">$20.00</span>
                                                    <span class="old_price">$352.00</span>
                                                </div>
                                            </figcaption>
                                        </figure>
                                    </article>
                                    <article class="single_product">
                                        <figure>
                                            <div class="product_thumb">
                                                <a class="primary_img" href="product-details.html"><img
                                                        src="{{ url('assets/frontend/img/product/product9.jpg')}}"
                                                        alt=""></a>
                                                <a class="secondary_img" href="product-details.html"><img
                                                        src="{{ url('assets/frontend/img/product/product10.jpg')}}"
                                                        alt=""></a>
                                            </div>
                                            <figcaption class="product_content">
                                                <h4 class="product_name"><a href="product-details.html">Cas Meque
                                                        Metus</a></h4>
                                                <p><a href="#">Fruits</a></p>
                                                <div class="action_links">
                                                    <ul>
                                                        <li class="add_to_cart"><a href="cart.html"
                                                                                   data-tippy="Add to cart"
                                                                                   data-tippy-placement="top"
                                                                                   data-tippy-arrow="true"
                                                                                   data-tippy-inertia="true"> <span
                                                                    class="lnr lnr-cart"></span></a></li>
                                                        <li class="quick_button"><a href="#" data-tippy="quick view"
                                                                                    data-tippy-placement="top"
                                                                                    data-tippy-arrow="true"
                                                                                    data-tippy-inertia="true"
                                                                                    data-bs-toggle="modal"
                                                                                    data-bs-target="#modal_box"> <span
                                                                    class="lnr lnr-magnifier"></span></a></li>
                                                        <li class="wishlist"><a href="wishlist.html"
                                                                                data-tippy="Add to Wishlist"
                                                                                data-tippy-placement="top"
                                                                                data-tippy-arrow="true"
                                                                                data-tippy-inertia="true"><span
                                                                    class="lnr lnr-heart"></span></a></li>
                                                        <li class="compare"><a href="#" data-tippy="Add to Compare"
                                                                               data-tippy-placement="top"
                                                                               data-tippy-arrow="true"
                                                                               data-tippy-inertia="true"><span
                                                                    class="lnr lnr-sync"></span></a></li>
                                                    </ul>
                                                </div>
                                                <div class="price_box">
                                                    <span class="current_price">$72.00</span>
                                                    <span class="old_price">$352.00</span>
                                                </div>
                                            </figcaption>
                                        </figure>
                                    </article>
                                    <article class="single_product">
                                        <figure>
                                            <div class="product_thumb">
                                                <a class="primary_img" href="product-details.html"><img
                                                        src="{{ url('assets/frontend/img/product/product11.jpg')}}"
                                                        alt=""></a>
                                                <a class="secondary_img" href="product-details.html"><img
                                                        src="{{ url('assets/frontend/img/product/product12.jpg')}}"
                                                        alt=""></a>
                                            </div>
                                            <figcaption class="product_content">
                                                <h4 class="product_name"><a href="product-details.html">Proin Lectus
                                                        Ipsum</a></h4>
                                                <p><a href="#">Fruits</a></p>
                                                <div class="action_links">
                                                    <ul>
                                                        <li class="add_to_cart"><a href="cart.html"
                                                                                   data-tippy="Add to cart"
                                                                                   data-tippy-placement="top"
                                                                                   data-tippy-arrow="true"
                                                                                   data-tippy-inertia="true"> <span
                                                                    class="lnr lnr-cart"></span></a></li>
                                                        <li class="quick_button"><a href="#" data-tippy="quick view"
                                                                                    data-tippy-placement="top"
                                                                                    data-tippy-arrow="true"
                                                                                    data-tippy-inertia="true"
                                                                                    data-bs-toggle="modal"
                                                                                    data-bs-target="#modal_box"> <span
                                                                    class="lnr lnr-magnifier"></span></a></li>
                                                        <li class="wishlist"><a href="wishlist.html"
                                                                                data-tippy="Add to Wishlist"
                                                                                data-tippy-placement="top"
                                                                                data-tippy-arrow="true"
                                                                                data-tippy-inertia="true"><span
                                                                    class="lnr lnr-heart"></span></a></li>
                                                        <li class="compare"><a href="#" data-tippy="Add to Compare"
                                                                               data-tippy-placement="top"
                                                                               data-tippy-arrow="true"
                                                                               data-tippy-inertia="true"><span
                                                                    class="lnr lnr-sync"></span></a></li>
                                                    </ul>
                                                </div>
                                                <div class="price_box">
                                                    <span class="current_price">$36.00</span>
                                                    <span class="old_price">$282.00</span>
                                                </div>
                                            </figcaption>
                                        </figure>
                                    </article>
                                </div>
                                <div class="product_items">
                                    <article class="single_product">
                                        <figure>
                                            <div class="product_thumb">
                                                <a class="primary_img" href="product-details.html"><img
                                                        src="{{ url('assets/frontend/img/product/product13.jpg')}}"
                                                        alt=""></a>
                                                <a class="secondary_img" href="product-details.html"><img
                                                        src="{{ url('assets/frontend/img/product/product1.jpg')}}"
                                                        alt=""></a>
                                            </div>
                                            <figcaption class="product_content">
                                                <h4 class="product_name"><a href="product-details.html">Mauris Vel
                                                        Tellus</a></h4>
                                                <p><a href="#">Fruits</a></p>
                                                <div class="action_links">
                                                    <ul>
                                                        <li class="add_to_cart"><a href="cart.html"
                                                                                   data-tippy="Add to cart"
                                                                                   data-tippy-placement="top"
                                                                                   data-tippy-arrow="true"
                                                                                   data-tippy-inertia="true"> <span
                                                                    class="lnr lnr-cart"></span></a></li>
                                                        <li class="quick_button"><a href="#" data-tippy="quick view"
                                                                                    data-tippy-placement="top"
                                                                                    data-tippy-arrow="true"
                                                                                    data-tippy-inertia="true"
                                                                                    data-bs-toggle="modal"
                                                                                    data-bs-target="#modal_box"> <span
                                                                    class="lnr lnr-magnifier"></span></a></li>
                                                        <li class="wishlist"><a href="wishlist.html"
                                                                                data-tippy="Add to Wishlist"
                                                                                data-tippy-placement="top"
                                                                                data-tippy-arrow="true"
                                                                                data-tippy-inertia="true"><span
                                                                    class="lnr lnr-heart"></span></a></li>
                                                        <li class="compare"><a href="#" data-tippy="Add to Compare"
                                                                               data-tippy-placement="top"
                                                                               data-tippy-arrow="true"
                                                                               data-tippy-inertia="true"><span
                                                                    class="lnr lnr-sync"></span></a></li>
                                                    </ul>
                                                </div>
                                                <div class="price_box">
                                                    <span class="current_price">$45.00</span>
                                                    <span class="old_price">$162.00</span>
                                                </div>
                                            </figcaption>
                                        </figure>
                                    </article>
                                    <article class="single_product">
                                        <figure>
                                            <div class="product_thumb">
                                                <a class="primary_img" href="product-details.html"><img
                                                        src="{{ url('assets/frontend/img/product/product10.jpg')}}"
                                                        alt=""></a>
                                                <a class="secondary_img" href="product-details.html"><img
                                                        src="{{ url('assets/frontend/img/product/product3.jpg')}}"
                                                        alt=""></a>
                                            </div>
                                            <figcaption class="product_content">
                                                <h4 class="product_name"><a href="product-details.html">Donec Non
                                                        Est</a></h4>
                                                <p><a href="#">Fruits</a></p>
                                                <div class="action_links">
                                                    <ul>
                                                        <li class="add_to_cart"><a href="cart.html"
                                                                                   data-tippy="Add to cart"
                                                                                   data-tippy-placement="top"
                                                                                   data-tippy-arrow="true"
                                                                                   data-tippy-inertia="true"> <span
                                                                    class="lnr lnr-cart"></span></a></li>
                                                        <li class="quick_button"><a href="#" data-tippy="quick view"
                                                                                    data-tippy-placement="top"
                                                                                    data-tippy-arrow="true"
                                                                                    data-tippy-inertia="true"
                                                                                    data-bs-toggle="modal"
                                                                                    data-bs-target="#modal_box"> <span
                                                                    class="lnr lnr-magnifier"></span></a></li>
                                                        <li class="wishlist"><a href="wishlist.html"
                                                                                data-tippy="Add to Wishlist"
                                                                                data-tippy-placement="top"
                                                                                data-tippy-arrow="true"
                                                                                data-tippy-inertia="true"><span
                                                                    class="lnr lnr-heart"></span></a></li>
                                                        <li class="compare"><a href="#" data-tippy="Add to Compare"
                                                                               data-tippy-placement="top"
                                                                               data-tippy-arrow="true"
                                                                               data-tippy-inertia="true"><span
                                                                    class="lnr lnr-sync"></span></a></li>
                                                    </ul>
                                                </div>
                                                <div class="price_box">
                                                    <span class="current_price">$46.00</span>
                                                    <span class="old_price">$382.00</span>
                                                </div>
                                            </figcaption>
                                        </figure>
                                    </article>
                                    <article class="single_product">
                                        <figure>
                                            <div class="product_thumb">
                                                <a class="primary_img" href="product-details.html"><img
                                                        src="{{ url('assets/frontend/img/product/product8.jpg')}}"
                                                        alt=""></a>
                                                <a class="secondary_img" href="product-details.html"><img
                                                        src="{{ url('assets/frontend/img/product/product5.jpg')}}"
                                                        alt=""></a>
                                            </div>
                                            <figcaption class="product_content">
                                                <h4 class="product_name"><a href="product-details.html">Donec Non
                                                        Est</a></h4>
                                                <p><a href="#">Fruits</a></p>
                                                <div class="action_links">
                                                    <ul>
                                                        <li class="add_to_cart"><a href="cart.html"
                                                                                   data-tippy="Add to cart"
                                                                                   data-tippy-placement="top"
                                                                                   data-tippy-arrow="true"
                                                                                   data-tippy-inertia="true"> <span
                                                                    class="lnr lnr-cart"></span></a></li>
                                                        <li class="quick_button"><a href="#" data-tippy="quick view"
                                                                                    data-tippy-placement="top"
                                                                                    data-tippy-arrow="true"
                                                                                    data-tippy-inertia="true"
                                                                                    data-bs-toggle="modal"
                                                                                    data-bs-target="#modal_box"> <span
                                                                    class="lnr lnr-magnifier"></span></a></li>
                                                        <li class="wishlist"><a href="wishlist.html"
                                                                                data-tippy="Add to Wishlist"
                                                                                data-tippy-placement="top"
                                                                                data-tippy-arrow="true"
                                                                                data-tippy-inertia="true"><span
                                                                    class="lnr lnr-heart"></span></a></li>
                                                        <li class="compare"><a href="#" data-tippy="Add to Compare"
                                                                               data-tippy-placement="top"
                                                                               data-tippy-arrow="true"
                                                                               data-tippy-inertia="true"><span
                                                                    class="lnr lnr-sync"></span></a></li>
                                                    </ul>
                                                </div>
                                                <div class="price_box">
                                                    <span class="current_price">$46.00</span>
                                                    <span class="old_price">$382.00</span>
                                                </div>
                                            </figcaption>
                                        </figure>
                                    </article>
                                </div>
                                <div class="product_items">
                                    <article class="single_product">
                                        <figure>
                                            <div class="product_thumb">
                                                <a class="primary_img" href="product-details.html"><img
                                                        src="{{ url('assets/frontend/img/product/product1.jpg')}}"
                                                        alt=""></a>
                                                <a class="secondary_img" href="product-details.html"><img
                                                        src="{{ url('assets/frontend/img/product/product2.jpg')}}"
                                                        alt=""></a>
                                            </div>
                                            <figcaption class="product_content">
                                                <h4 class="product_name"><a href="product-details.html">Aliquam
                                                        Consequat</a></h4>
                                                <p><a href="#">Fruits</a></p>
                                                <div class="action_links">
                                                    <ul>
                                                        <li class="add_to_cart"><a href="cart.html"
                                                                                   data-tippy="Add to cart"
                                                                                   data-tippy-placement="top"
                                                                                   data-tippy-arrow="true"
                                                                                   data-tippy-inertia="true"> <span
                                                                    class="lnr lnr-cart"></span></a></li>
                                                        <li class="quick_button"><a href="#" data-tippy="quick view"
                                                                                    data-tippy-placement="top"
                                                                                    data-tippy-arrow="true"
                                                                                    data-tippy-inertia="true"
                                                                                    data-bs-toggle="modal"
                                                                                    data-bs-target="#modal_box"> <span
                                                                    class="lnr lnr-magnifier"></span></a></li>
                                                        <li class="wishlist"><a href="wishlist.html"
                                                                                data-tippy="Add to Wishlist"
                                                                                data-tippy-placement="top"
                                                                                data-tippy-arrow="true"
                                                                                data-tippy-inertia="true"><span
                                                                    class="lnr lnr-heart"></span></a></li>
                                                        <li class="compare"><a href="#" data-tippy="Add to Compare"
                                                                               data-tippy-placement="top"
                                                                               data-tippy-arrow="true"
                                                                               data-tippy-inertia="true"><span
                                                                    class="lnr lnr-sync"></span></a></li>
                                                    </ul>
                                                </div>
                                                <div class="price_box">
                                                    <span class="current_price">$26.00</span>
                                                    <span class="old_price">$362.00</span>
                                                </div>
                                            </figcaption>
                                        </figure>
                                    </article>
                                    <article class="single_product">
                                        <figure>
                                            <div class="product_thumb">
                                                <a class="primary_img" href="product-details.html"><img
                                                        src="{{ url('assets/frontend/img/product/product11.jpg')}}"
                                                        alt=""></a>
                                                <a class="secondary_img" href="product-details.html"><img
                                                        src="{{ url('assets/frontend/img/product/product10.jpg')}}"
                                                        alt=""></a>
                                            </div>
                                            <figcaption class="product_content">
                                                <h4 class="product_name"><a href="product-details.html">Donec Non
                                                        Est</a></h4>
                                                <p><a href="#">Fruits</a></p>
                                                <div class="action_links">
                                                    <ul>
                                                        <li class="add_to_cart"><a href="cart.html"
                                                                                   data-tippy="Add to cart"
                                                                                   data-tippy-placement="top"
                                                                                   data-tippy-arrow="true"
                                                                                   data-tippy-inertia="true"> <span
                                                                    class="lnr lnr-cart"></span></a></li>
                                                        <li class="quick_button"><a href="#" data-tippy="quick view"
                                                                                    data-tippy-placement="top"
                                                                                    data-tippy-arrow="true"
                                                                                    data-tippy-inertia="true"
                                                                                    data-bs-toggle="modal"
                                                                                    data-bs-target="#modal_box"> <span
                                                                    class="lnr lnr-magnifier"></span></a></li>
                                                        <li class="wishlist"><a href="wishlist.html"
                                                                                data-tippy="Add to Wishlist"
                                                                                data-tippy-placement="top"
                                                                                data-tippy-arrow="true"
                                                                                data-tippy-inertia="true"><span
                                                                    class="lnr lnr-heart"></span></a></li>
                                                        <li class="compare"><a href="#" data-tippy="Add to Compare"
                                                                               data-tippy-placement="top"
                                                                               data-tippy-arrow="true"
                                                                               data-tippy-inertia="true"><span
                                                                    class="lnr lnr-sync"></span></a></li>
                                                    </ul>
                                                </div>
                                                <div class="price_box">
                                                    <span class="current_price">$46.00</span>
                                                    <span class="old_price">$382.00</span>
                                                </div>
                                            </figcaption>
                                        </figure>
                                    </article>
                                    <article class="single_product">
                                        <figure>
                                            <div class="product_thumb">
                                                <a class="primary_img" href="product-details.html"><img
                                                        src="{{ url('assets/frontend/img/product/product9.jpg')}}"
                                                        alt=""></a>
                                                <a class="secondary_img" href="product-details.html"><img
                                                        src="{{ url('assets/frontend/img/product/product8.jpg')}}"
                                                        alt=""></a>
                                            </div>
                                            <figcaption class="product_content">
                                                <h4 class="product_name"><a href="product-details.html">Mauris Vel
                                                        Tellus</a></h4>
                                                <p><a href="#">Fruits</a></p>
                                                <div class="action_links">
                                                    <ul>
                                                        <li class="add_to_cart"><a href="cart.html"
                                                                                   data-tippy="Add to cart"
                                                                                   data-tippy-placement="top"
                                                                                   data-tippy-arrow="true"
                                                                                   data-tippy-inertia="true"> <span
                                                                    class="lnr lnr-cart"></span></a></li>
                                                        <li class="quick_button"><a href="#" data-tippy="quick view"
                                                                                    data-tippy-placement="top"
                                                                                    data-tippy-arrow="true"
                                                                                    data-tippy-inertia="true"
                                                                                    data-bs-toggle="modal"
                                                                                    data-bs-target="#modal_box"> <span
                                                                    class="lnr lnr-magnifier"></span></a></li>
                                                        <li class="wishlist"><a href="wishlist.html"
                                                                                data-tippy="Add to Wishlist"
                                                                                data-tippy-placement="top"
                                                                                data-tippy-arrow="true"
                                                                                data-tippy-inertia="true"><span
                                                                    class="lnr lnr-heart"></span></a></li>
                                                        <li class="compare"><a href="#" data-tippy="Add to Compare"
                                                                               data-tippy-placement="top"
                                                                               data-tippy-arrow="true"
                                                                               data-tippy-inertia="true"><span
                                                                    class="lnr lnr-sync"></span></a></li>
                                                    </ul>
                                                </div>
                                                <div class="price_box">
                                                    <span class="current_price">$56.00</span>
                                                    <span class="old_price">$362.00</span>
                                                </div>
                                            </figcaption>
                                        </figure>
                                    </article>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="single_custom_product3 columnp3">
                            <div class="section_title">
                                <h2>Fish & Seafood</h2>
                            </div>
                            <div class="small_product_area product_carousel product_column1 owl-carousel">
                                <div class="product_items">
                                    <article class="single_product">
                                        <figure>
                                            <div class="product_thumb">
                                                <a class="primary_img" href="product-details.html"><img
                                                        src="{{ url('assets/frontend/img/product/product13.jpg')}}"
                                                        alt=""></a>
                                                <a class="secondary_img" href="product-details.html"><img
                                                        src="{{ url('assets/frontend/img/product/product1.jpg')}}"
                                                        alt=""></a>
                                            </div>
                                            <figcaption class="product_content">
                                                <h4 class="product_name"><a href="product-details.html">Mauris Vel
                                                        Tellus</a></h4>
                                                <p><a href="#">Fruits</a></p>
                                                <div class="action_links">
                                                    <ul>
                                                        <li class="add_to_cart"><a href="cart.html"
                                                                                   data-tippy="Add to cart"
                                                                                   data-tippy-placement="top"
                                                                                   data-tippy-arrow="true"
                                                                                   data-tippy-inertia="true"> <span
                                                                    class="lnr lnr-cart"></span></a></li>
                                                        <li class="quick_button"><a href="#" data-tippy="quick view"
                                                                                    data-tippy-placement="top"
                                                                                    data-tippy-arrow="true"
                                                                                    data-tippy-inertia="true"
                                                                                    data-bs-toggle="modal"
                                                                                    data-bs-target="#modal_box"> <span
                                                                    class="lnr lnr-magnifier"></span></a></li>
                                                        <li class="wishlist"><a href="wishlist.html"
                                                                                data-tippy="Add to Wishlist"
                                                                                data-tippy-placement="top"
                                                                                data-tippy-arrow="true"
                                                                                data-tippy-inertia="true"><span
                                                                    class="lnr lnr-heart"></span></a></li>
                                                        <li class="compare"><a href="#" data-tippy="Add to Compare"
                                                                               data-tippy-placement="top"
                                                                               data-tippy-arrow="true"
                                                                               data-tippy-inertia="true"><span
                                                                    class="lnr lnr-sync"></span></a></li>
                                                    </ul>
                                                </div>
                                                <div class="price_box">
                                                    <span class="current_price">$45.00</span>
                                                    <span class="old_price">$162.00</span>
                                                </div>
                                            </figcaption>
                                        </figure>
                                    </article>
                                    <article class="single_product">
                                        <figure>
                                            <div class="product_thumb">
                                                <a class="primary_img" href="product-details.html"><img
                                                        src="{{ url('assets/frontend/img/product/product10.jpg')}}"
                                                        alt=""></a>
                                                <a class="secondary_img" href="product-details.html"><img
                                                        src="{{ url('assets/frontend/img/product/product3.jpg')}}"
                                                        alt=""></a>
                                            </div>
                                            <figcaption class="product_content">
                                                <h4 class="product_name"><a href="product-details.html">Donec Non
                                                        Est</a></h4>
                                                <p><a href="#">Fruits</a></p>
                                                <div class="action_links">
                                                    <ul>
                                                        <li class="add_to_cart"><a href="cart.html"
                                                                                   data-tippy="Add to cart"
                                                                                   data-tippy-placement="top"
                                                                                   data-tippy-arrow="true"
                                                                                   data-tippy-inertia="true"> <span
                                                                    class="lnr lnr-cart"></span></a></li>
                                                        <li class="quick_button"><a href="#" data-tippy="quick view"
                                                                                    data-tippy-placement="top"
                                                                                    data-tippy-arrow="true"
                                                                                    data-tippy-inertia="true"
                                                                                    data-bs-toggle="modal"
                                                                                    data-bs-target="#modal_box"> <span
                                                                    class="lnr lnr-magnifier"></span></a></li>
                                                        <li class="wishlist"><a href="wishlist.html"
                                                                                data-tippy="Add to Wishlist"
                                                                                data-tippy-placement="top"
                                                                                data-tippy-arrow="true"
                                                                                data-tippy-inertia="true"><span
                                                                    class="lnr lnr-heart"></span></a></li>
                                                        <li class="compare"><a href="#" data-tippy="Add to Compare"
                                                                               data-tippy-placement="top"
                                                                               data-tippy-arrow="true"
                                                                               data-tippy-inertia="true"><span
                                                                    class="lnr lnr-sync"></span></a></li>
                                                    </ul>
                                                </div>
                                                <div class="price_box">
                                                    <span class="current_price">$46.00</span>
                                                    <span class="old_price">$382.00</span>
                                                </div>
                                            </figcaption>
                                        </figure>
                                    </article>
                                    <article class="single_product">
                                        <figure>
                                            <div class="product_thumb">
                                                <a class="primary_img" href="product-details.html"><img
                                                        src="{{ url('assets/frontend/img/product/product8.jpg')}}"
                                                        alt=""></a>
                                                <a class="secondary_img" href="product-details.html"><img
                                                        src="{{ url('assets/frontend/img/product/product5.jpg')}}"
                                                        alt=""></a>
                                            </div>
                                            <figcaption class="product_content">
                                                <h4 class="product_name"><a href="product-details.html">Donec Non
                                                        Est</a></h4>
                                                <p><a href="#">Fruits</a></p>
                                                <div class="action_links">
                                                    <ul>
                                                        <li class="add_to_cart"><a href="cart.html"
                                                                                   data-tippy="Add to cart"
                                                                                   data-tippy-placement="top"
                                                                                   data-tippy-arrow="true"
                                                                                   data-tippy-inertia="true"> <span
                                                                    class="lnr lnr-cart"></span></a></li>
                                                        <li class="quick_button"><a href="#" data-tippy="quick view"
                                                                                    data-tippy-placement="top"
                                                                                    data-tippy-arrow="true"
                                                                                    data-tippy-inertia="true"
                                                                                    data-bs-toggle="modal"
                                                                                    data-bs-target="#modal_box"> <span
                                                                    class="lnr lnr-magnifier"></span></a></li>
                                                        <li class="wishlist"><a href="wishlist.html"
                                                                                data-tippy="Add to Wishlist"
                                                                                data-tippy-placement="top"
                                                                                data-tippy-arrow="true"
                                                                                data-tippy-inertia="true"><span
                                                                    class="lnr lnr-heart"></span></a></li>
                                                        <li class="compare"><a href="#" data-tippy="Add to Compare"
                                                                               data-tippy-placement="top"
                                                                               data-tippy-arrow="true"
                                                                               data-tippy-inertia="true"><span
                                                                    class="lnr lnr-sync"></span></a></li>
                                                    </ul>
                                                </div>
                                                <div class="price_box">
                                                    <span class="current_price">$46.00</span>
                                                    <span class="old_price">$382.00</span>
                                                </div>
                                            </figcaption>
                                        </figure>
                                    </article>
                                </div>
                                <div class="product_items">
                                    <article class="single_product">
                                        <figure>
                                            <div class="product_thumb">
                                                <a class="primary_img" href="product-details.html"><img
                                                        src="{{ url('assets/frontend/img/product/product1.jpg')}}"
                                                        alt=""></a>
                                                <a class="secondary_img" href="product-details.html"><img
                                                        src="{{ url('assets/frontend/img/product/product2.jpg')}}"
                                                        alt=""></a>
                                            </div>
                                            <figcaption class="product_content">
                                                <h4 class="product_name"><a href="product-details.html">Aliquam
                                                        Consequat</a></h4>
                                                <p><a href="#">Fruits</a></p>
                                                <div class="action_links">
                                                    <ul>
                                                        <li class="add_to_cart"><a href="cart.html"
                                                                                   data-tippy="Add to cart"
                                                                                   data-tippy-placement="top"
                                                                                   data-tippy-arrow="true"
                                                                                   data-tippy-inertia="true"> <span
                                                                    class="lnr lnr-cart"></span></a></li>
                                                        <li class="quick_button"><a href="#" data-tippy="quick view"
                                                                                    data-tippy-placement="top"
                                                                                    data-tippy-arrow="true"
                                                                                    data-tippy-inertia="true"
                                                                                    data-bs-toggle="modal"
                                                                                    data-bs-target="#modal_box"> <span
                                                                    class="lnr lnr-magnifier"></span></a></li>
                                                        <li class="wishlist"><a href="wishlist.html"
                                                                                data-tippy="Add to Wishlist"
                                                                                data-tippy-placement="top"
                                                                                data-tippy-arrow="true"
                                                                                data-tippy-inertia="true"><span
                                                                    class="lnr lnr-heart"></span></a></li>
                                                        <li class="compare"><a href="#" data-tippy="Add to Compare"
                                                                               data-tippy-placement="top"
                                                                               data-tippy-arrow="true"
                                                                               data-tippy-inertia="true"><span
                                                                    class="lnr lnr-sync"></span></a></li>
                                                    </ul>
                                                </div>
                                                <div class="price_box">
                                                    <span class="current_price">$26.00</span>
                                                    <span class="old_price">$362.00</span>
                                                </div>
                                            </figcaption>
                                        </figure>
                                    </article>
                                    <article class="single_product">
                                        <figure>
                                            <div class="product_thumb">
                                                <a class="primary_img" href="product-details.html"><img
                                                        src="{{ url('assets/frontend/img/product/product3.jpg')}}"
                                                        alt=""></a>
                                                <a class="secondary_img" href="product-details.html"><img
                                                        src="{{ url('assets/frontend/img/product/product4.jpg')}}"
                                                        alt=""></a>
                                            </div>
                                            <figcaption class="product_content">
                                                <h4 class="product_name"><a href="product-details.html">Donec Non
                                                        Est</a></h4>
                                                <p><a href="#">Fruits</a></p>
                                                <div class="action_links">
                                                    <ul>
                                                        <li class="add_to_cart"><a href="cart.html"
                                                                                   data-tippy="Add to cart"
                                                                                   data-tippy-placement="top"
                                                                                   data-tippy-arrow="true"
                                                                                   data-tippy-inertia="true"> <span
                                                                    class="lnr lnr-cart"></span></a></li>
                                                        <li class="quick_button"><a href="#" data-tippy="quick view"
                                                                                    data-tippy-placement="top"
                                                                                    data-tippy-arrow="true"
                                                                                    data-tippy-inertia="true"
                                                                                    data-bs-toggle="modal"
                                                                                    data-bs-target="#modal_box"> <span
                                                                    class="lnr lnr-magnifier"></span></a></li>
                                                        <li class="wishlist"><a href="wishlist.html"
                                                                                data-tippy="Add to Wishlist"
                                                                                data-tippy-placement="top"
                                                                                data-tippy-arrow="true"
                                                                                data-tippy-inertia="true"><span
                                                                    class="lnr lnr-heart"></span></a></li>
                                                        <li class="compare"><a href="#" data-tippy="Add to Compare"
                                                                               data-tippy-placement="top"
                                                                               data-tippy-arrow="true"
                                                                               data-tippy-inertia="true"><span
                                                                    class="lnr lnr-sync"></span></a></li>
                                                    </ul>
                                                </div>
                                                <div class="price_box">
                                                    <span class="current_price">$46.00</span>
                                                    <span class="old_price">$382.00</span>
                                                </div>
                                            </figcaption>
                                        </figure>
                                    </article>
                                    <article class="single_product">
                                        <figure>
                                            <div class="product_thumb">
                                                <a class="primary_img" href="product-details.html"><img
                                                        src="{{ url('assets/frontend/img/product/product5.jpg')}}"
                                                        alt=""></a>
                                                <a class="secondary_img" href="product-details.html"><img
                                                        src="{{ url('assets/frontend/img/product/product6.jpg')}}"
                                                        alt=""></a>
                                            </div>
                                            <figcaption class="product_content">
                                                <h4 class="product_name"><a href="product-details.html">Mauris Vel
                                                        Tellus</a></h4>
                                                <p><a href="#">Fruits</a></p>
                                                <div class="action_links">
                                                    <ul>
                                                        <li class="add_to_cart"><a href="cart.html"
                                                                                   data-tippy="Add to cart"
                                                                                   data-tippy-placement="top"
                                                                                   data-tippy-arrow="true"
                                                                                   data-tippy-inertia="true"> <span
                                                                    class="lnr lnr-cart"></span></a></li>
                                                        <li class="quick_button"><a href="#" data-tippy="quick view"
                                                                                    data-tippy-placement="top"
                                                                                    data-tippy-arrow="true"
                                                                                    data-tippy-inertia="true"
                                                                                    data-bs-toggle="modal"
                                                                                    data-bs-target="#modal_box"> <span
                                                                    class="lnr lnr-magnifier"></span></a></li>
                                                        <li class="wishlist"><a href="wishlist.html"
                                                                                data-tippy="Add to Wishlist"
                                                                                data-tippy-placement="top"
                                                                                data-tippy-arrow="true"
                                                                                data-tippy-inertia="true"><span
                                                                    class="lnr lnr-heart"></span></a></li>
                                                        <li class="compare"><a href="#" data-tippy="Add to Compare"
                                                                               data-tippy-placement="top"
                                                                               data-tippy-arrow="true"
                                                                               data-tippy-inertia="true"><span
                                                                    class="lnr lnr-sync"></span></a></li>
                                                    </ul>
                                                </div>
                                                <div class="price_box">
                                                    <span class="current_price">$56.00</span>
                                                    <span class="old_price">$362.00</span>
                                                </div>
                                            </figcaption>
                                        </figure>
                                    </article>
                                </div>
                                <div class="product_items">
                                    <article class="single_product">
                                        <figure>
                                            <div class="product_thumb">
                                                <a class="primary_img" href="product-details.html"><img
                                                        src="{{ url('assets/frontend/img/product/product1.jpg')}}"
                                                        alt=""></a>
                                                <a class="secondary_img" href="product-details.html"><img
                                                        src="{{ url('assets/frontend/img/product/product2.jpg')}}"
                                                        alt=""></a>
                                            </div>
                                            <figcaption class="product_content">
                                                <h4 class="product_name"><a href="product-details.html">Aliquam
                                                        Consequat</a></h4>
                                                <p><a href="#">Fruits</a></p>
                                                <div class="action_links">
                                                    <ul>
                                                        <li class="add_to_cart"><a href="cart.html"
                                                                                   data-tippy="Add to cart"
                                                                                   data-tippy-placement="top"
                                                                                   data-tippy-arrow="true"
                                                                                   data-tippy-inertia="true"> <span
                                                                    class="lnr lnr-cart"></span></a></li>
                                                        <li class="quick_button"><a href="#" data-tippy="quick view"
                                                                                    data-tippy-placement="top"
                                                                                    data-tippy-arrow="true"
                                                                                    data-tippy-inertia="true"
                                                                                    data-bs-toggle="modal"
                                                                                    data-bs-target="#modal_box"> <span
                                                                    class="lnr lnr-magnifier"></span></a></li>
                                                        <li class="wishlist"><a href="wishlist.html"
                                                                                data-tippy="Add to Wishlist"
                                                                                data-tippy-placement="top"
                                                                                data-tippy-arrow="true"
                                                                                data-tippy-inertia="true"><span
                                                                    class="lnr lnr-heart"></span></a></li>
                                                        <li class="compare"><a href="#" data-tippy="Add to Compare"
                                                                               data-tippy-placement="top"
                                                                               data-tippy-arrow="true"
                                                                               data-tippy-inertia="true"><span
                                                                    class="lnr lnr-sync"></span></a></li>
                                                    </ul>
                                                </div>
                                                <div class="price_box">
                                                    <span class="current_price">$26.00</span>
                                                    <span class="old_price">$362.00</span>
                                                </div>
                                            </figcaption>
                                        </figure>
                                    </article>
                                    <article class="single_product">
                                        <figure>
                                            <div class="product_thumb">
                                                <a class="primary_img" href="product-details.html"><img
                                                        src="{{ url('assets/frontend/img/product/product11.jpg')}}"
                                                        alt=""></a>
                                                <a class="secondary_img" href="product-details.html"><img
                                                        src="{{ url('assets/frontend/img/product/product10.jpg')}}"
                                                        alt=""></a>
                                            </div>
                                            <figcaption class="product_content">
                                                <h4 class="product_name"><a href="product-details.html">Donec Non
                                                        Est</a></h4>
                                                <p><a href="#">Fruits</a></p>
                                                <div class="action_links">
                                                    <ul>
                                                        <li class="add_to_cart"><a href="cart.html"
                                                                                   data-tippy="Add to cart"
                                                                                   data-tippy-placement="top"
                                                                                   data-tippy-arrow="true"
                                                                                   data-tippy-inertia="true"> <span
                                                                    class="lnr lnr-cart"></span></a></li>
                                                        <li class="quick_button"><a href="#" data-tippy="quick view"
                                                                                    data-tippy-placement="top"
                                                                                    data-tippy-arrow="true"
                                                                                    data-tippy-inertia="true"
                                                                                    data-bs-toggle="modal"
                                                                                    data-bs-target="#modal_box"> <span
                                                                    class="lnr lnr-magnifier"></span></a></li>
                                                        <li class="wishlist"><a href="wishlist.html"
                                                                                data-tippy="Add to Wishlist"
                                                                                data-tippy-placement="top"
                                                                                data-tippy-arrow="true"
                                                                                data-tippy-inertia="true"><span
                                                                    class="lnr lnr-heart"></span></a></li>
                                                        <li class="compare"><a href="#" data-tippy="Add to Compare"
                                                                               data-tippy-placement="top"
                                                                               data-tippy-arrow="true"
                                                                               data-tippy-inertia="true"><span
                                                                    class="lnr lnr-sync"></span></a></li>
                                                    </ul>
                                                </div>
                                                <div class="price_box">
                                                    <span class="current_price">$46.00</span>
                                                    <span class="old_price">$382.00</span>
                                                </div>
                                            </figcaption>
                                        </figure>
                                    </article>
                                    <article class="single_product">
                                        <figure>
                                            <div class="product_thumb">
                                                <a class="primary_img" href="product-details.html"><img
                                                        src="{{ url('assets/frontend/img/product/product9.jpg')}}"
                                                        alt=""></a>
                                                <a class="secondary_img" href="product-details.html"><img
                                                        src="{{ url('assets/frontend/img/product/product8.jpg')}}"
                                                        alt=""></a>
                                            </div>
                                            <figcaption class="product_content">
                                                <h4 class="product_name"><a href="product-details.html">Mauris Vel
                                                        Tellus</a></h4>
                                                <p><a href="#">Fruits</a></p>
                                                <div class="action_links">
                                                    <ul>
                                                        <li class="add_to_cart"><a href="cart.html"
                                                                                   data-tippy="Add to cart"
                                                                                   data-tippy-placement="top"
                                                                                   data-tippy-arrow="true"
                                                                                   data-tippy-inertia="true"> <span
                                                                    class="lnr lnr-cart"></span></a></li>
                                                        <li class="quick_button"><a href="#" data-tippy="quick view"
                                                                                    data-tippy-placement="top"
                                                                                    data-tippy-arrow="true"
                                                                                    data-tippy-inertia="true"
                                                                                    data-bs-toggle="modal"
                                                                                    data-bs-target="#modal_box"> <span
                                                                    class="lnr lnr-magnifier"></span></a></li>
                                                        <li class="wishlist"><a href="wishlist.html"
                                                                                data-tippy="Add to Wishlist"
                                                                                data-tippy-placement="top"
                                                                                data-tippy-arrow="true"
                                                                                data-tippy-inertia="true"><span
                                                                    class="lnr lnr-heart"></span></a></li>
                                                        <li class="compare"><a href="#" data-tippy="Add to Compare"
                                                                               data-tippy-placement="top"
                                                                               data-tippy-arrow="true"
                                                                               data-tippy-inertia="true"><span
                                                                    class="lnr lnr-sync"></span></a></li>
                                                    </ul>
                                                </div>
                                                <div class="price_box">
                                                    <span class="current_price">$56.00</span>
                                                    <span class="old_price">$362.00</span>
                                                </div>
                                            </figcaption>
                                        </figure>
                                    </article>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--custom product area end-->

        <!--brand area start-->
        <div class="brand_area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="brand_container owl-carousel ">
                            <div class="single_brand">
                                <a href="#"><img src="{{ url('assets/frontend/img/brand/brand1.jpg')}}" alt=""></a>
                            </div>
                            <div class="single_brand">
                                <a href="#"><img src="{{ url('assets/frontend/img/brand/brand2.jpg')}}" alt=""></a>
                            </div>
                            <div class="single_brand">
                                <a href="#"><img src="{{ url('assets/frontend/img/brand/brand3.jpg')}}" alt=""></a>
                            </div>
                            <div class="single_brand">
                                <a href="#"><img src="{{ url('assets/frontend/img/brand/brand4.jpg')}}" alt=""></a>
                            </div>
                            <div class="single_brand">
                                <a href="#"><img src="{{ url('assets/frontend/img/brand/brand2.jpg')}}" alt=""></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        -->
        <!--brand area end-->
    </div>
@endsection

@section('scripts')
    <script>
        // import _ from "lodash";
        //Vue.component('pagination', require('laravel-vue-pagination'));
        var vm = new Vue({
            el: '#app',
            components: {
                'avatar': window.Avatar,
                'skeleton-loader-vue': window.VueSkeletonLoader,
            },
            data() {
                return {
                    productList: []
                }

            },
            beforeMount: function () {
                this.getDropdownItem(['products','categories']);
            },
            methods: {

                /**
                 * get record from api
                 */
                showFilterModal() {
                    $('#filterModal').modal('show');
                    this.getProvinces();
                },


                // delete record
                deleteRecord(id = null) {

                    if (id && id != null) {
                        deleteItem(`products/${id}`);
                        this.selectedRows = [];
                    } else {
                        deleteItem(`products/${this.selectedRows}`);
                        this.selectedRows = [];
                    }

                },
                // send data for editing
                editRecord(url = null, id = null) {
                    if (url != null && id != null) {
                        var url = "{{url('/')}}" + "/" + url + "/edit/" + id;

                        window.location = url;
                    }
                }
            }
        });

    </script>

@endsection
