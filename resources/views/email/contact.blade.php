<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <body>
    <p>Subject: {{ $subject }}</p>
    <br>
    <p>Message: {{ $messageText }}</p>
    <hr>
    <p>From: {{ $name }}</p>
    <p>Email: {{ $email }}</p>
    </body>
</html>
