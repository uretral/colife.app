<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['Modules/Lk/Resources/assets/css/app.less','Modules/Lk/Resources/assets/js/app.js'])

    <link rel="apple-touch-icon" sizes="180x180" href="{{ vite::asset('resources/img/favicon/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ vite::asset('resources/img/favicon/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ vite::asset('resources/img/favicon/favicon-16x16.png')}}">
    <link rel="manifest" href="{{ vite::asset('resources/img/favicon/site.webmanifest')}}">
    <link rel="mask-icon" href="{{ vite::asset('resources/img/favicon/safari-pinned-tab.svg')}}" color="#5bbad5">

    <title>{{ config('app.name') }}: @yield('title')</title>
</head>
<body class="tpl-{{request()->path()}}">
<x-lk::ui.frame.header :authorized="auth()->check()"/>
@yield('main')
<livewire:lk::global-events-listener/>
@livewireScriptConfig
</body>
</html>
