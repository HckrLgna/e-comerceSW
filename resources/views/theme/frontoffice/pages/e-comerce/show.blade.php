@extends('theme.frontoffice.layouts.admin')

@section('content')
    <div class="container-fluid" >
        <div class="row p-5 justify-content-center">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-4">
                            <h4>Products In Our Store</h4>
                        </div>
                        @if(auth()->user()->cliente)
                            <div class="col-lg-6">
                                <form action=" {{ route('ecomerce.mostrar')}}" method="post" >
                                    @csrf
                                    <select class="form-select" aria-label="Default select example" name="evento_id">
                                        <option selected>Selecciona el evento</option>
                                        @foreach($eventos as $evento)
                                            <option value="{{$evento->id}}" href="{{route('home')}}">{{$evento->nombre}}</option>
                                        @endforeach
                                    </select>
                                    <button type="submit" class="btn btn-outline-primary">Filtrar por evento</button>
                                </form>
                            </div>
                            <div class="col-lg-2">
                                <button type="button" class="btn btn-outline-primary">Filtrar mis fotos</button>
                            </div>
                        @endif
                    </div>
                    <hr>
                    <div class="row">
                        @foreach($fotografias as $fotografia)
                            <div class="col-lg-3">
                                <div class="card" style="margin-bottom: 20px; height: auto;">
                                    <img src="/images/{{ $fotografia->path_img }}"
                                         class="card-img-top mx-auto"
                                         style="height: 150px; width: 150px;display: block;"
                                         alt="{{ $fotografia->path_img }}"
                                    >
                                    <div class="card-body">
                                        <a href=""><h6 class="card-title">algo</h6></a>
                                        <p>$precio</p>
                                    </div>
                                    <div class="card-footer" style="background-color: white;">
                                                <div class="row">
                                                    <!-- Button trigger modal -->
                                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                        Comprar
                                                    </button>

                                                    <!-- Modal -->
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
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                                                    <a href="{{route('ecomerce.comprar',$fotografia)}}"> <button type="button" class="btn btn-primary">Comprar</button> </a>
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
