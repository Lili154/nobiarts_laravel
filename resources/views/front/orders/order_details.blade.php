{{-- This page is rendered by orders() method inside Front/OrderController.php (depending on if the order id Optional Parameter (slug) is passed in or not) --}}


@extends('front.layout.layout')



@section('content')
    <!-- Page Introduction Wrapper -->
    <div class="page-style-a">
        <div class="container">
            <div class="page-intro">
                <h2>@lang('public.order') #{{ $orderDetails['id'] }} @lang('public.details')</h2>
                <ul class="bread-crumb">
                    <li class="has-separator">
                        <i class="ion ion-md-home"></i>
                        <a href="/">@lang('public.home')</a>
                    </li>
                    <li class="is-marked">
                        <a href="{{ url('user/orders') }}">@lang('public.orders')</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Page Introduction Wrapper /- -->
    <!-- Cart-Page -->
    <div class="page-cart u-s-p-t-80">
        <div class="container">
            <div class="row">

                {{-- Orders info table --}}
                <table class="table table-striped table-borderless">
                    <tr class="table-danger">
                        <td colspan="2">
                            <strong>@lang('public.order details')</strong>
                        </td>
                    </tr>
                    <tr>
                        <td>@lang('public.order date')</td>
                        <td>{{ date('Y-m-d h:i:s', strtotime($orderDetails['created_at'])) }}</td>
                    </tr>
                    <tr>
                        <td>@lang('public.order status')</td>
                        <td>{{ $orderDetails['order_status'] }}</td>
                    </tr>
                    <tr>
                        <td>@lang('public.order total')</td>
                        <td>{{ session("currency") }}{{ $orderDetails['grand_total'] }}</td>
                    </tr>
                    <tr>
                        <td>@lang('public.shipping charges')</td>
                        <td>{{ session("currency") }}{{ $orderDetails['shipping_charges'] }}</td>
                    </tr>

                    @if ($orderDetails['coupon_code'] != '')
                        <tr>
                            <td>@lang('public.coupon code')</td>
                            <td>{{ $orderDetails['coupon_code'] }}</td>
                        </tr>
                        <tr>
                            <td>@lang('public.coupon amount')</td>
                            <td>{{ session("currency") }}{{ $orderDetails['coupon_amount'] }}</td>
                        </tr>
                    @endif


                    @if ($orderDetails['courier_name'] != '')
                        <tr>
                            <td>@lang('public.courier name')</td>
                            <td>{{ $orderDetails['courier_name'] }}</td>
                        </tr>
                        <tr>
                            <td>@lang('public.tracking number')</td>
                            <td>{{ $orderDetails['tracking_number'] }}</td>
                        </tr>
                    @endif

                    <tr>
                        <td>@lang('public.payment method')</td>
                        <td>{{ $orderDetails['payment_method'] }}</td>
                    </tr>
                </table>

                {{-- Order products info table --}}
                <table class="table table-striped table-borderless">
                    <tr class="table-danger">
                        <th>@lang('public.product image')</th>
                        <th>@lang('public.product code')</th>
                        <th>@lang('public.product name')</th>
                        <th>@lang('public.product size')</th>
                        <th>@lang('public.product color')</th>
                        <th>@lang('public.product qty')</th>
                    </tr>

                    @foreach ($orderDetails['orders_products'] as $product)
                        <tr>
                            <td>
                                @php
                                    $getProductImage = \App\Models\Product::getProductImage($product['product_id']);
                                @endphp
                                <a target="_blank" href="{{ url('product/' . $product['product_id']) }}">
                                    <img style="width: 80px" src="{{ asset('front/images/product_images/small/' . $getProductImage) }}">
                                </a>
                            </td>
                            <td>{{ $product['product_code'] }}</td>
                            <td>{{ $product['product_name'] }}</td>
                            <td>{{ $product['product_size'] }}</td>
                            <td>{{ $product['product_color'] }}</td>
                            <td>{{ $product['product_qty'] }}</td>
                        </tr>


                        @if ($product['courier_name'] != '')
                            <tr>
                                <td colspan="6">@lang('public.courier name'): {{ $product['courier_name'] }}, @lang('public.tracking number'): {{ $product['tracking_number'] }}</td>
                            </tr>
                        @endif

                    @endforeach
                </table>

                {{-- Delivery Address info table --}}
                <table class="table table-striped table-borderless">
                    <tr class="table-danger">
                        <td colspan="2">
                            <strong>@lang('public.delivery address')</strong>
                        </td>
                    </tr>
                    <tr>
                        <td>@lang('public.name')</td>
                        <td>{{ $orderDetails['name'] }}</td>
                    </tr>
                    <tr>
                        <td>@lang('public.address')</td>
                        <td>{{ $orderDetails['address'] }}</td>
                    </tr>
                    <tr>
                        <td>@lang('public.city')</td>
                        <td>{{ $orderDetails['city'] }}</td>
                    </tr>
                    <tr>
                        <td>@lang('public.state')</td>
                        <td>{{ $orderDetails['state'] }}</td>
                    </tr>
                    <tr>
                        <td>@lang('public.country')</td>
                        <td>{{ $orderDetails['country'] }}</td>
                    </tr>
                    <tr>
                        <td>@lang('public.pincode')</td>
                        <td>{{ $orderDetails['pincode'] }}</td>
                    </tr>
                    <tr>
                        <td>@lang('public.mobile')</td>
                        <td>{{ $orderDetails['mobile'] }}</td>
                    </tr>
                </table>

            </div>
        </div>
    </div>
    <!-- Cart-Page /- -->
@endsection
