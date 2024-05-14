{{-- This is the vendor Approval Success Mail file using Mailtrap --}} {{-- All the variables (like $name, $mobile, $email, ...) used here are passed in from the updateAdminStatus() method in Admin/AdminController.php --}}


<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <tr><td>@lang('public.dear') {{ $name }}!</td></tr>
        <tr><td>&nbsp;<br><br></td></tr>
        <tr><td>@lang('public.Your Vendor Account has been approved. Now you can login and add products.')</td></tr>
        <tr><td>&nbsp;<br><br></td></tr>
        <tr><td>@lang('public.your Vendor Account Details are as below :')<br></td></tr>
        <tr><td>&nbsp;<br></td></tr>
        <tr><td>@lang('public.name'): {{ $name }}</td></tr>
        <tr><td>&nbsp;<br></td></tr>
        <tr><td>@lang('public.mobile'): {{ $mobile }}</td></tr>
        <tr><td>&nbsp;<br></td></tr>
        <tr><td>@lang('public.email'): {{ $email }}</td></tr>
        <tr><td>&nbsp;<br></td></tr>
        <tr><td>@lang('public.password') ***** @lang('public.(as chosen by you)')</td></tr>
        <tr><td>&nbsp;<br><br></td></tr>
        <tr><td>@lang('public.Thanks & Regards,')</td></tr>
        <tr><td>&nbsp;<br></td></tr>
        <tr><td>Nobiarts</td></tr>
    </body>
</html>
