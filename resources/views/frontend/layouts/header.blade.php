<header>
    <div class="main_header header_three color_three">
        <div class="header_top">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="header_social">
                            <ul>
                                <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                                <li><a href="#"><i class="ion-social-googleplus-outline"></i></a></li>
                                <li><a href="#"><i class="ion-social-youtube-outline"></i></a></li>
                                <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                                <li><a href="#"><i class="ion-social-instagram-outline"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="language_currency text-right">
                            <ul>
                                <li class="language"><a href="#"> Language <i class="icon-right ion-ios-arrow-down"></i></a>
                                    <ul class="dropdown_language">
                                        <li><a href="#">French</a></li>
                                        <li><a href="#">Spanish</a></li>
                                        <li><a href="#">Russian</a></li>
                                    </ul>
                                </li>
                                <li class="currency"><a href="#"> Currency <i class="icon-right ion-ios-arrow-down"></i></a>
                                    <ul class="dropdown_currency">
                                        <li><a href="#">€ Euro</a></li>
                                        <li><a href="#">£ Pound Sterling</a></li>
                                        <li><a href="#">$ US Dollar</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="header_middle">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-2 col-md-3 col-sm-3 col-3">
                        <div class="logo">
                            <a href="index.html"><img src="{{ url('assets/frontend/img/logo/logo.png')}}" alt=""></a>
                        </div>
                    </div>
                    <div class="col-lg-10 col-md-6 col-sm-7 col-8">
                        <div class="header_right_info">
                            <div class="search_container mobail_s_none">
                                <form action="#">
                                    <div class="hover_category">
                                        <select class="select_option" name="select" id="categori2">
                                            <option selected value="1">Select a categories</option>
                                            <option value="2">Accessories</option>
                                            <option value="3">Accessories & More</option>
                                            <option value="4">Butters & Eggs</option>
                                            <option value="5">Camera & Video </option>
                                            <option value="6">Mornitors</option>
                                            <option value="7">Tablets</option>
                                            <option value="8">Laptops</option>
                                            <option value="9">Handbags</option>
                                            <option value="10">Headphone & Speaker</option>
                                            <option value="11">Herbs & botanicals</option>
                                            <option value="12">Vegetables</option>
                                            <option value="13">Shop</option>
                                            <option value="14">Laptops & Desktops</option>
                                            <option value="15">Watchs</option>
                                            <option value="16">Electronic</option>
                                        </select>
                                    </div>
                                    <div class="search_box">
                                        <input placeholder="Search product..." type="text">
                                        <button type="submit"><span class="lnr lnr-magnifier"></span></button>
                                    </div>
                                </form>
                            </div>
                            <div class="header_account_area">
                                <div class="header_account_list register" style="visibility: hidden">
                                    <ul>
                                        <li><a href="login.html">Register</a></li>
                                        <li><span>/</span></li>
                                        <li><a href="login.html">Login</a></li>
                                    </ul>
                                </div>
                                <div class="header_account_list header_wishlist" style="visibility: hidden">
                                    <a href="wishlist.html"><span class="lnr lnr-heart"></span> <span class="item_count">3</span> </a>
                                </div>
                                <div class="header_account_list  mini_cart_wrapper" style="visibility: hidden">
                                    <a href="javascript:void(0)"><span class="lnr lnr-cart"></span><span class="item_count">2</span></a>
                                    <!--mini cart-->
                                    <div class="mini_cart">
                                        <div class="cart_gallery">
                                            <div class="cart_close">
                                                <div class="cart_text">
                                                    <h3>cart</h3>
                                                </div>
                                                <div class="mini_cart_close">
                                                    <a href="javascript:void(0)"><i class="icon-x"></i></a>
                                                </div>
                                            </div>
                                            <div class="cart_item">
                                                <div class="cart_img">
                                                    <a href="#"><img src="assets/img/s-product/product.jpg" alt=""></a>
                                                </div>
                                                <div class="cart_info">
                                                    <a href="#">Primis In Faucibus</a>
                                                    <p>1 x <span> $65.00 </span></p>
                                                </div>
                                                <div class="cart_remove">
                                                    <a href="#"><i class="icon-x"></i></a>
                                                </div>
                                            </div>
                                            <div class="cart_item">
                                                <div class="cart_img">
                                                    <a href="#"><img src="assets/img/s-product/product2.jpg" alt=""></a>
                                                </div>
                                                <div class="cart_info">
                                                    <a href="#">Letraset Sheets</a>
                                                    <p>1 x <span> $60.00 </span></p>
                                                </div>
                                                <div class="cart_remove">
                                                    <a href="#"><i class="icon-x"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mini_cart_table">
                                            <div class="cart_table_border">
                                                <div class="cart_total">
                                                    <span>Sub total:</span>
                                                    <span class="price">$125.00</span>
                                                </div>
                                                <div class="cart_total mt-10">
                                                    <span>total:</span>
                                                    <span class="price">$125.00</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mini_cart_footer">
                                            <div class="cart_button">
                                                <a href="cart.html"><i class="fa fa-shopping-cart"></i> View cart</a>
                                            </div>
                                            <div class="cart_button">
                                                <a href="checkout.html"><i class="fa fa-sign-in"></i> Checkout</a>
                                            </div>

                                        </div>
                                    </div>
                                    <!--mini cart end-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header_bottom">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12 col-md-6 mobail_s_block">
                        <div class="search_container">
                            <form action="#">
                                <div class="hover_category">
                                    <select class="select_option" name="select" id="categori2">
                                        <option selected value="1">Select a categories</option>
                                        <option value="2">Accessories</option>
                                        <option value="3">Accessories & More</option>
                                        <option value="4">Butters & Eggs</option>
                                        <option value="5">Camera & Video </option>
                                        <option value="6">Mornitors</option>
                                        <option value="7">Tablets</option>
                                    </select>
                                </div>
                                <div class="search_box">
                                    <input placeholder="Search product..." type="text">
                                    <button type="submit"><span class="lnr lnr-magnifier"></span></button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="categories_menu categories_three">
                            <div class="categories_title">
                                <h2 class="categori_toggle">All Cattegories</h2>
                            </div>
                            <div class="categories_menu_toggle">
                                <ul>
{{--                                    <li class="menu_item_children"><a href="#"> Fish & Seafood <i class="fa fa-angle-right"></i></a>--}}
{{--                                        <ul class="categories_mega_menu column_2">--}}
{{--                                            <li class="menu_item_children"><a href="#">Check Trousers</a>--}}
{{--                                                <ul class="categorie_sub_menu">--}}
{{--                                                    <li><a href="#">Building</a></li>--}}
{{--                                                    <li><a href="#">Electronics</a></li>--}}
{{--                                                    <li><a href="#">action figures </a></li>--}}
{{--                                                    <li><a href="#">specialty & boutique toy</a></li>--}}
{{--                                                </ul>--}}
{{--                                            </li>--}}
{{--                                            <li class="menu_item_children"><a href="#">Calculators</a>--}}
{{--                                                <ul class="categorie_sub_menu">--}}
{{--                                                    <li><a href="#">Dolls for Girls</a></li>--}}
{{--                                                    <li><a href="#">Girls' Learning Toys</a></li>--}}
{{--                                                    <li><a href="#">Arts and Crafts for Girls</a></li>--}}
{{--                                                    <li><a href="#">Video Games for Girls</a></li>--}}
{{--                                                </ul>--}}
{{--                                            </li>--}}
{{--                                        </ul>--}}
{{--                                    </li>--}}
                                    @foreach(categories() as $category)
                                    <li><a href="#">{{$category->name}}</a></li>
                                    @endforeach
{{--                                    <li class="hidden"><a href="shop.html">New Sofas</a></li>--}}
{{--                                    <li class="hidden"><a href="shop.html">Sleight Sofas</a></li>--}}
{{--                                    <li><a href="#" id="more-btn"><i class="fa fa-plus" aria-hidden="true"></i> More Categories</a></li>--}}
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <!--main menu start-->
                        <div class="main_menu menu_position">
                            <nav>
                                <ul>
                                    <li><a href="{{ route('home.index') }}"> Home</a></li>
                                    <li><a href="{{ route('about-us.index') }}"> Porducts</a></li>
                                    <li><a href="{{ route('about-us.index') }}"> Blog</a></li>
                                    <li><a href="{{ route('about-us.index') }}"> Abouts Us</a></li>
                                    <li><a href="{{ route('contact-us.index') }}"> Contact Us</a></li>
                                </ul>
                            </nav>
                        </div>
                        <!--main menu end-->
                    </div>
                    <div class="col-lg-3">
                        <div class="call-support">
                            <p><a href="tel:(08)23456789">(08) 23 456 789</a> Customer Support</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
