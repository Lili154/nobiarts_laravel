
@extends('front.layout.layout')


@section('content')
    <style>
        *{
            margin: 0;
            padding: 0;
        }
        .rate {
            float: left;
            height: 46px;
            padding: 0 10px;
        }
        .rate:not(:checked) > input {
            /* position:absolute; */
            position:inherit;
            top:-9999px;
        }
        .rate:not(:checked) > label {
            float:right;
            width:1em;
            overflow:hidden;
            white-space:nowrap;
            cursor:pointer;
            font-size:30px;
            color:#ccc;
        }
        .rate:not(:checked) > label:before {
            content: '★ ';
        }
        .rate > input:checked ~ label {
            color: #ffc700;
        }
        .rate:not(:checked) > label:hover,
        .rate:not(:checked) > label:hover ~ label {
            color: #deb217;
        }
        .rate > input:checked + label:hover,
        .rate > input:checked + label:hover ~ label,
        .rate > input:checked ~ label:hover,
        .rate > input:checked ~ label:hover ~ label,
        .rate > label:hover ~ input:checked ~ label {
            color: #c59b08;
        }
    </style>



    <!-- Page Introduction Wrapper -->
    <div class="page-style-a">
        <div class="container">
            <div class="page-intro">
                <h2>Detail</h2>
                <ul class="bread-crumb">
                    <li class="has-separator">
                        <i class="ion ion-md-home"></i>
                        <a href="{{ url('/') }}">@lang('public.home')</a>
                    </li>
                    <li class="is-marked">
                        <a href="javascript:;">@lang('public.detail')</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Page Introduction Wrapper /- -->
    <!-- Single-Product-Full-Width-Page -->
    <div class="page-detail u-s-p-t-80">
        <div class="container">
            <!-- Product-Detail -->
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">




                    <!-- Product-zoom-area -->
                    <div class="easyzoom easyzoom--overlay easyzoom--with-thumbnails"> {{-- EasyZoom plugin --}}
                        <a      href="{{ asset('front/images/product_images/large/' . $productDetails['product_image']) }}">
                            <img src="{{ asset('front/images/product_images/large/' . $productDetails['product_image']) }}" alt="" width="500" height="500" />
                        </a>
                    </div>

                    <div class="thumbnails" style="margin-top: 30px"> {{-- EasyZoom plugin --}}
                        <a      href="{{ asset('front/images/product_images/large/' . $productDetails['product_image']) }}" data-standard="{{ asset('front/images/product_images/small/' . $productDetails['product_image']) }}">
                            <img src="{{ asset('front/images/product_images/small/' . $productDetails['product_image']) }}" width="120" height="120" alt="" />
                        </a>



                        {{-- Show the product Alternative images (`image` in `products_images` table) --}}
                        @foreach ($productDetails['images'] as $image)
                            {{-- EasyZoom plugin --}}
                            <a      href="{{ asset('front/images/product_images/large/' . $image['image']) }}" data-standard="{{ asset('front/images/product_images/small/' . $image['image']) }}">
                                <img src="{{ asset('front/images/product_images/small/' . $image['image']) }}" width="120" height="120" alt="" />
                            </a>
                        @endforeach



                    </div>
                    <!-- Product-zoom-area /- -->
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <!-- Product-details -->
                    <div class="all-information-wrapper">


                        {{-- My Bootstrap error code in case of wrong current password or the new password and confirm password are not matching: --}}
                        {{-- Determining If An Item Exists In The Session (using has() method): https://laravel.com/docs/9.x/session#determining-if-an-item-exists-in-the-session --}}
                        @if (Session::has('error_message')) <!-- Check AdminController.php, updateAdminPassword() method -->
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>@lang('public.error:')</strong> {{ Session::get('error_message') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif


                        {{-- Displaying Laravel Validation Errors: https://laravel.com/docs/9.x/validation#quick-displaying-the-validation-errors --}}
                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">

                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach

                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif



                        @if (Session::has('success_message')) <!-- Check AdminController.php, updateAdminPassword() method -->
                            <div class="alert alert-success alert-dismissible fade show" role="alert">


                                <strong>@lang('public.success:')</strong> @php echo Session::get('success_message') @endphp

                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif



                        <div class="section-1-title-breadcrumb-rating">
                            <div class="product-title">
                                <h1>
                                    <a href="javascript:;">{{ $productDetails['product_name'] }}</a>
                                </h1>
                            </div>



                            {{-- Breadcrumb --}}
                            <ul class="bread-crumb">
                                <li class="has-separator">
                                    <a href="{{ url('/') }}">@lang('public.home')</a> {{-- Home --}}
                                </li>
                                <li class="has-separator">
                                    <a href="javascript:;">{{ $productDetails['section']['name'] }}</a> {{-- Section Name --}}
                                </li>
                                @php echo $categoryDetails['breadcrumbs'] @endphp {{-- $categoryDetails is passed in from detail() method in Front/ProductsController.php --}}
                            </ul>
                            {{-- Breadcrumb --}}



                            <div class="product-rating">
                                <div title="{{ $avgRating }} out of 5 - based on {{ count($ratings) }} Reviews">

                                    {{-- Show/Display the Rating Stars --}}
                                    @if ($avgStarRating > 0) {{-- If the product has been rated at least once, show the "Stars" HTML Entities --}}
                                        @php
                                            $star = 1;
                                            while ($star < $avgStarRating):
                                        @endphp

                                                <span style="color: gold; font-size: 17px">&#9733;</span>

                                        @php
                                                $star++;
                                            endwhile;
                                        @endphp
                                        ({{ $avgRating }})
                                    @endif

                                </div>
                            </div>
                        </div>
                        <div class="section-2-short-description u-s-p-y-14">
                            <h6 class="information-heading u-s-m-b-8">@lang('public.description:')</h6>
                            <p>{{ $productDetails['description'] }}</p>
                        </div>
                        <div class="section-3-price-original-discount u-s-p-y-14">


                            @php
                            // Retrieve the exchange rate from the session
                            $exchangeRate = session('exchange_rate'); // Default exchange rate is 1

                            // Convert product price to the selected currency
                            $convertedPrice = $productDetails['product_price'] * $exchangeRate;

                            // Calculate discount price if applicable
                            $getDiscountPrice = \App\Models\Product::getDiscountPrice($productDetails['id']);
                            $convertedDiscountPrice = $getDiscountPrice > 0 ? $getDiscountPrice * $exchangeRate : 0;
                        @endphp

                            <span class="getAttributePrice ">{{-- this <span> will be used by jQuery for getting the respective `price` and `stock` depending on the selected `size` in the <select> box (through the AJAX call). Check front/js/custom.js --}}

                                @if ($getDiscountPrice > 0)
                                    <div class="price">
                                        <h4>{{ session('currency') }}{{ $convertedDiscountPrice }}</h4>
                                    </div>
                                    <div class="original-price">
                                        <span>@lang('public.original price:')</span>
                                        <h4>{{ session('currency') }}{{ $convertedPrice }}</h4>

                                    </div>
                                @else {{-- if there's no discount on the product price --}}
                                    <div class="price">
                                        <h4>{{ session('currency') }}{{ $convertedPrice }}</h4>

                                    </div>
                                @endif

                            </span>



                        </div>
                        <div class="section-4-sku-information u-s-p-y-14">
                            <h6 class="information-heading u-s-m-b-8">@lang('public.sku information:')</h6>
                            <div class="left">
                                <span>@lang('public.product code'):</span>
                                <span>{{ $productDetails['product_code'] }}</span>
                            </div>
                            <div class="left">
                                <span>@lang('public.product color'):</span>
                                <span>{{ $productDetails['product_color'] }}</span>
                            </div>
                            <div class="availability">
                                <span>@lang('public.availability:')</span>


                                @if ($totalStock > 0)
                                    <span>@lang('public.in stock')</span>
                                @else
                                    <span style="color: red">@lang('public.out of stock (Sold-out)')</span>
                                @endif



                            </div>



                            @if ($totalStock > 0)
                                <div class="left">
                                    <span>@lang('public.only:')</span>
                                    <span>{{ $totalStock }} @lang('public.left')</span>
                                </div>
                            @endif



                        </div>



                        {{-- Show the vendor shop name (only in case that the product is added by a vendor, not admin or superadmin) --}}
                        @if(isset($productDetails['vendor']))
                            <div>
                                {{-- Sold by: {{ $productDetails['vendor']['name'] }} --}}
                                Sold by: <a href="/products/{{ $productDetails['vendor']['id'] }}">
                                            {{ $productDetails['vendor']['vendorbusinessdetails']['shop_name'] }}
                                        </a>
                            </div>
                        @endif



                        {{-- Add to Cart <form> --}}
                        <form action="{{ url('cart/add') }}" method="Post" class="post-form">
                            @csrf {{-- Preventing CSRF Requests: https://laravel.com/docs/9.x/csrf#preventing-csrf-requests --}}


                            <input type="hidden" name="product_id" value="{{ $productDetails['id'] }}"> {{-- Add to Cart <form> --}}


                            <div class="section-5-product-variants u-s-p-y-14">



                                {{-- Managing Product Colors (using the `group_code` column in `products` table) --}}
                                @if (count($groupProducts) > 0) {{-- if there's a value for the `group_code` column (in `products` table) for the currently viewed product --}}
                                    <div>
                                        <div><strong>@lang('public.product colors')</strong></div>
                                        <div style="margin-top: 10px">
                                            @foreach ($groupProducts as $product)
                                                <a href="{{ url('product/' . $product['id']) }}">
                                                    <img style="width: 80px" src="{{ asset('front/images/product_images/small/' . $product['product_image']) }}">
                                                </a>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif



                                <div class="sizes u-s-m-b-11" style="margin-top: 20px">
                                    <span>@lang('public.available size:')</span>
                                    <div class="size-variant select-box-wrapper">
                                        <select class="select-box product-size" id="getPrice" product-id="{{ $productDetails['id'] }}" name="size" required> {{-- Check front/js/custom.js file --}}



                                            <option value="">@lang('public.select size')</option>
                                            @foreach ($productDetails['attributes'] as $attribute)
                                                <option value="{{ $attribute['size'] }}">{{ $attribute['size'] }}</option>
                                            @endforeach



                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="section-6-social-media-quantity-actions u-s-p-y-14">


                                <div class="quantity-wrapper u-s-m-b-22">
                                    <span>@lang('public.quantity:')</span>
                                    <div class="quantity">
                                        <input class="quantity-text-field" type="number" name="quantity" value="1">
                                    </div>
                                </div>
                                <div>
                                    <button class="button button-outline-secondary" type="submit">@lang('public.add to cart')</button>
                                    <button class="button button-outline-secondary far fa-heart u-s-m-l-6"></button>
                                    <button class="button button-outline-secondary far fa-envelope u-s-m-l-6"></button>
                                </div>



                            </div>
                        </form>



                        <br><br><b>@lang('public.delivery')</b>
                        <input type="text" id="pincode" placeholder="@lang('public.Check Pincode')" required>
                        <button type="button" id="checkPincode">@lang('public.go')</button>


                    </div>
                    <!-- Product-details /- -->
                </div>
            </div>
            <!-- Product-Detail /- -->
            <!-- Detail-Tabs -->
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="detail-tabs-wrapper u-s-p-t-80">
                        <div class="detail-nav-wrapper u-s-m-b-30">
                            <ul class="nav single-product-nav justify-content-center">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#video">@lang('public.product video')</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#detail">@lang('public.product details')</a>
                                </li>
                                <li class="nav-item">
                                    {{-- <a class="nav-link" data-toggle="tab" href="#review">Reviews (15)</a> --}}
                                    <a class="nav-link" data-toggle="tab" href="#review">@lang('public.reviews') {{ count($ratings) }}</a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content">
                            <!-- Description-Tab -->
                            <div class="tab-pane fade active show" id="video">
                                <div class="description-whole-container">



                                    @if ($productDetails['product_video'])
                                        <video controls>
                                            <source src="{{ url('front/videos/product_videos/' . $productDetails['product_video']) }}" type="video/mp4">
                                        </video>
                                    @else
                                        @lang('public.product Video does not exist')
                                    @endif



                                </div>
                            </div>
                            <!-- Description-Tab /- -->
                            <!-- Details-Tab -->
                            <div class="tab-pane fade" id="detail">
                                <div class="specification-whole-container">
                                    <div class="spec-table u-s-m-b-50">
                                        <h4 class="spec-heading">@lang('public.product colors')</h4>
                                        <table>



                                            @php
                                                $productFilters = \App\Models\ProductsFilter::productFilters(); // Get ALL the (enabled/active) Filters
                                                // dd($productFilters);
                                            @endphp

                                            @foreach ($productFilters as $filter) {{-- show ALL the (enabled/active) Filters --}}
                                                @php
                                                    // echo '<pre>', var_dump($product), '</pre>';
                                                    // exit;
                                                    // echo '<pre>', var_dump($filter), '</pre>';
                                                    // exit;
                                                    // dd($filter);
                                                @endphp

                                                @if (isset($productDetails['category_id']))
                                                    @php
                                                        // dd($filter);


                                                        $filterAvailable = \App\Models\ProductsFilter::filterAvailable($filter['id'], $productDetails['category_id']);
                                                    @endphp

                                                    @if ($filterAvailable == 'Yes')

                                                        <tr>
                                                            <td>{{ $filter['filter_name'] }}</td>
                                                            <td>
                                                                @foreach ($filter['filter_values'] as $value)
                                                                    @php
                                                                        // echo '<pre>', var_dump($value), '</pre>'; exit;
                                                                    @endphp
                                                                    @if (!empty($productDetails[$filter['filter_column']]) && $productDetails[$filter['filter_column']] == $value['filter_value']) {{-- $value['filter_value'] is like '4GB' --}} {{-- $productDetails[$filter['filter_column']]    is like    $productDetails['screen_size']    which in turn, may be equal to    '5 to 5.4 in' --}}
                                                                        {{ ucwords($value['filter_value']) }}
                                                                    @endif
                                                                @endforeach
                                                            </td>
                                                        </tr>

                                                    @endif
                                                @endif
                                            @endforeach



                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- Specifications-Tab /- -->
                            <!-- Reviews-Tab -->
                            <div class="tab-pane fade" id="review">
                                <div class="review-whole-container">
                                    <div class="row r-1 u-s-m-b-26 u-s-p-b-22">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="total-score-wrapper">
                                                <h6 class="review-h6">@lang('public.average raiting')</h6>
                                                <div class="circle-wrapper">
                                                    <h1>{{ $avgRating }}</h1>
                                                </div>
                                                <h6 class="review-h6">@lang('public.based on') {{ count($ratings) }} @lang('public.reviews')</h6>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="total-star-meter">
                                                <div class="star-wrapper">
                                                    <span>5 @lang('public.stars')</span>
                                                    <div class="star">
                                                        <span style='width:0'></span>
                                                    </div>
                                                    <span>({{ $ratingFiveStarCount }})</span>
                                                </div>
                                                <div class="star-wrapper">
                                                    <span>4 @lang('public.stars')</span>
                                                    <div class="star">
                                                        <span style='width:0'></span>
                                                    </div>
                                                    <span>({{ $ratingFourStarCount }})</span>
                                                </div>
                                                <div class="star-wrapper">
                                                    <span>3 @lang('public.stars')</span>
                                                    <div class="star">
                                                        <span style='width:0'></span>
                                                    </div>
                                                    <span>({{ $ratingThreeStarCount }})</span>
                                                </div>
                                                <div class="star-wrapper">
                                                    <span>2 @lang('public.stars')</span>
                                                    <div class="star">
                                                        <span style='width:0'></span>
                                                    </div>
                                                    <span>({{ $ratingTwoStarCount }})</span>
                                                </div>
                                                <div class="star-wrapper">
                                                    <span>1 @lang('public.star')</span>
                                                    <div class="star">
                                                        <span style='width:0'></span>
                                                    </div>
                                                    <span>({{ $ratingOneStarCount }})</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row r-2 u-s-m-b-26 u-s-p-b-22">
                                        <div class="col-lg-12">


                                            {{-- Star Rating (of a Product) (in the "Reviews" tab). --}}
                                            <form method="POST" action="{{ url('add-rating') }}" name="formRating" id="formRating">
                                                @csrf {{-- Preventing CSRF Requests: https://laravel.com/docs/9.x/csrf#preventing-csrf-requests --}}

                                                <input type="hidden" name="product_id" value="{{ $productDetails['id'] }}">
                                                <div class="your-rating-wrapper">
                                                    <h6 class="review-h6">@lang('public.your review matters.')</h6>
                                                    <h6 class="review-h6">@lang('public.have you used this product before?')</h6>
                                                    <div class="star-wrapper u-s-m-b-8">


                                                        {{-- Star Rating (of a Product) (in the "Reviews" tab). --}}
                                                        <div class="rate">
                                                            <input style="display: none" type="radio" id="star5" name="rating" value="5" />
                                                            <label for="star5" title="text">5 @lang('public.stars')</label>

                                                            <input style="display: none" type="radio" id="star4" name="rating" value="4" />
                                                            <label for="star4" title="text">4 @lang('public.stars')</label>

                                                            <input style="display: none" type="radio" id="star3" name="rating" value="3" />
                                                            <label for="star3" title="text">3 @lang('public.stars')</label>

                                                            <input style="display: none" type="radio" id="star2" name="rating" value="2" />
                                                            <label for="star2" title="text">2 @lang('public.stars')</label>

                                                            <input style="display: none" type="radio" id="star1" name="rating" value="1" />
                                                            <label for="star1" title="text">1 @lang('public.star')</label>
                                                        </div>


                                                    </div>
                                                        <textarea class="text-area u-s-m-b-8" id="review-text-area" placeholder="Your Review" name="review" required></textarea>
                                                        <button class="button button-outline-secondary">@lang('public.submit review')</button>
                                                    {{-- </form> --}}
                                                </div>
                                            </form>


                                        </div>
                                    </div>
                                    <!-- Get-Reviews -->
                                    <div class="get-reviews u-s-p-b-22">
                                        <!-- Review-Options -->
                                        <div class="review-options u-s-m-b-16">
                                            <div class="review-option-heading">
                                                <h6>@lang('public.reviews')
                                                    <span> ({{ count($ratings) }}) </span>
                                                </h6>
                                            </div>
                                        </div>
                                        <!-- Review-Options /- -->
                                        <!-- All-Reviews -->
                                        <div class="reviewers">

                                            {{-- Display/Show user's Ratings --}}
                                            @if (count($ratings) > 0) {{-- if there're any ratings for the product --}}
                                                @foreach($ratings as $rating)
                                                    <div class="review-data">
                                                        <div class="reviewer-name-and-date">
                                                            <h6 class="reviewer-name">{{ $rating['user']['name'] }}</h6>
                                                            <h6 class="review-posted-date">{{ date('d-m-Y H:i:s', strtotime($rating['created_at'])) }}</h6>
                                                        </div>
                                                        <div class="reviewer-stars-title-body">
                                                            <div class="reviewer-stars">


                                                                {{-- Show/Display the Star Rating of the Review/Rating --}}
                                                                @php
                                                                    $count = 0;

                                                                    // Show the stars
                                                                    while ($count < $rating['rating']): // while $count is 0, 1, 2, 3, 4, or 5 Stars
                                                                @endphp

                                                                        <span style="color: gold">&#9733;</span> {{-- "BLACK STAR" HTML Entity --}} {{-- HTML Entities: https://www.w3schools.com/html/html_entities.asp --}}

                                                                @php
                                                                        $count++;
                                                                    endwhile;
                                                                @endphp


                                                            </div>
                                                            <p class="review-body">
                                                                {{ $rating['review'] }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif

                                        </div>
                                        <!-- All-Reviews /- -->
                                        <!-- Pagination-Review -->

                                        <!-- Pagination-Review /- -->
                                    </div>
                                    <!-- Get-Reviews /- -->
                                </div>
                            </div>
                            <!-- Reviews-Tab /- -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- Detail-Tabs /- -->
            <!-- Different-Product-Section -->
            <div class="detail-different-product-section u-s-p-t-80">
                <!-- Similar-Products -->
                <section class="section-maker">
                    <div class="container">
                        <div class="sec-maker-header text-center">
                            <h3 class="sec-maker-h3">@lang('public.similar products')</h3>
                        </div>
                        <div class="slider-fouc">
                            <div class="products-slider owl-carousel" data-item="4">



                                {{-- Show similar products (or related products) (functionality) by getting other products from THE SAME CATEGORY --}}
                                @foreach ($similarProducts as $product)
                                    <div class="item">
                                        <div class="image-container">
                                            <a class="item-img-wrapper-link" href="{{ url('product/' . $product['id']) }}">



                                                @php
                                                    $product_image_path = 'front/images/product_images/small/' . $product['product_image'];
                                                @endphp

                                                @if (!empty($product['product_image']) && file_exists($product_image_path)) {{-- if the product image exists in BOTH database table AND filesystem (on server) --}}
                                                    <img class="img-fluid" src="{{ asset($product_image_path) }}" alt="Product">
                                                @else {{-- show the dummy image --}}
                                                    <img class="img-fluid" src="{{ asset('front/images/product_images/small/no-image.png') }}" alt="Product">
                                                @endif



                                            </a>
                                            <div class="item-action-behaviors">
                                                <a class="item-quick-look" data-toggle="modal" href="#quick-view">@lang('public.quick look')</a>
                                                <a class="item-mail" href="javascript:void(0)">@lang('public.email')</a>
                                                <a class="item-addwishlist" href="javascript:void(0)">@lang('public.add to wishlist')</a>
                                                <a class="item-addCart" href="javascript:void(0)">@lang('public.add to cart')</a>
                                            </div>
                                        </div>
                                        <div class="item-content">
                                            <div class="what-product-is">
                                                <ul class="bread-crumb">
                                                    <li class="has-separator">



                                                        <a href="shop-v1-root-category.html">{{ $product['product_code'] }}</a>
                                                    </li>
                                                    <li class="has-separator">
                                                        <a href="listing.html">{{ $product['product_color'] }}</a>
                                                    </li>
                                                    <li>
                                                        <a href="listing.html">{{ $product['brand']['name'] }}</a>



                                                    </li>
                                                </ul>
                                                <h6 class="item-title">
                                                    <a href="{{ url('product/' . $product['id']) }}">{{ $product['product_name'] }}</a>
                                                </h6>

                                            </div>



                                            {{-- Call the static getDiscountPrice() method in the Product.php Model to determine the final price of a product because a product can have a discount from TWO things: either a `CATEGORY` discount or `PRODUCT` discout --}}
                                            @php
                                                $getDiscountPrice = \App\Models\Product::getDiscountPrice($product['id']);
                                            @endphp

                                            @if ($getDiscountPrice > 0) {{-- If there's a discount on the price, show the price before (the original price) and after (the new price) the discount --}}
                                                <div class="price-template">
                                                    <div class="item-new-price">
                                                        {{ session('currency') }}{{ $getDiscountPrice }}
                                                    </div>
                                                    <div class="item-old-price">
                                                        {{ session('currency') }}{{ $product['product_price'] }}
                                                    </div>
                                                </div>
                                            @else {{-- if there's no discount on the price, show the original price --}}
                                                <div class="price-template">
                                                    <div class="item-new-price">
                                                        {{ session('currency') }}{{ $product['product_price'] }}
                                                    </div>
                                                </div>
                                            @endif



                                        </div>
                                        <div class="tag new">
                                            <span>@lang('public.new')</span>
                                        </div>
                                    </div>
                                @endforeach



                            </div>
                        </div>
                    </div>
                </section>
                <!-- Similar-Products /- -->
                <!-- Recently-View-Products  -->
                <section class="section-maker">
                    <div class="container">
                        <div class="sec-maker-header text-center">
                            <h3 class="sec-maker-h3">@lang('public.recently viewed products')</h3>
                        </div>
                        <div class="slider-fouc">
                            <div class="products-slider owl-carousel" data-item="4">




                                {{-- Recently Viewed Products (Items) functionality --}}
                                @foreach ($recentlyViewedProducts as $product)
                                    <div class="item">
                                        <div class="image-container">
                                            <a class="item-img-wrapper-link" href="{{ url('product/' . $product['id']) }}">



                                                @php
                                                    $product_image_path = 'front/images/product_images/small/' . $product['product_image'];
                                                @endphp

                                                @if (!empty($product['product_image']) && file_exists($product_image_path)) {{-- if the product image exists in BOTH database table AND filesystem (on server) --}}
                                                    <img class="img-fluid" src="{{ asset($product_image_path) }}" alt="Product">
                                                @else {{-- show the dummy image --}}
                                                    <img class="img-fluid" src="{{ asset('front/images/product_images/small/no-image.png') }}" alt="Product">
                                                @endif



                                            </a>
                                            <div class="item-action-behaviors">
                                                <a class="item-quick-look" data-toggle="modal" href="#quick-view">@lang('public.quick look')</a>
                                                <a class="item-mail" href="javascript:void(0)">@lang('public.email')</a>
                                                <a class="item-addwishlist" href="javascript:void(0)">@lang('public.add to wishlist')</a>
                                                <a class="item-addCart" href="javascript:void(0)">@lang('public.add to cart')</a>
                                            </div>
                                        </div>
                                        <div class="item-content">
                                            <div class="what-product-is">
                                                <ul class="bread-crumb">
                                                    <li class="has-separator">



                                                        <a href="shop-v1-root-category.html">{{ $product['product_code'] }}</a>
                                                    </li>
                                                    <li class="has-separator">
                                                        <a href="listing.html">{{ $product['product_color'] }}</a>
                                                    </li>
                                                    <li>
                                                        <a href="listing.html">{{ $product['brand']['name'] }}</a>



                                                    </li>
                                                </ul>
                                                <h6 class="item-title">
                                                    <a href="{{ url('product/' . $product['id']) }}">{{ $product['product_name'] }}</a>
                                                </h6>
                                            </div>



                                            {{-- Call the static getDiscountPrice() method in the Product.php Model to determine the final price of a product because a product can have a discount from TWO things: either a `CATEGORY` discount or `PRODUCT` discout --}}
                                            @php
                                                $getDiscountPrice = \App\Models\Product::getDiscountPrice($product['id']);
                                            @endphp

                                            @if ($getDiscountPrice > 0) {{-- If there's a discount on the price, show the price before (the original price) and after (the new price) the discount --}}
                                                <div class="price-template">
                                                    <div class="item-new-price">
                                                        {{ session('currency') }}{{ $getDiscountPrice }}
                                                    </div>
                                                    <div class="item-old-price">
                                                        {{ session('currency') }}{{ $product['product_price'] }}
                                                    </div>
                                                </div>
                                            @else {{-- if there's no discount on the price, show the original price --}}
                                                <div class="price-template">
                                                    <div class="item-new-price">
                                                        {{ session('currency') }}{{ $product['product_price'] }}
                                                    </div>
                                                </div>
                                            @endif



                                        </div>
                                        <div class="tag new">
                                            <span>@lang('public.new')</span>
                                        </div>
                                    </div>
                                @endforeach



                            </div>
                        </div>
                    </div>
                </section>
                <!-- Recently-View-Products /- -->
            </div>
            <!-- Different-Product-Section /- -->
        </div>
    </div>
    <!-- Single-Product-Full-Width-Page /- -->
@endsection
