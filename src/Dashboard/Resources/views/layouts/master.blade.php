<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
        <link rel="stylesheet" href="{{ mix('css/dashboard.css') }}">
        <title>{{ $page->getTitle() }}</title>
    </head>
    <body x-data="{ theme: $persist('theme-light') }" :class="theme">
        @yield('page')
        <script src="{{ mix('js/dashboard.js') }}"></script>
    </body>
</html>
