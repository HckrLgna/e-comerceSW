@extends('theme.frontoffice.layouts.admin')
@section('title','pagina demo frontoffice')
@section('head')
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-4 col-lg-3 d-md-block bg-light sidebar collapse">
                <div class="d-flex flex-column flex-shrink-0 p-3 bg-light" style="width: 280px;">
                    <a href="{{route('evento.index')}}" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
                        <img class="d-block mx-auto mb-4" src="{{asset('img/logo.png')}}" alt="logo" width="172" >
                    </a>
                    <hr>
                    <ul class="nav nav-pills flex-column mb-auto">
                        <li class="nav-item">
                            <a href="{{route('evento.participantes',$evento)}}" class="nav-link " aria-current="page">
                                <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#home"></use></svg>
                                Participantes
                            </a>
                        </li>
                        <li>
                            <a href="{{route('evento.album',$evento)}}" class="nav-link active">
                                <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#speedometer2"></use></svg>
                                Albun de fotos
                            </a>
                        </li>
                    </ul>
                    <hr>
                </div>
            </nav>
            <main class="col-md-8 ms-sm-auto col-lg-9 px-md-4">
                <div class="album py-5 bg-light">
                    <div class="container">
                        <div class="row">
                            <h1>{{$evento->nombre}} </h1>
                        </div>
                        <div class="row">
                            <div class="col col-4">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    Subir foto
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Subir Fotografia</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form class="row g-2" method="post" action="{{route('fotografia.store',$evento)}}" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="mb-3">
                                                        <label for="name" class="form-label">Escoja una fotografia</label>
                                                        <input type="file" class="form-control" id="name" name="file">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="description" class="form-label">Escriba una descripcion de la fotografi.</label>
                                                        <textarea class="form-control" id="description" name="descripcion" rows="3"></textarea>
                                                    </div>
                                                    <div class="col-12">
                                                        <button class="btn btn-primary" type="submit">subir fotografia</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                            @foreach($fotografias as $fotografia)
                                <div class="col">
                                    <div class="card shadow-sm">
                                        <div class="w-auto h-75">
                                            <img src="{{$fotografia->path_img}}" alt="" height="225" width="100%">
                                        </div>
                                        <div class="card-body">
                                            <p class="card-text">{{$fotografia->descripcion}}</p>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                                    <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                                                </div>
                                                <small class="text-muted">9 mins</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
@endsection

@section('foot')
@endsection
