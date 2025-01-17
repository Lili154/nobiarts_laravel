<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\CurrencyController;
use App\Http\Controllers\TermsController;





/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

require __DIR__.'/auth.php';

Route::get('/terms-and-conditions', [TermsController::class,'show'])->name('terms');
Route::get('/offer', [TermsController::class,'offer'])->name('offer');


Route::match(['get', 'post'], '/change-currency', [CurrencyController::class, 'changeCurrency'])
->name('changeCurrency')->middleware('SetCurrency');
Route::get('/get-converted-prices', [CurrencyController::class,'getConvertedPrices'])->name('getConvertedPrices')->middleware('SetCurrency');




Route::prefix('/admin')->namespace('App\Http\Controllers\Admin')->group(function() {
    Route::match(['get', 'post'], 'login', 'AdminController@login');
    Route::group(['middleware' => ['admin']], function() { // using our 'admin' guard (which we created in auth.php)
        Route::get('dashboard', 'AdminController@dashboard'); // Admin login
        Route::get('logout', 'AdminController@logout'); // Admin logout
        Route::match(['get', 'post'], 'update-admin-password', 'AdminController@updateAdminPassword'); // GET request to view the update password <form>, and a POST request to submit the update password <form>
        Route::post('check-admin-password', 'AdminController@checkAdminPassword'); // Check Admin Password // This route is called from the AJAX call in admin/js/custom.js page
        Route::match(['get', 'post'], 'update-admin-details', 'AdminController@updateAdminDetails');
        Route::match(['get', 'post'], 'update-vendor-details/{slug}', 'AdminController@updateVendorDetails');
        Route::post('update-vendor-commission', 'AdminController@updateVendorCommission');

        Route::get('admins/{type?}', 'AdminController@admins');
        Route::get('view-vendor-details/{id}', 'AdminController@viewVendorDetails');
        Route::post('update-admin-status', 'AdminController@updateAdminStatus');


        Route::get('sections', 'SectionController@sections');
        Route::post('update-section-status', 'SectionController@updateSectionStatus');
        Route::get('delete-section/{id}', 'SectionController@deleteSection');
        Route::match(['get', 'post'], 'add-edit-section/{id?}', 'SectionController@addEditSection');

        // Categories
        Route::get('categories', 'CategoryController@categories'); // Categories in Catalogue Management in Admin Panel
        Route::post('update-category-status', 'CategoryController@updateCategoryStatus'); // Update Categories Status using AJAX in categories.blade.php
        Route::match(['get', 'post'], 'add-edit-category/{id?}', 'CategoryController@addEditCategory'); // the slug {id?} is an Optional Parameter, so if it's passed, this means Edit/Update the Category, and if not passed, this means Add a Category
        Route::get('append-categories-level', 'CategoryController@appendCategoryLevel'); // Show Categories <select> <option> depending on the chosen Section (show the relevant categories of the chosen section) using AJAX in admin/js/custom.js in append_categories_level.blade.php page
        Route::get('delete-category/{id}', 'CategoryController@deleteCategory'); // Delete a category in categories.blade.php
        Route::get('delete-category-image/{id}', 'CategoryController@deleteCategoryImage'); // Delete a category image in add_edit_category.blade.php from BOTH SERVER (FILESYSTEM) & DATABASE

        // Brands
        Route::get('brands', 'BrandController@brands');
        Route::post('update-brand-status', 'BrandController@updateBrandStatus'); // Update Brands Status using AJAX in brands.blade.php
        Route::get('delete-brand/{id}', 'BrandController@deleteBrand'); // Delete a brand in brands.blade.php
        Route::match(['get', 'post'], 'add-edit-brand/{id?}', 'BrandController@addEditBrand'); // the slug {id?} is an Optional Parameter, so if it's passed, this means Edit/Update the brand, and if not passed, this means Add a Brand

        // Products
        Route::get('products', 'ProductsController@products'); // render products.blade.php in the Admin Panel
        Route::post('update-product-status', 'ProductsController@updateProductStatus'); // Update Products Status using AJAX in products.blade.php
        Route::get('delete-product/{id}', 'ProductsController@deleteProduct'); // Delete a product in products.blade.php
        Route::match(['get', 'post'], 'add-edit-product/{id?}', 'ProductsController@addEditProduct'); // the slug (Route Parameter) {id?} is an Optional Parameter, so if it's passed, this means 'Edit/Update the Product', and if not passed, this means' Add a Product'    // GET request to render the add_edit_product.blade.php view, and POST request to submit the <form> in that view
        Route::get('delete-product-image/{id}', 'ProductsController@deleteProductImage'); // Delete a product images (in the three folders: small, medium and large) in add_edit_product.blade.php page from BOTH SERVER (FILESYSTEM) & DATABASE
        Route::get('delete-product-video/{id}', 'ProductsController@deleteProductVideo'); // Delete a product video in add_edit_product.blade.php page from BOTH SERVER (FILESYSTEM) & DATABASE

        // Attributes
        Route::match(['get', 'post'], 'add-edit-attributes/{id}', 'ProductsController@addAttributes'); // GET request to render the add_edit_attributes.blade.php view, and POST request to submit the <form> in that view
        Route::post('update-attribute-status', 'ProductsController@updateAttributeStatus'); // Update Attributes Status using AJAX in add_edit_attributes.blade.php
        Route::get('delete-attribute/{id}', 'ProductsController@deleteAttribute'); // Delete an attribute in add_edit_attributes.blade.php
        Route::match(['get', 'post'], 'edit-attributes/{id}', 'ProductsController@editAttributes'); // in add_edit_attributes.blade.php

        // Images
        Route::match(['get', 'post'], 'add-images/{id}', 'ProductsController@addImages'); // GET request to render the add_edit_attributes.blade.php view, and POST request to submit the <form> in that view
        Route::post('update-image-status', 'ProductsController@updateImageStatus'); // Update Images Status using AJAX in add_images.blade.php
        Route::get('delete-image/{id}', 'ProductsController@deleteImage'); // Delete an image in add_images.blade.php

        // Banners
        Route::get('banners', 'BannersController@banners');
        Route::post('update-banner-status', 'BannersController@updateBannerStatus'); // Update Categories Status using AJAX in banners.blade.php
        Route::get('delete-banner/{id}', 'BannersController@deleteBanner'); // Delete a banner in banners.blade.php
        Route::match(['get', 'post'], 'add-edit-banner/{id?}', 'BannersController@addEditBanner'); // the slug (Route Parameter) {id?} is an Optional Parameter, so if it's passed, this means 'Edit/Update the Banner', and if not passed, this means' Add a Banner'    // GET request to render the add_edit_banner.blade.php view, and POST request to submit the <form> in that view

        // Filters
        Route::get('filters', 'FilterController@filters'); // Render filters.blade.php page
        Route::post('update-filter-status', 'FilterController@updateFilterStatus'); // Update Filter Status using AJAX in filters.blade.php
        Route::post('update-filter-value-status', 'FilterController@updateFilterValueStatus'); // Update Filter Value Status using AJAX in filters_values.blade.php
        Route::get('filters-values', 'FilterController@filtersValues'); // Render filters_values.blade.php page
        Route::match(['get', 'post'], 'add-edit-filter/{id?}', 'FilterController@addEditFilter'); // the slug (Route Parameter) {id?} is an Optional Parameter, so if it's passed, this means 'Edit/Update the filter', and if not passed, this means' Add a filter'    // GET request to render the add_edit_filter.blade.php view, and POST request to submit the <form> in that view
        Route::match(['get', 'post'], 'add-edit-filter-value/{id?}', 'FilterController@addEditFilterValue'); // the slug (Route Parameter) {id?} is an Optional Parameter, so if it's passed, this means 'Edit/Update the Filter Value', and if not passed, this means' Add a Filter Value'    // GET request to render the add_edit_filter_value.blade.php view, and POST request to submit the <form> in that view
        Route::post('category-filters', 'FilterController@categoryFilters'); // Show the related filters depending on the selected category <select> in category_filters.blade.php (which in turn is included by add_edit_product.php) using AJAX. Check admin/js/custom.js

        // Coupons
        Route::get('coupons', 'CouponsController@coupons'); // Render admin/coupons/coupons.blade.php page in the Admin Panel
        Route::post('update-coupon-status', 'CouponsController@updateCouponStatus'); // Update Coupon Status (active/inactive) via AJAX in admin/coupons/coupons.blade.php, check admin/js/custom.js
        Route::get('delete-coupon/{id}', 'CouponsController@deleteCoupon'); // Delete a Coupon via AJAX in admin/coupons/coupons.blade.php, check admin/js/custom.js

        // Render admin/coupons/add_edit_coupon.blade.php page with 'GET' request ('Edit/Update the Coupon') if the {id?} Optional Parameter is passed, or if it's not passed, it's a GET request too to 'Add a Coupon', or it's a POST request for the HTML Form submission in the same page
        Route::match(['get', 'post'], 'add-edit-coupon/{id?}', 'CouponsController@addEditCoupon'); // the slug (Route Parameter) {id?} is an Optional Parameter, so if it's passed, this means 'Edit/Update the Coupon', and if not passed, this means' Add a Coupon'    // GET request to render the add_edit_coupon.blade.php view (whether Add or Edit depending on passing or not passing the Optional Parameter {id?}), and POST request to submit the <form> in that same page

        // Users
        Route::get('users', 'UserController@users'); // Render admin/users/users.blade.php page in the Admin Panel
        Route::post('update-user-status', 'UserController@updateUserStatus'); // Update User Status (active/inactive) via AJAX in admin/users/users.blade.php, check admin/js/custom.js

        // Orders
        // Render admin/orders/orders.blade.php page (Orders Management section) in the Admin Panel
        Route::get('orders', 'OrderController@orders');

        // Render admin/orders/order_details.blade.php (View Order Details page) when clicking on the View Order Details icon in admin/orders/orders.blade.php (Orders tab under Orders Management section in Admin Panel)
        Route::get('orders/{id}', 'OrderController@orderDetails');

        // Update Order Status (which is determined by 'admin'-s ONLY, not 'vendor'-s, in contrast to "Update Item Status" which can be updated by both 'vendor'-s and 'admin'-s) (Pending, Shipped, In Progress, Canceled, ...) in admin/orders/order_details.blade.php in Admin Panel
        // Note: The `order_statuses` table contains all kinds of order statuses (that can be updated by 'admin'-s ONLY in `orders` table) like: pending, in progress, shipped, canceled, ...etc. In `order_statuses` table, the `name` column can be: 'New', 'Pending', 'Canceled', 'In Progress', 'Shipped', 'Partially Shipped', 'Delivered', 'Partially Delivered' and 'Paid'. 'Partially Shipped': If one order has products from different vendors, and one vendor has shipped their product to the customer while other vendor (or vendors) didn't!. 'Partially Delivered': if one order has products from different vendors, and one vendor has shipped and DELIVERED their product to the customer while other vendor (or vendors) didn't!    // The `order_item_statuses` table contains all kinds of order statuses (that can be updated by both 'vendor'-s and 'admin'-s in `orders_products` table) like: pending, in progress, shipped, canceled, ...etc.
        Route::post('update-order-status', 'OrderController@updateOrderStatus');

        // Update Item Status (which can be determined by both 'vendor'-s and 'admin'-s, in contrast to "Update Order Status" which is updated by 'admin'-s ONLY, not 'vendor'-s) (Pending, In Progress, Shipped, Delivered, ...) in admin/orders/order_details.blade.php in Admin Panel
        // Note: The `order_statuses` table contains all kinds of order statuses (that can be updated by 'admin'-s ONLY in `orders` table) like: pending, in progress, shipped, canceled, ...etc. In `order_statuses` table, the `name` column can be: 'New', 'Pending', 'Canceled', 'In Progress', 'Shipped', 'Partially Shipped', 'Delivered', 'Partially Delivered' and 'Paid'. 'Partially Shipped': If one order has products from different vendors, and one vendor has shipped their product to the customer while other vendor (or vendors) didn't!. 'Partially Delivered': if one order has products from different vendors, and one vendor has shipped and DELIVERED their product to the customer while other vendor (or vendors) didn't!    // The `order_item_statuses` table contains all kinds of order statuses (that can be updated by both 'vendor'-s and 'admin'-s in `orders_products` table) like: pending, in progress, shipped, canceled, ...etc.
        Route::post('update-order-item-status', 'OrderController@updateOrderItemStatus');

        // Orders Invoices
        // Render order invoice page (HTML) in order_invoice.blade.php
        Route::get('orders/invoice/{id}', 'OrderController@viewOrderInvoice');

        // Render order PDF invoice in order_invoice.blade.php using Dompdf Package
        Route::get('orders/invoice/pdf/{id}', 'OrderController@viewPDFInvoice');

        // Shipping Charges module
        // Render the Shipping Charges page (admin/shipping/shipping_charges.blade.php) in the Admin Panel for 'admin'-s only, not for vendors
        Route::get('shipping-charges', 'ShippingController@shippingCharges');

        // Update Shipping Status (active/inactive) via AJAX in admin/shipping/shipping_charages.blade.php, check admin/js/custom.js
        Route::post('update-shipping-status', 'ShippingController@updateShippingStatus');

        // Render admin/shipping/edit_shipping_charges.blade.php page in case of HTTP 'GET' request ('Edit/Update Shipping Charges'), or hadle the HTML Form submission in the same page in case of HTTP 'POST' request
        Route::match(['get', 'post'], 'edit-shipping-charges/{id}', 'ShippingController@editShippingCharges');



        // Newsletter Subscribers module
        // Render admin/subscribers/subscribers.blade.php page (Show all Newsletter subscribers in the Admin Panel)
        Route::get('subscribers', 'NewsletterController@subscribers');

        // Update Subscriber Status (active/inactive) via AJAX in admin/subscribers/subscribers.blade.php, check admin/js/custom.js
        Route::post('update-subscriber-status', 'NewsletterController@updateSubscriberStatus');

        // Delete a Subscriber via AJAX in admin/subscribers/subscribers.blade.php, check admin/js/custom.js
        Route::get('delete-subscriber/{id}', 'NewsletterController@deleteSubscriber');



        // Export subscribers (`newsletter_subscribers` database table) as an Excel file using Maatwebsite/Laravel Excel Package in admin/subscribers/subscribers.blade.php
        Route::get('export-subscribers', 'NewsletterController@exportSubscribers');

        // User Ratings & Reviews
        // Render admin/ratings/ratings.blade.php page in the Admin Panel
        Route::get('ratings', 'RatingController@ratings');

        // Update Rating Status (active/inactive) via AJAX in admin/ratings/ratings.blade.php, check admin/js/custom.js
        Route::post('update-rating-status', 'RatingController@updateRatingStatus');

        // Delete a Rating via AJAX in admin/ratings/ratings.blade.php, check admin/js/custom.js
        Route::get('delete-rating/{id}', 'RatingController@deleteRating');
    });

});






// User download order PDF invoice (We'll use the same viewPDFInvoice() function (but with different routes/URLs!) to render the PDF invoice for 'admin'-s in the Admin Panel and for the user to download it!) (we created this route outside outside the Admin Panel routes so that the user could use it!)
Route::get('orders/invoice/download/{id}', 'App\Http\Controllers\Admin\OrderController@viewPDFInvoice');




// Route::match(['get', 'post'], '/change-currency', [CurrencyController::class, 'changeCurrency'])->name('changeCurrency')->middleware('ChangeCurrency');
// Route::get('/get-converted-prices', [CurrencyController::class,'getConvertedPrices'])->name('getConvertedPrices')->middleware('ChangeCurrency');

Route::get('locale/{lang}', 'App\Http\Controllers\LocalizationController@setLang');


// Second: FRONT section routes:
Route::namespace('App\Http\Controllers\Front')->group(function() {
    Route::get('/', 'IndexController@index');



    $catUrls = \App\Models\Category::select('url')->where('status', 1)->get()->pluck('url')->toArray();
    foreach ($catUrls as $key => $url) {

        Route::match(['get', 'post'], '/' . $url, 'ProductsController@listing');
    }


    // Vendor Login/Register
    Route::get('vendor/login-register', 'VendorController@loginRegister');

    // Vendor Register
    Route::post('vendor/register', 'VendorController@vendorRegister');

    // Confirm Vendor Account (from 'vendor_confirmation.blade.php) from the mail by Mailtrap
    Route::get('vendor/confirm/{code}', 'VendorController@confirmVendor');
    Route::get('/product/{id}', 'ProductsController@detail');


    Route::post('get-product-price', 'ProductsController@getProductPrice');

    // Show all Vendor products in front/products/vendor_listing.blade.php    // This route is accessed from the <a> HTML element in front/products/vendor_listing.blade.php
    Route::get('/products/{vendorid}', 'ProductsController@vendorListing');

    // Add to Cart <form> submission in front/products/detail.blade.php
    Route::post('cart/add', 'ProductsController@cartAdd');

    // Render Cart page (front/products/cart.blade.php)    // this route is accessed from the <a> HTML tag inside the flash message inside cartAdd() method in Front/ProductsController.php (inside front/products/detail.blade.php)
    Route::get('cart', 'ProductsController@cart')->name('cart');

    // Update Cart Item Quantity AJAX call in front/products/cart_items.blade.php. Check front/js/custom.js
    Route::post('cart/update', 'ProductsController@cartUpdate');

    // Delete a Cart Item AJAX call in front/products/cart_items.blade.php. Check front/js/custom.js
    Route::post('cart/delete', 'ProductsController@cartDelete');



    // Render User Login/Register page (front/users/login_register.blade.php)
    Route::get('user/login-register', ['as' => 'login', 'uses' => 'UserController@loginRegister']); // 'as' => 'login'    is Giving this route a name 'login' route in order for the 'auth' middleware ('auth' middleware is the Authenticate.php) to redirect to the right page

    // User Registration (in front/users/login_register.blade.php) <form> submission using an AJAX request. Check front/js/custom.js
    Route::post('user/register', 'UserController@userRegister');

    // User Login (in front/users/login_register.blade.php) <form> submission using an AJAX request. Check front/js/custom.js
    Route::post('user/login', 'UserController@userLogin');

    // User logout (This route is accessed from Logout tab in the drop-down menu in the header (in front/layout/header.blade.php))
    Route::get('user/logout', 'UserController@userLogout');

    // User Forgot Password Functionality (this route is accessed from the <a> tag in front/users/login_register.blade.php through a 'GET' request, and through a 'POST' request when the HTML Form is submitted in front/users/forgot_password.blade.php)
    Route::match(['get', 'post'], 'user/forgot-password', 'UserController@forgotPassword'); // We used match() method to use get() to render the front/users/forgot_password.blade.php page, and post() when the HTML Form in the same page is submitted    // The POST request is from an AJAX request. Check front/js/custom.js

    // User account Confirmation E-mail which contains the 'Activation Link' to activate the user account (in resources/views/emails/confirmation.blade.php, using Mailtrap)
    Route::get('user/confirm/{code}', 'UserController@confirmAccount'); // {code} is the base64 encoded user's 'Activation Code' sent to the user in the Confirmation E-mail with which they have registered, which is received as a Route Parameters/URL Paramters in the 'Activation Link'    // this route is requested (accessed/opened) from inside the mail sent to user (in resources/views/emails/confirmation.blade.php)

    // Website Search Form (to search for all website products). Check the HTML Form in front/layout/header.blade.php
    Route::get('search-products', 'ProductsController@listing');

    // PIN code Availability Check: check if the PIN code of the user's Delivery Address exists in our database (in both `cod_pincodes` and `prepaid_pincodes`) or not in front/products/detail.blade.php via AJAX. Check front/js/custom.js
    Route::post('check-pincode', 'ProductsController@checkPincode');

    // Render the Contact Us page (front/pages/contact.blade.php) using GET HTTP Requests, or the HTML Form Submission using POST HTTP Requests
    Route::match(['get', 'post'], 'contact', 'CmsController@contact');

    // Add a Newsletter Subscriber email HTML Form Submission in front/layout/footer.blade.php when clicking on the Submit button (using an AJAX Request/Call)
    Route::post('add-subscriber-email', 'NewsletterController@addSubscriber');

    // Add Rating & Review on a product in front/products/detail.blade.php
    Route::post('add-rating', 'RatingController@addRating');




    // Protecting the routes of user (user must be authenticated/logged in) (to prevent access to these links while being unauthenticated/not being logged in (logged out))
    Route::group(['middleware' => ['auth']], function() {
        // Render User Account page with 'GET' request (front/users/user_account.blade.php), or the HTML Form submission in the same page with 'POST' request using AJAX (to update user details). Check front/js/custom.js
        Route::match(['GET', 'POST'], 'user/account', 'UserController@userAccount');

        // User Account Update Password HTML Form submission via AJAX. Check front/js/custom.js
        Route::post('user/update-password', 'UserController@userUpdatePassword');

        // Coupon Code redemption (Apply coupon) / Coupon Code HTML Form submission via AJAX in front/products/cart_items.blade.php, check front/js/custom.js
        Route::post('/apply-coupon', 'ProductsController@applyCoupon'); // Important Note: We added this route here as a protected route inside the 'auth' middleware group because ONLY logged in/authenticated users are allowed to redeem Coupons!

        // Checkout page (using match() method for the 'GET' request for rendering the front/products/checkout.blade.php page or the 'POST' request for the HTML Form submission in the same page (for submitting the user's Delivery Address and Payment Method))
        Route::match(['GET', 'POST'], '/checkout', 'ProductsController@checkout');

        // Edit Delivery Addresses (Page refresh and fill in the <input> fields with the authenticated/logged in user Delivery Addresses from the `delivery_addresses` database table when clicking on the Edit button) in front/products/delivery_addresses.blade.php (which is 'include'-ed in front/products/checkout.blade.php) via AJAX, check front/js/custom.js
        Route::post('get-delivery-address', 'AddressController@getDeliveryAddress');

        // Save Delivery Addresses via AJAX (save the delivery addresses of the authenticated/logged-in user in `delivery_addresses` database table when submitting the HTML Form) in front/products/delivery_addresses.blade.php (which is 'include'-ed in front/products/checkout.blade.php) via AJAX, check front/js/custom.js
        Route::post('save-delivery-address', 'AddressController@saveDeliveryAddress');

        // Remove Delivery Addresse via AJAX (Page refresh and fill in the <input> fields with the authenticated/logged-in user Delivery Addresses details from the `delivery_addresses` database table when clicking on the Remove button) in front/products/delivery_addresses.blade.php (which is 'include'-ed in front/products/checkout.blade.php) via AJAX, check front/js/custom.js
        Route::post('remove-delivery-address', 'AddressController@removeDeliveryAddress');

        // Rendering Thanks page (after placing an order)
        Route::get('thanks', 'ProductsController@thanks');

        // Render User 'My Orders' page
        Route::get('user/orders/{id?}', 'OrderController@orders'); // If the slug {id?} (Optional Parameters) is passed in, this means go to the front/orders/order_details.blade.php page, and if not, this means go to the front/orders/orders.blade.php page



        // PayPal routes:
        // PayPal payment gateway integration in Laravel (this route is accessed from checkout() method in Front/ProductsController.php). Rendering front/paypal/paypal.blade.php page
        Route::get('paypal', 'PaypalController@paypal');

        // Make a PayPal payment
        Route::post('pay', 'PaypalController@pay')->name('payment');

        // PayPal successful payment
        Route::get('success', 'PaypalController@success');

        // PayPal failed payment
        Route::get('error', 'PaypalController@error');



        // iyzipay (iyzico) routes:    // iyzico Payment Gateway integration in/with Laravel
        // iyzico payment gateway integration in Laravel (this route is accessed from checkout() method in Front/ProductsController.php). Rendering front/iyzipay/iyzipay.blade.php page
        Route::get('iyzipay', 'IyzipayController@iyzipay');

        // Make an iyzipay payment (redirect the user to iyzico payment gateway with the order details)
        Route::get('iyzipay/pay', 'IyzipayController@pay');
    });

});
