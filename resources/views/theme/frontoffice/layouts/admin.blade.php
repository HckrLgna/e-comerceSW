<!doctype html>
<html lang="es">
<head>
    @include('theme.frontoffice.layouts.includes.head')
</head>
<body>
    <header>
        @include('theme.frontoffice.layouts.includes.header')
    </header>
    <main>
        @yield('content')
    </main>
    <footer class="bg-warning">
        @include('theme.backoffice.layouts.includes.footer')
    </footer>
    @include('theme.backoffice.layouts.includes.foot')
</body>
</html>
