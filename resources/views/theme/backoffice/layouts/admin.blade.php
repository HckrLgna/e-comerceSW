<!doctype html>
<html lang="es">
<head>
    @include('theme.backoffice.layouts.includes.head')
</head>
<body>
    <div class="row">
        @include('theme.backoffice.layouts.includes.header')
    </div>
    <div class="row">
        <div class="container">
            <div class="row">
                <div class="col col-3">
                    @include('theme.backoffice.layouts.includes.leftsidebar')
                </div>
                <div class="col pt-4 col-9">
                    @include('theme.backoffice.layouts.includes.breadcrumb')
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    <footer>
        @include('theme.backoffice.layouts.includes.footer')
    </footer>
    @include('theme.backoffice.layouts.includes.foot')
</body>
</html>
