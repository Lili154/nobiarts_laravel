@extends('admin.layout.layout')


@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin">
                    <div class="row">
                        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                            <h3 class="font-weight-bold">@lang('public.welcome') {{ Auth::guard('admin')->user()->name }}</h3> {{-- Accessing Specific Guard Instances: https://laravel.com/docs/9.x/authentication#accessing-specific-guard-instances --}} <!-- https://laravel.com/docs/9.x/authentication#retrieving-the-authenticated-user --> <!-- https://laravel.com/docs/9.x/authentication#accessing-specific-guard-instances --> <!-- https://laravel.com/docs/9.x/eloquent#retrieving-models -->
                            <h6 class="font-weight-normal mb-0">@lang('public.all systems are running smoothly!')</h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">


                <div class="col-md-6 grid-margin transparent">


                    <div class="row">
                        <div class="col-md-6 mb-4 stretch-card transparent">
                            <div class="card card-tale">
                                <div class="card-body">
                                    <p class="mb-4">@lang('public.total sections')</p>
                                    <p class="fs-30 mb-2">{{ $sectionsCount }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4 stretch-card transparent">
                            <div class="card card-dark-blue">
                                <div class="card-body">
                                    <p class="mb-4">@lang('public.total categories')</p>
                                    <p class="fs-30 mb-2">{{ $categoriesCount }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
                            <div class="card card-light-blue">
                                <div class="card-body">
                                    <p class="mb-4">@lang('public.total products')</p>
                                    <p class="fs-30 mb-2">{{ $productsCount }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 stretch-card transparent">
                            <div class="card card-light-danger">
                                <div class="card-body">
                                    <p class="mb-4">@lang('public.total brands')</p>
                                    <p class="fs-30 mb-2">{{ $brandsCount }}</p>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
                <div class="col-md-6 grid-margin transparent">
                    <div class="row">
                        <div class="col-md-6 mb-4 stretch-card transparent">
                            <div class="card card-tale">
                                <div class="card-body">
                                    <p class="mb-4">@lang('public.total orders')</p>
                                    <p class="fs-30 mb-2">{{ $ordersCount }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4 stretch-card transparent">
                            <div class="card card-dark-blue">
                                <div class="card-body">
                                    <p class="mb-4">@lang('public.total coupons')</p>
                                    <p class="fs-30 mb-2">{{ $couponsCount }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
                            <div class="card card-light-blue">
                                <div class="card-body">
                                    <p class="mb-4">@lang('public.total users')</p>
                                    <p class="fs-30 mb-2">{{ $usersCount }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 stretch-card transparent">
                            <div class="card card-light-danger">
                                <div class="card-body">
                                    <p class="mb-4">@lang('public.total subscribers')</p>
                                    <p class="fs-30 mb-2">0</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
        @include('admin.layout.footer')
        <!-- partial -->
    </div>
@endsection
