{{-- This is the vendor confirmation/registration Success Mail file using Mailtrap --}} {{-- All the variables (like $name, $mobile, $email, ...) used here are passed in from the vendorRegister() method in Front/VendorController.php --}}


<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <tr><td>@lang('public.dear') {{ $name }}!</td></tr>
        <tr><td>&nbsp;<br></td></tr>
        <tr><td>@lang('public.Your Vendor Email is confirmed. Please login and add your personal, business and bank details so that your account will get approved.')</td></tr>
        <tr><td>&nbsp;</td></tr>
        <tr><td>@lang("public.Your Vendor Account Details are as below :")<br></td></tr>
        <tr><td>&nbsp;</td></tr>
        <tr><td>@lang('public.name'): {{ $name }}</td></tr>
        <tr><td>&nbsp;</td></tr>
        <tr><td>@lang('public.mobile'): {{ $mobile }}</td></tr>
        <tr><td>&nbsp;</td></tr>
        <tr><td>@lang('public.email'): {{ $email }}</td></tr>
        <tr><td>&nbsp;</td></tr>
        <tr><td>@lang('public.password') ***** @lang('public.(as chosen by you)')</td></tr>
        <tr><td>&nbsp;</td></tr>
        <tr><td>@lang('public.Thanks & Regards,')</td></tr>
        <tr><td>&nbsp;</td></tr>
        <tr><td>Nobiarts</td></tr>
    </body>
</html>
