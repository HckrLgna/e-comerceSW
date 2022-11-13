@extends('theme.frontoffice.layouts.admin')
@section('head')
    <style>
        .transp-block {
            background: rgba(174, 168, 171, 0.8) url(https://images.vexels.com/media/users/3/167553/isolated/lists/c05cddc47f3ff6cb73a8310e6c8a4f6b-cada-foto-tiene-un-trazo-de-insignia-de-corazon-de-objetivo-de-lente-de-camara-de-historia.png) no-repeat;
            width: 250px;
            height: 250px;
        }
        img.transparent {
            filter:alpha(opacity=75);
            opacity:.50;
        }
    </style>
@endsection
@section('content')
    <div class="container-fluid" >
        <div class="row p-5 justify-content-center">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-4">
                            <h4>Products In Our Store</h4>
                        </div>
                        @if(auth()->user())
                            @if(auth()->user()->cliente)
                                <div class="col-lg-6">
                                    <form action=" {{route('ecomerce.filtrar')}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <select class="form-select" aria-label="Default select example" name="evento_id">
                                            <option selected>Selecciona el evento</option>
                                            @foreach($eventos as $evento)
                                                <a href="{{ route('ecomerce.mostrar',$evento)}}"> <option value="{{$evento->id}}">{{$evento->nombre}}</option> </a>
                                            @endforeach
                                        </select>
                                        <div class="input-group">
                                            <input type="file" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Cargar foto" name="path_image">
                                            <button type="submit" class="btn btn-outline-secondary" id="inputGroupFileAddon04" >Filtrar mis fotos</button>
                                        </div>

                                    </form>
                                </div>
                            @endif
                        @endif
                    </div>
                <hr>
                <div class="row">
                    @foreach($fotografias as $fotografia)
                        <div class="col-lg-3">
                            <div class="card " style="margin-bottom: 20px; height: auto;">
                                @if(!$fotografia->clientes->find(auth()->user()->cliente))
                                    <div class="container-fluid transp-block mt-4 mb-4">
                                        <img src="{{ $fotografia->path_img }}"
                                             class="card-img-top mx-auto  transparent"
                                             style="height: 200px; width: 200px; display: block;"
                                             alt="{{ $fotografia->path_img }}"
                                        >
                                    </div>
                                @else
                                    <div class="container-fluid mt-4 mb-4">
                                        <img src="{{ $fotografia->path_img }}"
                                             class="card-img-top mx-auto "
                                             style="height: 200px; width: 200px; display: block;"
                                             alt="{{ $fotografia->path_img }}"
                                        >
                                    </div>
                                @endif

                                <div class="card-footer" style="background-color: white;">
                                    <div class="row">
                                        @if(!$fotografia->clientes->find(auth()->user()->cliente))
                                            @if(auth()->user()->cliente)
                                                <form action="{{route('ecomerce.comprar',$fotografia)}}" method="post">
                                                    @csrf
                                                    <button class="btn btn-primary" type="submit">Comprar</button>
                                                </form>
                                            @endif
                                        @else
                                            <button class="btn btn-primary bg-gradient" type="submit" disabled>Comprado</button>
                                        @endif
                                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Comprar fotografia</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="col order-md-last">
                                                                <h4 class="d-flex justify-content-between align-items-center mb-3">
                                                                            <span class="text-primary">Tu carrito</span>
                                                                            <span class="badge bg-primary rounded-pill">3</span>
                                                                        </h4>
                                                                <ul class="list-group mb-3">
                                                                    <li class="list-group-item d-flex justify-content-between lh-sm">
                                                                                <div>
                                                                                    <h6 class="my-0">Product name</h6>
                                                                                    <small class="text-muted">Brief description</small>
                                                                                </div>
                                                                                <span class="text-muted">$12</span>
                                                                            </li>
                                                                    <li class="list-group-item d-flex justify-content-between lh-sm">
                                                                                <div>
                                                                                    <h6 class="my-0">Second product</h6>
                                                                                    <small class="text-muted">Brief description</small>
                                                                                </div>
                                                                                <span class="text-muted">$8</span>
                                                                            </li>
                                                                    <li class="list-group-item d-flex justify-content-between lh-sm">
                                                                                <div>
                                                                                    <h6 class="my-0">Third item</h6>
                                                                                    <small class="text-muted">Brief description</small>
                                                                                </div>
                                                                                <span class="text-muted">$5</span>
                                                                            </li>
                                                                    <li class="list-group-item d-flex justify-content-between bg-light">
                                                                                <div class="text-success">
                                                                                    <h6 class="my-0">Promo code</h6>
                                                                                    <small>EXAMPLECODE</small>
                                                                                </div>
                                                                                <span class="text-success">−$5</span>
                                                                            </li>
                                                                    <li class="list-group-item d-flex justify-content-between">
                                                                                <span>Total (USD)</span>
                                                                                <strong>$20</strong>
                                                                            </li>
                                                                </ul>
                                                                <form class="card p-2">
                                                                    <div class="input-group">
                                                                        <input type="text" class="form-control" placeholder="Promo code">
                                                                        <button type="submit" class="btn btn-secondary">Redeem</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <form action="{{route('ecomerce.comprar',$fotografia)}}" method="post">
                                                            @csrf
                                                            <button class="btn btn-primary" type="submit">Comprar</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
