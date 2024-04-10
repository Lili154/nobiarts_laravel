<?php
// Getting the 'enabled' sections ONLY and their child categories (using the 'categories' relationship method) which, in turn, include their 'subcategories`
$sections = \App\Models\Section::sections();
// dd($sections);
?>



<!-- Header -->
<header>
    <!-- Top-Header -->
    <div class="full-layer-outer-header">
        <div class="container clearfix">
            <nav>
                <ul class="primary-nav g-nav d-flex width-
                100
                ">
                    <li>
                        <div class="d-flex">
                        <img rel="apple-touch-icon" sizes="150x150"style="width:60px;height:60px" src="{{ asset('/admin/images/dashboard/logo-nobiarts.png') }}" />
                        <div class="arts" style="margin: 0 0 0 20px;">
                            <h2 style="color:#792D89">Nobi Arts</h1>
                             <h6 style="color:#792D89" class="slogan">Classifieds</h6>
                        </div>
                        </div>
                    </li>




                </ul>
            </nav>
            <nav>
                <ul class="secondary-nav g-nav">
                    <li>



                        <a>
                            {{-- If the user is authenticated/logged in, show 'My Account', if not, show 'Login/Register' --}}
                            @if (\Illuminate\Support\Facades\Auth::check()) {{-- Determining If The Current User Is Authenticated: https://laravel.com/docs/9.x/authentication#determining-if-the-current-user-is-authenticated --}}
                                My Account
                            @else
                                Login/Register
                            @endif

                            <i class="fas fa-chevron-down u-s-m-l-9"></i>
                        </a>
                        <ul class="g-dropdown" style="width:200px">
                            <li>
                                <a href="{{ url('cart') }}">
                                <i class="fas fa-cog u-s-m-r-9"></i>
                                My Cart</a>
                            </li>
                            <li>
                                <a href="{{ url('checkout') }}">
                                <i class="far fa-check-circle u-s-m-r-9"></i>
                                Checkout</a>
                            </li>



                            {{-- If the user is authenticated/logged in, show 'My Account' and 'Logout', if not, show 'Customer Login' and 'Vendor Login' --}}
                            @if (\Illuminate\Support\Facades\Auth::check()) {{-- Determining If The Current User Is Authenticated: https://laravel.com/docs/9.x/authentication#determining-if-the-current-user-is-authenticated --}}
                                <li>
                                    <a href="{{ url('user/account') }}">
                                        <i class="fas fa-sign-in-alt u-s-m-r-9"></i>
                                        My Account
                                    </a>
                                </li>


                                <li>
                                    <a href="{{ url('user/orders') }}">
                                        <i class="fas fa-sign-in-alt u-s-m-r-9"></i>
                                        My Orders
                                    </a>
                                </li>

                                <li>
                                    <a href="{{ url('user/logout') }}">
                                        <i class="fas fa-sign-in-alt u-s-m-r-9"></i>
                                        Logout
                                    </a>
                                </li>
                            @else
                                <li>
                                    <a href="{{ url('user/login-register') }}">
                                        <i class="fas fa-sign-in-alt u-s-m-r-9"></i>
                                        Customer Login
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('vendor/login-register') }}">
                                        <i class="fas fa-sign-in-alt u-s-m-r-9"></i>
                                        Vendor Login
                                    </a>
                                </li>
                            @endif



                        </ul>
                    </li>
                    <li>
                        <a>EUR
                        <i class="fas fa-chevron-down u-s-m-l-9"></i>
                        </a>
                        <ul class="g-dropdown" style="width:90px">
                            <li>
                                <a href="#" class="u-c-brand">(€) EUR</a>
                            </li>
                            <li>
                                <a href="#" class="u-c-brand">($) USD</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a>ENG
                        <i class="fas fa-chevron-down u-s-m-l-9"></i>
                        </a>
                        <ul class="g-dropdown" style="width:70px">
                            <li>
                                <a href="#" class="u-c-brand">ENG</a>
                            </li>
                            <li>
                                <a href="#">RU</a>
                            </li>
                            <li>
                                <a href="#">BGN</a>
                            </li>
                            <li>
                                <a href="#">AM</a>
                            </li>
                        </ul>
                </ul>
            </nav>
        </div>
    </div>
    <!-- Top-Header /- -->
    <!-- Mid-Header -->

    <!-- Mid-Header /- -->
    <!-- Responsive-Buttons -->
    <div class="fixed-responsive-container">
        <div class="fixed-responsive-wrapper">
            <button type="button" class="button fas fa-search" id="responsive-search"></button>
        </div>
    </div>
    <!-- Responsive-Buttons /- -->



    <!-- Mini Cart Widget -->
    <div id="appendHeaderCartItems"> {{-- We created the CSS class 'appendHeaderCartItems' to use it in front/js/custom.js to update the total cart items via AJAX in the Mini Cart Wedget, because in pages that we originally use AJAX to update the cart items (such as when we delete a cart item in http://127.0.0.1:8000/cart using AJAX), the number doesn't change in the header automatically because AJAX is already used and no page reload/refresh has occurred --}}
        @include('front.layout.header_cart_items')
    </div>
    <!-- Mini Cart Widget /- -->



    <!-- Bottom-Header -->

    <!-- Bottom-Header /- -->
</header>
<!-- Header /- -->
