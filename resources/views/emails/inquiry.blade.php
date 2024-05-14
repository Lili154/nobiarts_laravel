{{-- This is the front/pages/contact.blade.php HTML Form, i.e. the user's inquiry to the 'admin' sent to the 'admin' as an email using Mailtrap --}} {{-- All the variables (like $name, $mobile, $email, ...) used here are passed in from the contact() method in Front/CmsController.php --}}



<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <table>
            <tr><td>@lang('public.dear admin!')</td></tr>
            <tr><td>&nbsp;</td></tr>
            <tr><td>@lang("public.User's Inquiry on Nobiarts Website, Contact Us page. The details are as below:")</td></tr>
            <tr><td>&nbsp;</td></tr>
            <tr><td>@lang('public.name'): {{ $name }}</td></tr>
            <tr><td>&nbsp;</td></tr>
            <tr><td>@lang('public.email'): {{ $email }}</td></tr>
            <tr><td>&nbsp;</td></tr>
            <tr><td>@lang('public.subject'): {{ $subject }}</td></tr>
            <tr><td>&nbsp;</td></tr>
            <tr><td>@lang('public.message:') {{ $comment }}</td></tr>
            <tr><td>&nbsp;</td></tr>
            <tr><td>&nbsp;</td></tr>
            <tr><td>@lang('public.Thanks & Regards,')</td></tr>
            <tr><td>Nobiarts</td></tr>
        </table>
    </body>
</html>
