<!-- Footer -->
<div class="outer-footer-wrapper u-s-p-y-80">
    <h6>
        @lang("public.for special offers and other discount information")
    </h6>
    <h1 style="font-size: 40px;
    font-weight: 700;
    color: #5e0071;
    font-family: Georgia;">
        @lang("public.subscribe to our newsletter")
    </h1>
    <p>
        @lang("public.subscribe to the mailing list to receive updates on promotions, new arrivals, discount and coupons.")
    </p>




    <form class="newsletter-form">
        <label class="sr-only" for="subscriber_email">@lang("public.enter your email")</label>
        <input type="text" style="border:2px solid #792D89" placeholder="@lang('public.your email address')" id="subscriber_email" name="subscriber_email" required>
        <button type="button" class="button" onclick="addSubscriber()">@lang('public.submit')</button>
    </form>



</div>
<footer class="footer"style="background:#234A74;">
    <div class="container" >
        <!-- Outer-Footer -->
        {{-- <div class="outer-footer-wrapper u-s-p-y-80">
            <h6>
                @lang("public.for special offers and other discount information")
            </h6>
            <h1 style="font-size: 40px;
            font-weight: 700;
            color: #5e0071;
            font-family: Georgia;">
                @lang("public.subscribe to our newsletter")
            </h1>
            <p>
                @lang("public.subscribe to the mailing list to receive updates on promotions, new arrivals, discount and coupons.")
            </p>




            <form class="newsletter-form">
                <label class="sr-only" for="subscriber_email">@lang("public.enter your email")</label>
                <input type="text" style="border:2px solid #792D89" placeholder="@lang('public.your email address')" id="subscriber_email" name="subscriber_email" required>
                <button type="button" class="button" onclick="addSubscriber()">@lang('public.submit')</button>
            </form>



        </div> --}}
        <!-- Outer-Footer /- -->
        <!-- Mid-Footer -->
        <div class="mid-footer-wrapper u-s-p-b-80">
            <div class="row" style="padding-top:56px;">
                <div class="col-lg-3 col-md-3 col-sm-12">
                    <div class="footer-list">
                        <h6 style="color: #56c8ff">@lang('public.company')</h6>
                        <ul>
                            <li>
                                <a href="{{ url('about-us') }}">@lang('public.about us')</a>
                            </li>
                            <li>
                                <a href="{{ url('contact') }}">@lang('public.contact us')</a>
                            </li>
                            <li>
                                <a href="{{ route('terms') }}">@lang('public.terms & conditions')</a>
                            </li>
                            <li>
                                <a href="{{ route('offer') }}">@lang('public.partnership agreement')</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12">
                    <div class="footer-list">
                        <h6 style="color: #56c8ff">@lang('public.collection')</h6>
                        <ul>
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
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12">
                    <div class="footer-list">
                        <h6 style="color: #56c8ff">@lang('public.accaunt')</h6>
                        <ul>
                            <li>
                                <a href="{{ url('user/account') }}">@lang('public.my accaunt')</a>
                            </li>
                            <li>
                                <a href="{{ url('user/orders') }}">@lang('public.my orders')</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12">
                    <div class="footer-list">
                        <h6 style="color: #56c8ff">@lang('public.contact')</h6>
                        <ul>
                            <li>
                                <i class="fas fa-location-arrow u-s-m-r-9" style="color: #56c8ff"></i>
                                <span style="color: #56c8ff">Nobiarts</span>
                            </li>
                            {{-- <li>
                                <a href="tel:+201255845857">
                                <i class="fas fa-phone u-s-m-r-9"></i>
                                <span>+01255845857</span>
                                </a>
                            </li> --}}
                            <li>
                                <a href="mailto:info@nobiarts.com">
                                <i class="fas fa-envelope u-s-m-r-9"></i>
                                <span>
                                    info@nobiarts.com</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- Mid-Footer /- -->
        <!-- Bottom-Footer -->
        <div class="bottom-footer-wrapper">
            <div class="social-media-wrapper">
                <ul class="social-media-list">
                    <li>
                        <a target="_blank" href="#">
                        <i class="fab fa-facebook-f"></i>
                        </a>
                    </li>
                    <li>
                        <a target="_blank" href="#">
                        <i class="fab fa-twitter"></i>
                        </a>
                    </li>
                    <li>
                        <a target="_blank" href="#">
                        <i class="fab fa-google-plus-g"></i>
                        </a>
                    </li>
                    <li>
                        <a target="_blank" href="#">
                        <i class="fas fa-rss"></i>
                        </a>
                    </li>
                    <li>
                        <a target="_blank" href="#">
                        <i class="fab fa-pinterest"></i>
                        </a>
                    </li>
                    <li>
                        <a target="_blank" href="#">
                        <i class="fab fa-linkedin-in"></i>
                        </a>
                    </li>
                    <li>
                        <a target="_blank" href="#">
                        <i class="fab fa-youtube"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <p class="copyright-text">Copyright &copy; 2024
                <a target="_blank" rel="nofollow" href="#">NOBIARTS</a> | All Right Reserved
            </p>
        </div>
    </div>
    <!-- Bottom-Footer /- -->
</footer>
<!-- Footer /- -->
