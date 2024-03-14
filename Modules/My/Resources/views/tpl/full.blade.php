<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{module_vite('build-layout', 'Resources/assets/sass/app.less')}}
    {{module_vite('build-layout', 'Resources/assets/js/app.js') }}
{{--    @vite(['Modules/Layout/Resources/assets/css/app.less','Modules/Layout/Resources/assets/js/app.js'])--}}
    <title>Layout</title>
</head>
<body>
@include('resources.views.layout.-components.header')
@yield('layout-full-page')
@include('resources.views.layout.-components.footer')

</body>
</html>
