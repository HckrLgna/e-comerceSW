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
        <div class="container bg-black">
            <div class="row bg-danger">
                <div class="col col-3 bg-info">
                    @include('theme.backoffice.layouts.includes.leftsidebar')
                </div>
                <div class="col col-9 bg-gradient ">
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
