<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<body>
    <p>User requested attention:</p>
    <p>user email: {{ $email }}</p>
    <p>user name : {{ $name }}</p>
    <p>department: {{ $department }}</p>
    <p>districts: {{ implode(',',$districts ?? []) }}</p>
    <p>message: </p>
    <p>{{ $messageText }}</p>
</body>
