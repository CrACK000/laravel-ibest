<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title_page')</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('icon_blue.svg') }}">
    @vite([
            'resources/sass/app.scss',
            'resources/js/app.js'
        ])
</head>
<body>

@yield('content')

@include('layout.parts.footer')

@vite('resources/js/scripts.js')

</body>
</html>
