{{-- This file is 'include'-ed in front/layout/header.php. We separated the Mini Cart widget and cut it from front/layout/header.blade.php to here --}}


<!-- Mini Cart -->
<div class="mini-cart-wrapper">
    <div class="mini-cart">
        <div class="mini-cart-header">
@lang('public.your cart')            <button type="button" class="button ion ion-md-close" id="mini-cart-close"></button>
        </div>
        <ul class="mini-cart-list">



            @php $total_price = 0 @endphp

            @php
                $getCartItems = getCartItems();
            @endphp

            @foreach ($getCartItems as $item)
                @php
                    $getDiscountAttributePrice = \App\Models\Product::getDiscountAttributePrice($item['product_id'], $item['size']);
                @endphp
                <li class="clearfix">
                    <a href="{{ url('product/' . $item['product_id']) }}">
                    <img src="{{ asset('front/images/product_images/small/' . $item['product']['product_image']) }}" alt="Product">
                    <span class="mini-item-name">{{ $item['product']['product_name'] }}</span>
                    <span class="mini-item-price">{{ session("currency") }}{{ $getDiscountAttributePrice['final_price'] }}</span>
                    <span class="mini-item-quantity"> x {{ $item['quantity'] }} </span>
                    </a>
                </li>

                @php $total_price = $total_price + ($getDiscountAttributePrice['final_price'] * $item['quantity']) @endphp
            @endforeach



        </ul>
        <div class="mini-shop-total clearfix">
            <span class="mini-total-heading float-left">@lang('public.total:')</span>
            <span class="mini-total-price float-right">{{ session("currency") }}{{ $total_price }}</span>
        </div>
        <div class="mini-action-anchors">
            <a href="{{ url('cart') }}"     class="cart-anchor">@lang('public.view cart')</a>
            <a href="{{ url('checkout') }}" class="checkout-anchor">@lang('public.checkout')</a>
        </div>
    </div>
</div>
<!-- Mini Cart /- -->



{{-- Solution of the problem where the X icon of the Mini Cart Widget doesn't work (doesn'tthe Cart or Deleting items from it (meaning, AFTER MAKING AJAX CALLS). This happens after using AJAX while updating or close the widget) after Updating  deleting cart items because the Mini Cart Widget page gets loaded again and return-ed via AJAX but return-ed without its JavaScript! --}}
{{-- <script>
    $('#mini-cart-close').on('click', function () {
        $('.mini-cart-wrapper').removeClass('mini-cart-open');
    });
</script> --}}
