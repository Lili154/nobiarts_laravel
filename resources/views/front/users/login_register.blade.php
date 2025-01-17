{{-- This page is accessed from Customer Login tab in the dropdown menu in the header (in front/layout/header.blade.php) --}}
@extends('front.layout.layout')


@section('content')

    <!-- Page Introduction Wrapper -->
    <div class="page-style-a">
        <div class="container">
            <div class="page-intro">
                <h1 style="color:#F7E8DF"> @lang('public.create user account or login')</h1>

            </div>
        </div>
    </div>
    <!-- Page Introduction Wrapper /- -->
    <!-- Account-Page -->
    <div class="page-account u-s-p-t-80">
        <div class="container">




            @if (Session::has('success_message')) <!-- Check userRegister() method in Front/UserController.php -->
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>@lang('public.success:')</strong> {{ Session::get('success_message') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            {{-- Displaying Error Messages --}}
            @if (Session::has('error_message')) <!-- Check userRegister() method in Front/UserController.php -->
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>@lang('public.error:')</strong> {{ Session::get('error_message') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            {{-- Displaying Error Messages --}}
            @if ($errors->any()) <!-- Check userRegister() method in Front/UserController.php -->
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>@lang('public.error:')</strong> @php echo implode('', $errors->all('<div>:message</div>')); @endphp
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




                        <p id="login-error"></p>
                        <form id="loginForm" action="javascript:;" method="post">
                            @csrf
                            <div class="u-s-m-b-30">
                                <label for="user-email">@lang('public.email')
                                    <span class="astk">*</span>
                                </label>
                                <input type="email" name="email" id="users-email" class="text-field" placeholder="Email" name="email">
                                <p id="login-email"></p>
                            </div>
                            <div class="u-s-m-b-30">
                                <label for="user-password">@lang('public.password')
                                    <span class="astk">*</span>
                                </label>
                                <input type="password" name="password" id="users-password" class="text-field" placeholder="Password" name="password">
                                <p id="login-password"></p>
                            </div>



                            <div class="group-inline u-s-m-b-30">

                                {{-- Remember Me Functionality --}}
                                <div class="group-1">
                                    <input type="checkbox" class="check-box" id="remember-me-token">
                                    <label class="label-text" for="remember-me-token">@lang('public.remember me')</label>
                                </div>


                                {{-- Forgot Password Functionality --}}
                                <div class="group-2 text-right">
                                    <div class="page-anchor">
                                        <a href="{{ url('user/forgot-password') }}">
                                            <i class="fas fa-circle-o-notch u-s-m-r-9"></i>@lang('public.lost your password?')
                                        </a>
                                    </div>
                                </div>
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



                        {{-- Registration Success Message using jQuery. Check front/js/custom.js --}}
                        {{-- <p id="register-success" style="color: green"></p> --}}
                        <p id="register-success"></p>




                        <form id="registerForm" action="javascript:;" method="post">
                            @csrf
                            <div class="u-s-m-b-30">
                                <label for="username">@lang('public.name')
                                    <span class="astk">*</span>
                                </label>
                                <input type="text" id="user-name" class="text-field" placeholder="User Name" name="name">
                                {{-- <p id="register-name" style="color: red"></p> --}}
                                <p id="register-name"></p>
                            </div>
                            <div class="u-s-m-b-30">
                                <label for="usermobile">@lang('public.mobile')
                                    <span class="astk">*</span>
                                </label>
                                <input type="text" id="user-mobile" class="text-field" placeholder="User Mobile" name="mobile">
                                {{-- <p id="register-mobile" style="color: red"></p> --}}
                                <p id="register-mobile"></p>
                            </div>
                            <div class="u-s-m-b-30">
                                <label for="useremail">@lang('public.email')
                                    <span class="astk">*</span>
                                </label>
                                <input type="email" id="user-email" class="text-field" placeholder="User Email" name="email">
                                {{-- <p id="register-email" style="color: red"></p> --}}
                                <p id="register-email"></p>
                            </div>
                            <div class="u-s-m-b-30">
                                <label for="userpassword">@lang('public.password')
                                    <span class="astk">*</span>
                                </label>
                                <input type="password" id="user-password" class="text-field" placeholder="User Password" name="password">
                                {{-- <p id="register-password" style="color: red"></p> --}}
                                <p id="register-password"></p>
                            </div>
                            <div class="u-s-m-b-30"> {{-- "I've read and accept the terms & conditions" Checkbox --}}
                                <input type="checkbox" class="check-box" id="accept" name="accept">
                                <label class="label-text no-color" for="accept">@lang('public.i’ve read and accept the')
                                    <a href="terms-and-conditions.html" class="u-c-brand">@lang('public.terms & conditions')</a>
                                </label>
                                {{-- <p id="register-accept" style="color: red"></p> --}}
                                <p id="register-accept"></p>
                            </div>

                            <div class="u-s-m-b-45">
                                <button class="button button-primary w-100" style="background-color:#792D89">@lang('public.register')</button>
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
