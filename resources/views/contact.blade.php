<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    {{-- <button onclick={{ route('sendContact', ['id'=>1]) }}>Send</button> --}}
    <form action="{{ route('sendContact') }}" method="GET">
    <input type="submit" value="Send" id="send_1">
    </form>
</body>
</html>