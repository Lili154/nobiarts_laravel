{{-- This page is accessed from Vendor Login tab in the drop-down menu in the header (in front/layout/header.blade.php) --}}
@extends('front.layout.layout')


@section('content')
    <!-- Page Introduction Wrapper -->
     <div class="page-style-a">
        <div class="container">
            <div class="page-intro">
                <h1 style="color:#F7E8DF"><bold>@lang('public.login/register')</bold></h>

            </div>
        </div>
    </div>
    <!-- Page Introduction Wrapper /- -->
    <!-- Account-Page -->
    <div class="page-account u-s-p-t-80">
        <div class="container">



            {{-- Displaying The Validation Errors: https://laravel.com/docs/9.x/validation#quick-displaying-the-validation-errors AND https://laravel.com/docs/9.x/blade#validation-errors --}}
            {{-- Determining If An Item Exists In The Session (using has() method): https://laravel.com/docs/9.x/session#determining-if-an-item-exists-in-the-session --}}
            {{-- Our Bootstrap success message in case of updating admin password is successful: --}}
            {{-- Displaying Success Message --}}
            @if (Session::has('success_message')) <!-- Check vendorRegister() method in Front/VendorController.php -->
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>@lang('public.success:')</strong> {{ Session::get('success_message') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            {{-- Displaying Error Messages --}}
            @if (Session::has('error_message')) <!-- Check vendorRegister() method in Front/VendorController.php -->
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>@lang('public.error:')</strong> {{ Session::get('error_message') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            {{-- Displaying Error Messages --}}
            @if ($errors->any()) <!-- Check vendorRegister() method in Front/VendorController.php -->
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error:</strong> @php echo implode('', $errors->all('<div>:message</div>')); @endphp
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif



            <div class="row">
                <!-- Login -->
                <div class="col-lg-6">
                    <div class="login-wrapper">
                        <h2 class="account-h2 u-s-m-b-20">@lang('public.login')</h2>
                        <h6 class="account-h6 u-s-m-b-30">@lang('public.welcome back! Sign in to your account.')</h6>



                        <form action="{{ url('admin/login') }}" method="post"> {{-- the same HTML Form as the one in the Admin Panel in admin/login.blade.php --}}
                            @csrf {{-- https://laravel.com/docs/9.x/csrf#preventing-csrf-requests --}}


                            <div class="u-s-m-b-30">
                                <label for="vendor-email">@lang('public.email')
                                    <span class="astk">*</span>
                                </label>
                                <input type="email" name="email" id="vendor-email" class="text-field" placeholder="Email">
                            </div>
                            <div class="u-s-m-b-30">
                                <label for="vendor-password">@lang('public.password')
                                    <span class="astk">*</span>
                                </label>
                                <input type="password" name="password" id="vendor-password" class="text-field" placeholder="Password">
                            </div>
                            <div class="m-b-45">
                                <button class="button button-outline-secondary w-100" style="border:1px solid #792D89">@lang('public.login')</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Login /- -->
                <!-- Register -->
                <div class="col-lg-6">
                    <div class="reg-wrapper">
                        <h2 class="account-h2 u-s-m-b-20">@lang('public.register')</h2>
                        <h6 class="account-h6 u-s-m-b-30">@lang('public.registering for this site allows you to access your order status and history.')</h6>




                        <form id="vendorForm" action="{{ url('/vendor/register') }}" method="post">
                            @csrf


                            <div class="u-s-m-b-30">
                                <label for="vendorname">@lang('public.name')
                                    <span class="astk">*</span>
                                </label>
                                <input type="text" id="vendorname" class="text-field" placeholder="Vendor Name" name="name">
                            </div>
                            <div class="u-s-m-b-30">
                                <label for="vendormobile">@lang('public.mobile')
                                    <span class="astk">*</span>
                                </label>
                                <input type="text" id="vendormobile" class="text-field" placeholder="Vendor Mobile" name="mobile">
                            </div>
                            <div class="u-s-m-b-30">
                                <label for="vendoremail">@lang('public.email')
                                    <span class="astk">*</span>
                                </label>
                                <input type="email" id="vendoremail" class="text-field" placeholder="Vendor Email" name="email">
                            </div>
                            <div class="u-s-m-b-30">
                                <label for="vendorpassword">@lang('public.password')
                                    <span class="astk">*</span>
                                </label>
                                <input type="password" id="vendorpassword" class="text-field" placeholder="Vendor Password" name="password">
                            </div>

                            <div class="u-s-m-b-30"> {{-- "I've read and accept the terms & conditions" Checkbox --}}
                                <input type="checkbox" class="check-box" id="accept" name="accept">
                                <label class="label-text no-color" for="accept">@lang('public.i’ve read and accept the')
                                    <a href="{{ route('terms') }}" class="u-c-brand">@lang('public.terms & conditions')</a> & <a href="{{ route('offer') }}" class="u-c-brand">@lang('public.partnership agreement')</a>
                                </label>
                            </div>

                            <div class="u-s-m-b-45">
                                <button class="button button-primary w-100"style="background-color:#792D89">@lang('public.register')</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Register /- -->
            </div>
        </div>
    </div>
    <!-- Account-Page /- -->
@endsection
