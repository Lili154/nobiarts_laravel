{{-- This is the User Welcome E-mail after Registration file using Mailtrap --}} {{-- All the variables (like $name, $mobile, $email, ...) used here are passed in from the userRegister() method in Front/UserController.php --}}



<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>



        <table>
            <tr><td>@lang('public.dear') {{ $name }},</td></tr>
            <tr><td>&nbsp;</td></tr>
            <tr><td>@lang('public.Welcome to Nobiarts. Your account has been successfully created with below information:')</td></tr>
            <tr><td>&nbsp;</td></tr>
            <tr><td>@lang('public.name'): {{ $name }}</td></tr>
            <tr><td>&nbsp;</td></tr>
            <tr><td>@lang('public.mobile'): {{ $mobile }}</td></tr>
            <tr><td>&nbsp;</td></tr>
            <tr><td>@lang('public.email'): {{ $email }}</td></tr>
            <tr><td>&nbsp;</td></tr>
            <tr><td>@lang('public.password'): ****** @lang('(as chosen by you)')</td></tr>
            <tr><td>&nbsp;</td></tr>
            <tr><td>&nbsp;</td></tr>
            <tr><td>@lang('public.Thanks & Regards,')</td></tr>
            <tr><td>Nobiarts</td></tr>
        </table>



    </body>
</html>
