<!doctype html>
<html lang="es">
<head>
    @include('theme.frontoffice.layouts.includes.head')
</head>
<body>
    @include('theme.frontoffice.layouts.includes.header')
        @yield('content')
    @include('theme.backoffice.layouts.includes.footer')
    @include('theme.backoffice.layouts.includes.foot')
</body>
</html>
