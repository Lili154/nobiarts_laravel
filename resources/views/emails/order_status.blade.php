{{-- This is the order "Update Order Status" by 'admin' email file using Mailtrap --}} {{-- All the variables (like $name, $mobile, $email, ...) used here are passed in from the updateOrderStatus() method in Admin/OrderController.php --}}



<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <table style="width: 700px">
            <tr><td>&nbsp;</td></tr>
            <tr><td><img src="{{ asset('front/images/main-logo/main-logo.png') }}"></td></tr>
            <tr><td>&nbsp;</td></tr>
            <tr><td>@lang('public.hello') {{ $name }}</td></tr>
            <tr><td>&nbsp;<br></td></tr>
            <tr><td>@lang('public.your order') #{{ $order_id }} @lang('public.status has been updated to') {{ $order_status }}</td></tr>
            <tr><td>&nbsp;</td></tr>


            @if (!empty($courier_name) && !empty($tracking_number))
                <tr>
                    <td>@lang('public.courier name is') {{ $courier_name }} @lang('public.and Tracking Number is') {{ $tracking_number }}</td>
                </tr>
                <tr><td>&nbsp;</td></tr>
            @endif

            <tr><td>@lang('public.Your Order details are as below:')</td></tr>
            <tr><td>&nbsp;</td></tr>
            <tr><td>
                <table style="width: 95%" cellpadding="5" cellspacing="5" bgcolor="#f7f4f4">
                    <tr bgcolor="#cccccc">
                        <td>@lang('public.product name')</td>
                        <td>@lang('public.product code')</td>
                        <td>@lang('public.product size')</td>
                        <td>@lang('public.product color')</td>
                        <td>@lang('public.product quantity')</td>
                        <td>@lang('public.product price')</td>
                    </tr>
                    @foreach ($orderDetails['orders_products'] as $order)
                        <tr bgcolor="#f9f9f9">
                            <td>{{ $order['product_name'] }}</td>
                            <td>{{ $order['product_code'] }}</td>
                            <td>{{ $order['product_size'] }}</td>
                            <td>{{ $order['product_color'] }}</td>
                            <td>{{ $order['product_qty'] }}</td>
                            <td>{{ $order['product_price'] }}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="5" align="right">@lang('public.shipping charges')</td>
                        <td>INR {{ $orderDetails['shipping_charges'] }}</td>
                    </tr>
                    <tr>
                        <td colspan="5" align="right">@lang('public.coupon discount')</td>
                        <td>
                            INR
                            @if ($orderDetails['coupon_amount'] > 0)
                                {{ $orderDetails['coupon_amount'] }}
                            @else
                                0
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td colspan="5" align="right">@lang('public.grand total')</td>
                        <td>INR {{ $orderDetails['grand_total'] }}</td>
                    </tr>
                </table>
            </td></tr>
            <tr><td>&nbsp;</td></tr>
            <tr><td>
                <table>
                    <tr>
                        <td><strong>@lang('public.delivery address'):</strong></td>
                    </tr>
                    <tr>
                        <td>{{ $orderDetails['name'] }}</td>
                    </tr>
                    <tr>
                        <td>{{ $orderDetails['address'] }}</td>
                    </tr>
                    <tr>
                        <td>{{ $orderDetails['city'] }}</td>
                    </tr>
                    <tr>
                        <td>{{ $orderDetails['state'] }}</td>
                    </tr>
                    <tr>
                        <td>{{ $orderDetails['country'] }}</td>
                    </tr>
                    <tr>
                        <td>{{ $orderDetails['pincode'] }}</td>
                    </tr>
                    <tr>
                        <td>{{ $orderDetails['mobile'] }}</td>
                    </tr>
                </table>
            </td></tr>
            <tr><td>&nbsp;</td></tr>
            <tr><td>@lang('public.for any queries, you can contact us at') <a href="mailto:info@nobiarts.com">info@nobiarts.com</a></td></tr>
            <tr><td>&nbsp;</td></tr>
            <tr><td>@lang('public.regards,')<br>@lang('public.team') Nobiarts</td></tr>
            <tr><td>&nbsp;</td></tr>
        </table>
    </body>
</html>
