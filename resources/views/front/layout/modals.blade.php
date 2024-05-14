{{-- Modal Popup --}}


<!-- Dummy Selectbox -->
<div class="select-dummy-wrapper">
    <select id="compute-select">
        <option id="compute-option">@lang('public.all')</option>
    </select>
</div>
<!-- Dummy Selectbox /- -->
<!-- Responsive-Search -->
<div class="responsive-search-wrapper">
    <button type="button" class="button ion ion-md-close" id="responsive-search-close-button"></button>
    <div class="responsive-search-container">
        <div class="container">
            <p>@lang('public.start typing and press Enter to search')</p>
            <form class="responsive-search-form">
                <label class="sr-only" for="search-text">@lang('public.search')</label>
                <input id="search-text" type="text" class="responsive-search-field" placeholder="@lang('public.please search')">
                <i class="fas fa-search"></i>
            </form>
        </div>
    </div>
</div>
<!-- Responsive-Search /- -->
<!-- Newsletter-Modal -->




<!-- Newsletter-Modal /- -->
<!-- Quick-view-Modal -->
<div id="quick-view" class="modal fade">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <button type="button" class="button dismiss-button ion ion-ios-close" data-dismiss="modal"></button>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <!-- Product-zoom-area -->
                        <div class="zoom-area">
                            <img id="zoom-pro-quick-view" class="img-fluid" src="{{ asset('front/images/product/product@4x.jpg') }}" data-zoom-image="{{ asset('front/images/product/product@4x.jpg') }}" alt="Zoom Image">
                            <div id="gallery-quick-view" class="u-s-m-t-10">
                                <a class="active" data-image="{{ asset('front/images/product/product@4x.jpg') }}" data-zoom-image="{{ asset('front/images/product/product@4x.jpg') }}">
                                <img src="{{ asset('front/images/product/product@2x.jpg') }}" alt="Product">
                                </a>
                                <a data-image="{{ asset('front/images/product/product@4x.jpg') }}" data-zoom-image="{{ asset('front/images/product/product@4x.jpg') }}">
                                <img src="{{ asset('front/images/product/product@2x.jpg') }}" alt="Product">
                                </a>
                                <a data-image="{{ asset('front/images/product/product@4x.jpg') }}" data-zoom-image="{{ asset('front/images/product/product@4x.jpg') }}">
                                <img src="{{ asset('front/images/product/product@2x.jpg') }}" alt="Product">
                                </a>
                                <a data-image="{{ asset('front/images/product/product@4x.jpg') }}" data-zoom-image="{{ asset('front/images/product/product@4x.jpg') }}">
                                <img src="{{ asset('front/images/product/product@2x.jpg') }}" alt="Product">
                                </a>
                                <a data-image="{{ asset('front/images/product/product@4x.jpg') }}" data-zoom-image="{{ asset('front/images/product/product@4x.jpg') }}">
                                <img src="{{ asset('front/images/product/product@2x.jpg') }}" alt="Product">
                                </a>
                                <a data-image="{{ asset('front/images/product/product@4x.jpg') }}" data-zoom-image="{{ asset('front/images/product/product@4x.jpg') }}">
                                <img src="{{ asset('front/images/product/product@2x.jpg') }}" alt="Product">
                                </a>
                            </div>
                        </div>
                        <!-- Product-zoom-area /- -->
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <!-- Product-details -->
                        <div class="all-information-wrapper">
                            <div class="section-1-title-breadcrumb-rating">
                                <div class="product-title">
                                    <h1>
                                        <a href="single-product.html">@lang('public.product name')</a>
                                    </h1>
                                </div>
                                <ul class="bread-crumb">
                                    <li class="has-separator">
                                        <a href="/">@lang('public.home')</a>
                                    </li>
                                    <li class="has-separator">
                                        <a href="shop-v1-root-category.html">@lang('public.men clothing') </a>
                                    </li>
                                    <li class="has-separator">
                                        <a href="listing.html">@lang('public.tops')</a>
                                    </li>
                                    <li class="is-marked">
                                        <a href="shop-v3-sub-sub-category.html">@lang('public.hoodies')</a>
                                    </li>
                                </ul>
                                <div class="product-rating">
                                    <div class='star' title="4.5 out of 5 - based on 23 Reviews">
                                        <span style='width:67px'></span>
                                    </div>
                                    <span>(23)</span>
                                </div>
                            </div>
                            <div class="section-2-short-description u-s-p-y-14">
                                <h6 class="information-heading u-s-m-b-8">@lang('public.description:')</h6>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                                </p>
                            </div>
                            <div class="section-3-price-original-discount u-s-p-y-14">
                                <div class="price">
                                    <h4>$100.00</h4>
                                </div>
                                <div class="original-price">
                                    <span>@lang('public.original price:')</span>
                                    <span>$120.00</span>
                                </div>
                                <div class="discount-price">
                                    <span>@lang('public.discount:')</span>
                                    <span>15%</span>
                                </div>
                                <div class="total-save">
                                    <span>@lang('public.save')</span>
                                    <span>$20</span>
                                </div>
                            </div>
                            <div class="section-4-sku-information u-s-p-y-14">
                                <h6 class="information-heading u-s-m-b-8">@lang('public.sku information:')</h6>
                                <div class="availability">
                                    <span>@lang('public.availability:')</span>
                                    <span>@lang('public.in stock')</span>
                                </div>
                                <div class="left">
                                    <span>@lang('public.only:')</span>
                                    <span>50 @lang('public.left')</span>
                                </div>
                            </div>
                            <div class="section-5-product-variants u-s-p-y-14">
                                <h6 class="information-heading u-s-m-b-8">@lang('public.product variants:')</h6>
                                <div class="color u-s-m-b-11">
                                    <span>@lang('public.available color:')</span>
                                    <div class="color-variant select-box-wrapper">
                                        <select class="select-box product-color">
                                            <option value="1">@lang('public.heather grey')</option>
                                            <option value="3">@lang('public.black')</option>
                                            <option value="5">@lang('public.white')</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="sizes u-s-m-b-11">
                                    <span>@lang('public.available size')</span>
                                    <div class="size-variant select-box-wrapper">
                                        <select class="select-box product-size">
                                            <option value="">@lang('public.male') 2XL</option>
                                            <option value="">@lang('public.male') 3XL</option>
                                            <option value="">@lang('public.kids') 4</option>
                                            <option value="">@lang('public.kids') 6</option>
                                            <option value="">@lang('public.kids') 8</option>
                                            <option value="">@lang('public.kids') 10</option>
                                            <option value="">@lang('public.kids') 12</option>
                                            <option value="">@lang('public.female') @lang('public.small')</option>
                                            <option value="">@lang('public.male') @lang('public.small')</option>
                                            <option value="">@lang('public.female') @lang('public.medium')</option>
                                            <option value="">@lang('public.male') @lang('public.medium')</option>
                                            <option value="">@lang('public.female') @lang('public.large')</option>
                                            <option value="">@lang('public.male') @lang('public.large')</option>
                                            <option value="">@lang('public.female') XL</option>
                                            <option value="">@lang('public.male') XL</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="section-6-social-media-quantity-actions u-s-p-y-14">
                                <form action="#" class="post-form">
                                    <div class="quick-social-media-wrapper u-s-m-b-22">
                                        <span>@lang('public.share:')</span>
                                        <ul class="social-media-list">
                                            <li>
                                                <a href="#">
                                                <i class="fab fa-facebook-f"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                <i class="fab fa-twitter"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                <i class="fab fa-google-plus-g"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                <i class="fas fa-rss"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                <i class="fab fa-pinterest"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="quantity-wrapper u-s-m-b-22">
                                        <span>@lang('public.quantity:')</span>
                                        <div class="quantity">
                                            <input type="text" class="quantity-text-field" value="1">
                                            <a class="plus-a" data-max="1000">&#43;</a>
                                            <a class="minus-a" data-min="1">&#45;</a>
                                        </div>
                                    </div>
                                    <div>
                                        <button class="button button-outline-secondary" type="submit">@lang('public.add to cart')</button>
                                        <button class="button button-outline-secondary far fa-heart u-s-m-l-6"></button>
                                        <button class="button button-outline-secondary far fa-envelope u-s-m-l-6"></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- Product-details /- -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Quick-view-Modal /- -->
