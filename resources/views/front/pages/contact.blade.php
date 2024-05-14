{{-- This page is rendered by contact() method inside Front/CmsController.php --}}
@extends('front.layout.layout')


@section('content')
    <!-- Page Introduction Wrapper -->
    <div class="page-style-a">
        <div class="container">
            <div class="page-intro">
                <h2>@lang('public.contact us')</h2>
                <ul class="bread-crumb">
                    <li class="has-separator">
                        <i class="ion ion-md-home"></i>
                        <a href="/">@lang('public.home')</a>
                    </li>
                    <li class="is-marked">
                        <a href="contact.html">@lang('public.contact us')</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Page Introduction Wrapper /- -->
    <!-- Contact-Page -->
    <div class="page-contact u-s-p-t-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="touch-wrapper">
                        <h1 class="contact-h1">@lang('public.Get In Touch With Us')</h1>



                        @if (Session::has('error_message')) <!-- Check AdminController.php, updateAdminPassword() method -->
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>@lang('public.error:')</strong> {{ Session::get('error_message') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif




                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">

                                @php
                                    echo implode('', $errors->all('<div>:message</div>'))
                                @endphp

                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        @if (Session::has('success_message')) <!-- Check vendorRegister() method in Front/VendorController.php -->
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>@lang('public.success:')</strong> {{ Session::get('success_message') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif


                        <form action="{{ url('contact') }}" method="post">
                            @csrf
                            <div class="group-inline u-s-m-b-30">
                                <div class="group-1 u-s-p-r-16">
                                    <label for="contact-name">@lang('public.your name')
                                        <span class="astk">*</span>
                                    </label>
                                    <input type="text" id="contact-name" class="text-field" placeholder="@lang('public.name')" name="name" value="{{ old('name') }}">
                                </div>
                                <div class="group-2">
                                    <label for="contact-email">@lang('public.your email')
                                        <span class="astk">*</span>
                                    </label>
                                    <input type="email" id="contact-email" class="text-field" placeholder="@lang('public.email')" name="email" value="{{ old('email') }}">
                                </div>
                            </div>
                            <div class="u-s-m-b-30">
                                <label for="contact-subject">@lang('public.subject')
                                    <span class="astk">*</span>
                                </label>
                                <input type="text" id="contact-subject" class="text-field" placeholder="@lang('public.subject')" name="subject" value="{{ old('subject') }}">
                            </div>
                            <div class="u-s-m-b-30">
                                <label for="contact-message">@lang('public.message:')</label>
                                <span class="astk">*</span>
                                <textarea class="text-area" id="contact-message" name="message">{{ old('message') }}</textarea>
                            </div>
                            <div class="u-s-m-b-30">
                                <button type="submit" class="button button-outline-secondary">@lang('public.send message')</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="information-about-wrapper">
                        <h1 class="contact-h1">@lang('public.Information About Us')</h1>
                        <p>
                            @lang('public.Nobiarts.com is a platform where you can offer or purchase goods, services and events yourself. The most interesting events and exhibitions, as well as handmade products to the largest products for your taste! We offer the opportunity to realize even the smallest private entrepreneurs so that their business develops. Exchange your goods and services on our website, attend online courses for self-development or place an order - we will promptly take it to work!')</p>
<p>@lang('public.You no longer need to open many tabs in your browser to find the right products and services at the best price - we created it for you. Order the desired product or service on the website and we will promptly deliver it to anywhere in the world!')</p>


<p>@lang('public.There are many excursions to choose from - choose routes that are of interest to you and your loved ones. Create your exciting trips and business trips directly on our website and travel easily and simply! Wherever you go and whatever you want to do, Nobi Arts will help you with it.')</p>

<p>@lang("public.Our team consists of experienced professionals who are always ready to help you. The company's support service works around the clock and seven days a week.")
                        </p>

                    </div>
                    <div class="contact-us-wrapper">
                        <h1 class="contact-h1">@lang('public.contact us')</h1>
                        {{-- <div class="contact-material u-s-m-b-16">
                            <h6>@lang('public.location')</h6>
                            <span>10 Salah Salem St.</span>
                            <span>Cairo, Egypt</span>
                        </div> --}}
                        <div class="contact-material u-s-m-b-16">
                            <h6>@lang('public.email')</h6>
                            <span>info@nobiarts.com</span>
                        </div>
                        {{-- <div class="contact-material u-s-m-b-16">
                            <h6>@lang('public.telephone')</h6>
                            <span>+201122237359</span>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
        <div class="u-s-p-t-80">
            <div id="map"></div>
        </div>
    </div>
    <!-- Contact-Page /- -->
@endsection
