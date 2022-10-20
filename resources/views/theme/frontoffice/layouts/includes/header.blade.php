<header class="p-3 text-bg-dark">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
            </a>

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="{{route('home')}}" class="nav-link px-2 text-secondary">Inicio</a></li>
                <li><a href="{{route('ecomerce')}}" class="nav-link px-2 text-white">Ecomerce</a></li>
                <li><a href="#" class="nav-link px-2 text-white">Precios</a></li>
                <li><a href="#" class="nav-link px-2 text-white">Preguntas</a></li>
                <li><a href="#" class="nav-link px-2 text-white">Acerca de</a></li>
            </ul>

            <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
                <input type="search" class="form-control form-control-dark text-bg-dark" placeholder="Search..." aria-label="Search">
            </form>

            <div class="text-end">
                @if(!auth()->user())
                    <a href="{{route('login')}}"> <button type="button" class="btn btn-outline-light me-2">Login</button></a>
                    <a href="{{route('register')}}"> <button type="button" class="btn btn-warning">Sign-up </button></a>
                @else
                    <form method="POST" action="{{route ('logout')}}">
                        @csrf
                        <button type="submit" class="btn btn-warning">logout </button>
                    </form>
                @endif
            </div>
        </div>
    </div>
</header>
