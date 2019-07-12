<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title></title>
    <script defer src="{{ asset('js/app.js') }}"></script>
    @include('../partials.head')
</head>
<body>
    @include('../partials.nav')
    @yield('content')
    @include('../partials.footer')
</body>
</html>