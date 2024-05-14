{{-- Correcting issues in the Skydash Admin Panel Sidebar using Session --}}


<!-- partial:partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a @if (Session::get('page') == 'dashboard') style="background: #792D89 !important; color: #FFF !important" @endif class="nav-link" href="{{ url('admin/dashboard') }}">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">@lang('public.dashboard')</span>
            </a>
        </li>




        @if (Auth::guard('admin')->user()->type == 'vendor')
            <li class="nav-item">
                <a @if (Session::get('page') == 'update_personal_details' || Session::get('page') == 'update_business_details' || Session::get('page') == 'update_bank_details') style="background: #792D89 !important; color: #FFF !important" @endif class="nav-link" data-toggle="collapse" href="#ui-vendors" aria-expanded="false" aria-controls="ui-vendors">
                    <i class="icon-layout menu-icon"></i>
                    <span class="menu-title">@lang('public.vendor details')</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="ui-vendors">
                    <ul class="nav flex-column sub-menu" style="background: #fff !important; color: #792D89 !important">
                        <li class="nav-item"> <a @if (Session::get('page') == 'update_personal_details') style="background: #792D89 !important; color: #FFF !important" @else style="background: #fff !important; color: #792D89 !important" @endif class="nav-link" href="{{ url('admin/update-vendor-details/personal') }}">Personal Details</a></li>
                        <li class="nav-item"> <a @if (Session::get('page') == 'update_business_details') style="background: #792D89 !important; color: #FFF !important" @else style="background: #fff !important; color: #792D89 !important" @endif class="nav-link" href="{{ url('admin/update-vendor-details/business') }}">@lang('public.business details')</a></li>
                        <li class="nav-item"> <a @if (Session::get('page') == 'update_bank_details')     style="background: #792D89 !important; color: #FFF !important" @else style="background: #fff !important; color: #792D89 !important" @endif class="nav-link" href="{{ url('admin/update-vendor-details/bank') }}">@lang('public.bank details')</a></li>
                    </ul>
                </div>
            </li>


            <li class="nav-item">
                <a @if (Session::get('page') == 'sections' || Session::get('page') == 'categories' || Session::get('page') == 'products' || Session::get('page') == 'brands' || Session::get('page') == 'filters' || Session::get('page') == 'coupons') style="background: #792D89 !important; color: #FFF !important" @endif class="nav-link" data-toggle="collapse" href="#ui-catalogue" aria-expanded="false" aria-controls="ui-catalogue">
                    <i class="icon-layout menu-icon"></i>
                    <span class="menu-title">@lang('public.catalogue management')</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="ui-catalogue">
                    <ul class="nav flex-column sub-menu" style="background: #fff !important; color: #792D89 !important">
                        <li class="nav-item"> <a @if (Session::get('page') == 'products')   style="background: #792D89 !important; color: #FFF !important" @else style="background: #fff !important; color: #792D89 !important" @endif class="nav-link" href="{{ url('admin/products') }}">@lang('public.products')</a></li>
                        <li class="nav-item"> <a @if (Session::get('page') == 'coupons')    style="background: #792D89 !important; color: #FFF !important" @else style="background: #fff !important; color: #792D89 !important" @endif class="nav-link" href="{{ url('admin/coupons') }}">@lang('public.coupons')</a></li>
                    </ul>
                </div>
            </li>


            <li class="nav-item">
                <a @if (Session::get('page') == 'orders') style="background: #792D89 !important; color: #FFF !important" @endif class="nav-link" data-toggle="collapse" href="#ui-orders" aria-expanded="false" aria-controls="ui-orders">
                    <i class="icon-layout menu-icon"></i>
                    <span class="menu-title">@lang('public.orders management')</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="ui-orders">
                    <ul class="nav flex-column sub-menu" style="background: #fff !important; color: #792D89 !important">
                        <li class="nav-item"> <a @if (Session::get('page') == 'orders')   style="background: #792D89 !important; color: #FFF !important" @else style="background: #fff !important; color: #792D89 !important" @endif class="nav-link" href="{{ url('admin/orders') }}">@lang('public.orders')</a></li>
                    </ul>
                </div>
            </li>

        @else
            <li class="nav-item">
                <a @if (Session::get('page') == 'update_admin_password' || Session::get('page') == 'update_admin_details') style="background: #792D89 !important; color: #FFF !important" @endif class="nav-link" data-toggle="collapse" href="#ui-settings" aria-expanded="false" aria-controls="ui-settings">
                    <i class="icon-layout menu-icon"></i>
                    <span class="menu-title">@lang('public.settings')</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="ui-settings">
                    <ul class="nav flex-column sub-menu" style="background: #fff !important; color: #792D89 !important">
                        <li class="nav-item"> <a @if (Session::get('page') == 'update_admin_password') style="background: #792D89 !important; color: #FFF !important" @else style="background: #fff !important; color: #792D89 !important" @endif class="nav-link" href="{{ url('admin/update-admin-password') }}">@lang('public.update admin password')</a></li>
                        <li class="nav-item"> <a @if (Session::get('page') == 'update_admin_details')  style="background: #792D89 !important; color: #FFF !important" @else style="background: #fff !important; color: #792D89 !important" @endif class="nav-link" href="{{ url('admin/update-admin-details') }}">@lang('public.update admin details')</a></li>
                    </ul>
                </div>
            </li>



            <li class="nav-item">
                <a @if (Session::get('page') == 'view_admins' || Session::get('page') == 'view_subadmins' || Session::get('page') == 'view_vendors' || Session::get('page') == 'view_all') style="background: #792D89 !important; color: #FFF !important" @endif class="nav-link" data-toggle="collapse" href="#ui-admins" aria-expanded="false" aria-controls="ui-admins">
                    <i class="icon-layout menu-icon"></i>
                    <span class="menu-title">@lang('public.admin management')</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="ui-admins">
                    <ul class="nav flex-column sub-menu" style="background: #fff !important; color: #792D89 !important">


                        <li class="nav-item"> <a @if (Session::get('page') == 'view_admins')    style="background: #792D89 !important; color: #FFF !important" @else style="background: #fff !important; color: #792D89 !important" @endif class="nav-link" href="{{ url('admin/admins/admin') }}">@lang('public.admins')</a></li>
                        <li class="nav-item"> <a @if (Session::get('page') == 'view_subadmins') style="background: #792D89 !important; color: #FFF !important" @else style="background: #fff !important; color: #792D89 !important" @endif class="nav-link" href="{{ url('admin/admins/subadmin') }}">@lang('public.subadmins')</a></li>
                        <li class="nav-item"> <a @if (Session::get('page') == 'view_vendors')   style="background: #792D89 !important; color: #FFF !important" @else style="background: #fff !important; color: #792D89 !important" @endif class="nav-link" href="{{ url('admin/admins/vendor') }}">@lang('public.vendors')</a></li>
                        <li class="nav-item"> <a @if (Session::get('page') == 'view_all')       style="background: #792D89 !important; color: #FFF !important" @else style="background: #fff !important; color: #792D89 !important" @endif class="nav-link" href="{{ url('admin/admins') }}">@lang('public.all')</a></li>
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a @if (Session::get('page') == 'sections' || Session::get('page') == 'categories' || Session::get('page') == 'products' || Session::get('page') == 'brands' || Session::get('page') == 'filters' || Session::get('page') == 'coupons') style="background: #792D89 !important; color: #FFF !important" @endif class="nav-link" data-toggle="collapse" href="#ui-catalogue" aria-expanded="false" aria-controls="ui-catalogue">
                    <i class="icon-layout menu-icon"></i>
                    <span class="menu-title">@lang('public.catalogue management')</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="ui-catalogue">
                    <ul class="nav flex-column sub-menu" style="background: #fff !important; color: #792D89 !important">
                        <li class="nav-item"> <a @if (Session::get('page') == 'sections')   style="background: #792D89 !important; color: #FFF !important" @else style="background: #fff !important; color: #792D89 !important" @endif class="nav-link" href="{{ url('admin/sections') }}">@lang('public.sections')</a></li>
                        <li class="nav-item"> <a @if (Session::get('page') == 'categories') style="background: #792D89 !important; color: #FFF !important" @else style="background: #fff !important; color: #792D89 !important" @endif class="nav-link" href="{{ url('admin/categories') }}">Categories</a></li>
                        <li class="nav-item"> <a @if (Session::get('page') == 'brands')     style="background: #792D89 !important; color: #FFF !important" @else style="background: #fff !important; color: #792D89 !important" @endif class="nav-link" href="{{ url('admin/brands') }}">@lang('public.brands')</a></li>
                        <li class="nav-item"> <a @if (Session::get('page') == 'products')   style="background: #792D89 !important; color: #FFF !important" @else style="background: #fff !important; color: #792D89 !important" @endif class="nav-link" href="{{ url('admin/products') }}">@lang('public.products')</a></li>
                        <li class="nav-item"> <a @if (Session::get('page') == 'coupons')    style="background: #792D89 !important; color: #FFF !important" @else style="background: #fff !important; color: #792D89 !important" @endif class="nav-link" href="{{ url('admin/coupons') }}">@lang('public.coupons')</a></li>
                        <li class="nav-item"> <a @if (Session::get('page') == 'filters')    style="background: #792D89 !important; color: #FFF !important" @else style="background: #fff !important; color: #792D89 !important" @endif class="nav-link" href="{{ url('admin/filters') }}">@lang('public.filters')</a></li>
                    </ul>
                </div>
            </li>


            <li class="nav-item">
                <a @if (Session::get('page') == 'orders') style="background: #792D89 !important; color: #FFF !important" @endif class="nav-link" data-toggle="collapse" href="#ui-orders" aria-expanded="false" aria-controls="ui-orders">
                    <i class="icon-layout menu-icon"></i>
                    <span class="menu-title">@lang('public.orders management')
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="ui-orders">
                    <ul class="nav flex-column sub-menu" style="background: #fff !important; color: #792D89 !important">
                        <li class="nav-item"> <a @if (Session::get('page') == 'orders')   style="background: #792D89 !important; color: #FFF !important" @else style="background: #fff !important; color: #792D89 !important" @endif class="nav-link" href="{{ url('admin/orders') }}">@lang('public.orders')</a></li>
                    </ul>
                </div>
            </li>


            <li class="nav-item">
                <a @if (Session::get('page') == 'ratings') style="background: #792D89 !important; color: #FFF !important" @endif class="nav-link" data-toggle="collapse" href="#ui-ratings" aria-expanded="false" aria-controls="ui-ratings">
                    <i class="icon-layout menu-icon"></i>
                    <span class="menu-title">@lang('public.ratings management')</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="ui-ratings">
                    <ul class="nav flex-column sub-menu" style="background: #fff !important; color: #792D89 !important">
                        <li class="nav-item"> <a @if (Session::get('page') == 'ratings')   style="background: #792D89 !important; color: #FFF !important" @else style="background: #fff !important; color: #792D89 !important" @endif class="nav-link" href="{{ url('admin/ratings') }}">@lang('public.product ratings & reviews')</a></li>
                    </ul>
                </div>
            </li>



            <li class="nav-item">
                <a @if (Session::get('page') == 'users' || Session::get('page') == 'subscribers') style="background: #792D89 !important; color: #FFF !important" @endif class="nav-link" data-toggle="collapse" href="#ui-users" aria-expanded="false" aria-controls="ui-users">
                    <i class="icon-layout menu-icon"></i>
                    <span class="menu-title">@lang('public.users management')</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="ui-users">
                    <ul class="nav flex-column sub-menu" style="background: #fff !important; color: #792D89 !important">
                        <li class="nav-item"> <a @if (Session::get('page') == 'users')       style="background: #792D89 !important; color: #FFF !important" @else style="background: #fff !important; color: #792D89 !important" @endif class="nav-link" href="{{ url('admin/users') }}">Users</a></li>
                        <li class="nav-item"> <a @if (Session::get('page') == 'subscribers') style="background: #792D89 !important; color: #FFF !important" @else style="background: #fff !important; color: #792D89 !important" @endif class="nav-link" href="{{ url('admin/subscribers') }}">@lang('public.subscribers')</a></li>
                    </ul>
                </div>
            </li>



            <li class="nav-item">
                <a @if (Session::get('page') == 'banners') style="background: #792D89 !important; color: #FFF !important" @endif class="nav-link" data-toggle="collapse" href="#ui-banners" aria-expanded="false" aria-controls="ui-banners">
                    <i class="icon-layout menu-icon"></i>
                    <span class="menu-title">@lang('public.banners management')</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="ui-banners">
                    <ul class="nav flex-column sub-menu" style="background: #fff !important; color: #792D89 !important">
                        <li class="nav-item"> <a @if (Session::get('page') == 'banners') style="background: #792D89 !important; color: #FFF !important" @else style="background: #fff !important; color: #792D89 !important" @endif class="nav-link" href="{{ url('admin/banners') }}">@lang('public.home page banners')</a></li>
                    </ul>
                </div>
            </li>


            <li class="nav-item">
                <a @if (Session::get('page') == 'shipping') style="background: #792D89 !important; color: #FFF !important" @endif class="nav-link" data-toggle="collapse" href="#ui-shipping" aria-expanded="false" aria-controls="ui-shipping">
                    <i class="icon-layout menu-icon"></i>
                    <span class="menu-title">@lang('public.shipping management')</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="ui-shipping">
                    <ul class="nav flex-column sub-menu" style="background: #fff !important; color: #792D89 !important">
                        <li class="nav-item"> <a @if (Session::get('page') == 'shipping') style="background: #792D89 !important; color: #FFF !important" @else style="background: #fff !important; color: #792D89 !important" @endif class="nav-link" href="{{ url('admin/shipping-charges') }}">@lang('public.shipping charges')</a></li>
                    </ul>
                </div>
            </li>

        @endif

    </ul>
</nav>
