<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Super Gestão - @yield('title')</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="{{asset('css/basic.css')}}">
    </head>

    <body>
        @include('app.layouts._partials.top')
        @yield('main')
    </body>
</html>