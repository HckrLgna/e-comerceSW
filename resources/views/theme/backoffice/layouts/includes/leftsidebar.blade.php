<div class="flex p-5 ml-5 pt-5 mt-2 bg-white">
    <a href="/" class="d-flex align-items-center pb-3 mb-3 link-dark text-decoration-none border-bottom">
        <svg class="bi pe-none me-2" width="30" height="24"><img src="{{asset('img/logo.png')}}" alt="logo"> </svg>
    </a>
    <ul class="list-unstyled ps-0">
        <li class="mb-1">
            <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="false">
                Inicio
            </button>
            <div class="collapse" id="home-collapse" style="">
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                    <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded">Ecomerce</a></li>
                    <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded">Suscribir</a></li>
                    <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded">Pagar</a></li>
                </ul>
            </div>
        </li>
        <li class="mb-1">
            <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#dashboard-collapse" aria-expanded="false">
                Administracion
            </button>
            <div class="collapse" id="dashboard-collapse" style="">
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                    <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded">Precios</a></li>
                    <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded">Planes</a></li>
                    <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded">Fotografos</a></li>
                    <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded">Eventos</a></li>
                </ul>
            </div>
        </li>
        <li class="mb-1">
            <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#orders-collapse" aria-expanded="false">
                Seguridad
            </button>
            <div class="collapse" id="orders-collapse">
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                    <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded">New</a></li>
                    <li><a href="{{route('backoffice.role.index')}}" class="link-dark d-inline-flex text-decoration-none rounded">Roles</a></li>
                    <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded">Permisos</a></li>
                    <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded">Usuarios</a></li>
                </ul>
            </div>
        </li>
        <li class="border-top my-3"></li>
        <li class="mb-1">
            <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#account-collapse" aria-expanded="false">
               Cuenta
            </button>
            <div class="collapse" id="account-collapse">
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                    <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded">Crear...</a></li>
                    <li><a href="{{route('backoffice.user.index')}}" class="link-dark d-inline-flex text-decoration-none rounded">Perfil</a></li>
                    <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded">Configuraciones</a></li>
                    <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded">Salir</a></li>
                </ul>
            </div>
        </li>
    </ul>
</div>
