{{-- This is the User Confirmation E-mail after Registration (which contains the 'Activation Link') file using Mailtrap --}} {{-- All the variables (like $name, $mobile, $email, $code, ...) used here are passed in from the userRegister() method in Front/UserController.php --}}



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
            <tr><td>@lang('public.please click on below link to activate your Nobiarts:')</td></tr>
            <tr><td>&nbsp;</td></tr>
            <tr><td><a href="{{ url('/user/confirm/' . $code) }}">@lang('public.confirm account')</a></td></tr> {{-- $code is passed in from userRegister() method in UserController.php --}}
            <tr><td>&nbsp;</td></tr>
            <tr><td>&nbsp;</td></tr>
            <tr><td>@lang('public.Thanks & Regards,')</td></tr>
            <tr><td>Nobiarts</td></tr>
        </table>



    </body>
</html>
