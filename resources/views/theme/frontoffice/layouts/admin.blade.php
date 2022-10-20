<!doctype html>
<html lang="es">
<head>
    @include('theme.frontoffice.layouts.includes.head')
</head>
<body>
<div class="row">
    @include('theme.frontoffice.layouts.includes.header')
</div>
<div class="row">
    <div class="container">
        <div class="row">
            @yield('content')
        </div>
    </div>
</div>
<footer>
    @include('theme.backoffice.layouts.includes.footer')
</footer>
@include('theme.backoffice.layouts.includes.foot')
</body>
</html>
