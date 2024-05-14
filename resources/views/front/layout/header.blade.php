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
                            <h2 style="font-size: 28px;
                            font-weight: 700;
                            color: #5e0071;
                            font-family: Georgia;margin-top:12px;">Nobi Arts</h1>

                        </div>
                        </div>
                    </li>




                </ul>
            </nav>
            <nav>
                {{-- @lang('public.localization') --}}
                <ul class="secondary-nav g-nav">
                    <li>



                        <a>
                            {{-- If the user is authenticated/logged in, show 'My Account', if not, show 'Login/Register' --}}
                            @if (\Illuminate\Support\Facades\Auth::check()) {{-- Determining If The Current User Is Authenticated: https://laravel.com/docs/9.x/authentication#determining-if-the-current-user-is-authenticated --}}
                                @lang('public.my accaunt')
                            @else
                                @lang('public.login/register')
                            @endif

                            <i class="fas fa-chevron-down u-s-m-l-9"></i>
                        </a>
                        <ul class="g-dropdown" style="width:200px">




                            {{-- If the user is authenticated/logged in, show 'My Account' and 'Logout', if not, show 'Customer Login' and 'Vendor Login' --}}
                            @if (\Illuminate\Support\Facades\Auth::check())
                                <li>
                                    <a href="{{ url('user/account') }}">
                                        <i class="fas fa-cog u-s-m-r-9"></i>
                                        @lang('public.my accaunt')
                                    </a>
                                </li>


                                <li>
                                    <a href="{{ url('user/orders') }}">
                                        <i class="far fa-bookmark u-s-m-r-9"></i>
                                       @lang('public.my orders')
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('cart') }}">
                                    <i class="fa fa-shopping-cart u-s-m-r-9"></i>
                                   @lang('public.my cart')</a>
                                </li>
                                <li>
                                    <a href="{{ url('checkout') }}">
                                    <i class="far fa-check-circle u-s-m-r-9"></i>
                                    @lang('public.checkout')</a>
                                </li>

                                <li>
                                    <a href="{{ url('user/logout') }}">
                                        <i class="fas fa-sign-in-alt u-s-m-r-9"></i>
                                        @lang('public.logout')
                                    </a>
                                </li>
                            @else
                                <li>
                                    <a href="{{ url('user/login-register') }}">
                                        <i class="fas fa-sign-in-alt u-s-m-r-9"></i>
                                        @lang('public.customer login')
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('vendor/login-register') }}">
                                        <i class="fas fa-sign-in-alt u-s-m-r-9"></i>
                                       @lang('public.vendor login')
                                    </a>
                                </li>
                            @endif



                        </ul>
                    </li>
                    <li>
                        <a>RUB <i class="fas fa-chevron-down u-s-m-l-9"></i></a>
                        <ul class="g-dropdown" style="width:70px">
                            <li>
                                <a href="#" onclick="changeCurrency('RUB')">RUB</a>
                            </li>
                            <li>
                                <a href="#" onclick="changeCurrency('EUR')">EUR</a>
                            </li>
                            <li>
                                <a href="#" onclick="changeCurrency('AMD')">AMD</a>
                            </li>
                            <li>
                                <a href="#" onclick="changeCurrency('BGN')">BGN</a>
                            </li>
                        </ul>
                    </li>


                    <li>
                        <a id="selected-language">{{ strtoupper(app()->getLocale()) }} <!-- Initially, this will display the selected language -->
                        <i class="fas fa-chevron-down u-s-m-l-9"></i>
                        </a>
                        <ul class="g-dropdown" style="width:70px">
                            @foreach(['en', 'ru', 'bgn', 'am'] as $lang)
                                <li>
                                    <a href="{{ url('locale/'.$lang) }}" class="language-option">{{ strtoupper($lang) }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </li>

                </ul>
            </nav>
        </div>
    </div>
    <!-- Top-Header /- -->
    <!-- Mid-Header -->
    <!-- Mid-Header -->
    <div class="full-layer-mid-header">
        <div class="container">
            <div class="row clearfix align-items-center">
                {{-- <div class="col-lg-3 col-md-9 col-sm-6">
                    <div class="brand-logo text-lg-center">


                        <a href="{{ url('/') }}">


                            <img src="{{ asset('front/images/main-logo/main-logo.png') }}" alt="Multi-vendor E-commerce Application" class="app-brand-logo">
                        </a>
                    </div>
                </div> --}}
                <div class="col-lg-6 u-d-none-lg">



                    {{-- Website Search Form (to search for all website products) --}}
                    <form class="form-searchbox" action="{{ url('/search-products') }}" method="get">
                        <label class="sr-only" for="search-landscape">@lang('public.search')</label>
                        <input id="search-landscape" type="text" class="text-field" placeholder="@lang('public.search everything')" name="search" @if (isset($_REQUEST['search']) && !empty($_REQUEST['search'])) value="{{ $_REQUEST['search'] }}" @endif>
                        <div class="select-box-position">
                            <div class="select-box-wrapper select-hide">
                                <label class="sr-only" for="select-category">@lang('public.choose category for search')</label>
                                <select class="select-box" id="select-category" name="section_id">

                                    <option selected="selected" value="">@lang('public.all')</option>
                                    @foreach ($sections as $section)
                                        <option value="{{ $section['id'] }}"  @if (isset($_REQUEST['section_id']) && !empty($_REQUEST['section_id']) && $_REQUEST['section_id'] == $section['id']) selected @endif>{{ $section['name'] }}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                        <button id="btn-search" type="submit" class="button button-primary fas fa-search"></button>
                    </form>

                    @php
                        // dd($_GET);
                    @endphp



                </div>
                <div class="col-lg-3 col-md-3 col-sm-6">
                    <nav>
                        <ul class="mid-nav g-nav">
                            <li class="u-d-none-lg">
                                <a href="{{ url('/') }}">
                                <i class="ion ion-md-home u-c-brand"></i>
                                </a>
                            </li>
                            <li>
                                <a id="mini-cart-trigger">
                                <i class="ion ion-md-basket"></i>
                                <span class="item-counter totalCartItems">{{ totalCartItems() }}</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Mid-Header /- -->
    <!-- Responsive-Buttons -->
    <div class="fixed-responsive-container">
        <div class="fixed-responsive-wrapper">
            <button type="button" class="button fas fa-search" id="responsive-search"></button>
        </div>
    </div>
    <!-- Responsive-Buttons /- -->



    <!-- Mini Cart Widget -->
    <div id="appendHeaderCartItems">
        @include('front.layout.header_cart_items')
    </div>
    <!-- Mini Cart Widget /- -->



    <!-- Bottom-Header -->
    <div class="full-layer-bottom-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3">
                    <div class="v-menu v-close" style="background:#5E0071 !important;">
                        <span class="v-title">
                        <i class="ion ion-md-menu"></i>
                        @lang('public.all categories')
                        <i class="fas fa-angle-down"></i>
                        </span>
                        <nav>
                            <div class="v-wrapper">
                                <ul class="v-list animated fadeIn">



                                    @foreach ($sections as $section)
                                        @if (count($section['categories']) > 0) {{-- if the section has child categories, show the section name, but if it doesn't, don't show it --}}
                                            <li class="js-backdrop">
                                                <a href="javascript:;">
                                                <i class="ion-ios-add-circle"></i>


                                                {{ $section['name'] }} {{-- Show section name --}}


                                                <i class="ion ion-ios-arrow-forward"></i>
                                                </a>
                                                <button class="v-button ion ion-md-add"></button>
                                                <div class="v-drop-right" style="width: 700px;">
                                                    <div class="row">



                                                        @foreach ($section['categories'] as $category) {{-- Show the section child categories --}}
                                                            <div class="col-lg-4">
                                                                <ul class="v-level-2">
                                                                    <li>
                                                                        <a href="{{ url($category['url']) }}">{{ $category['category_name'] }}</a>
                                                                        <ul>



                                                                            @foreach ($category['sub_categories'] as $subcategory) {{-- Show the section child categories child Subcategories --}}
                                                                            <li>
                                                                                <a href="{{ url($subcategory['url']) }}">{{ $subcategory['category_name'] }}</a>
                                                                            </li>
                                                                            @endforeach



                                                                        </ul>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </li>
                                        @endif
                                    @endforeach


                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
                <div class="col-lg-9">
                    <ul class="bottom-nav g-nav u-d-none-lg">
                        <li>
                            <a href="{{ url('search-products?search=new-arrivals') }}">@lang('public.new arrivals')
                            <span class="superscript-label-new">@lang('public.new')</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('search-products?search=best-sellers') }}">@lang('public.best seller')
                            <span class="superscript-label-hot">@lang('public.hot')</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('search-products?search=featured') }}">@lang('public.featured')
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('search-products?search=discounted') }}">@lang('public.discounted')
                            <span class="superscript-label-discount">>10%</span>
                            </a>
                        </li>
                        {{-- <li class="mega-position">
                            <a>@lang('public.more')
                            <i class="fas fa-chevron-down u-s-m-l-9"></i>
                            </a>
                            <div class="mega-menu mega-3-colm">
                                <ul>
                                    <li class="menu-title">@lang('public.company')</li>
                                    <li>
                                        <a href="{{ url('about-us') }}" class="u-c-brand">@lang('public.about us')</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('contact') }}">@lang('public.contact us')</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('faq') }}">@lang('public.faq')</a>
                                    </li>
                                </ul>
                                <ul>
                                    <li class="menu-title">@lang('public.collection')</li>
                                    <li>
                                        <a href="{{ url('men') }}">@lang('public.men clothing')</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('women') }}">@lang('public.women clothing')</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('kids') }}">@lang('public.kids clothing')</a>
                                    </li>
                                </ul>
                                <ul>
                                    <li class="menu-title">@lang("public.accaunt")</li>
                                    <li>
                                        <a href="{{ url('user/account') }}">@lang('public.my accaunt')</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('user/orders') }}">@lang('public.my orders')</a>
                                    </li>
                                </ul>
                            </div>
                        </li> --}}
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Bottom-Header /- -->
</header>
<!-- Header /- -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    // Move the changeCurrency function outside of $(document).ready()
    function changeCurrency(currency) {
        $.ajax({
            type: 'POST',
            url: '{{ route("changeCurrency") }}',
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
            data: { currency: currency },
            success: function(data) {
                // Reload the page to apply the currency change
                location.reload();
            }
        });
    }

    $(document).ready(function() {
        function updateProductPrices(currency) {
            // Send AJAX request to retrieve converted prices for all products
            $.ajax({
                type: 'GET',
                url: '{{ route("getConvertedPrices") }}',
                data: { currency: currency },
                success: function(data) {
                    // Update product prices on the page
                    $('.getAttributePrice').each(function(index) {
                        var productId = $(this).data('product-id');
                        $(this).text(data[productId]);
                    });
                }
            });
        }

        // Call updateProductPrices function initially
        updateProductPrices('{{ session("currency") }}');
    });
</script>
