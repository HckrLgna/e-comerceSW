@extends('theme.frontoffice.layouts.admin')
@section('title','pagina demo frontoffice')
@section('head')
@endsection

@section('content')
    <section class=" gradient-custom-2">
        <div class="container">
            <div class="row d-flex justify-content-center align-items-center ">
                <div class="col p-5">
                    <div class="card">
                        <div class="rounded-top text-white d-flex flex-row" style="background-color: #000; height:200px;">
                            <div class="ms-4 mt-5 d-flex flex-column" style="width: 150px;">
                                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-profiles/avatar-1.webp"
                                     alt="Generic placeholder image" class="img-fluid img-thumbnail mt-4 mb-2"
                                     style="width: 150px; z-index: 1">
                                <button type="button" class="btn btn-outline-dark" data-mdb-ripple-color="dark"
                                        style="z-index: 1;">
                                    Subir foto
                                </button>
                            </div>
                            <div class="ms-3" style="margin-top: 130px;">
                                <h5>{{$cliente->user->name}}</h5>
                                <p>{{$cliente->user->email}}</p>
                            </div>
                        </div>
                        <div class="p-4 text-black" style="background-color: #f8f9fa;">
                            <div class="d-flex justify-content-end text-center py-1">
                                <div>
                                    <p class="mb-1 h5">{{count($fotografias)}}</p>
                                    <p class="small text-muted mb-0">Fotografias</p>
                                </div>
                                <div class="px-3">
                                    <p class="mb-1 h5">{{count($eventos)}}</p>
                                    <p class="small text-muted mb-0">Eventos asistidos</p>
                                </div>
                                <div>
                                    <p class="mb-1 h5">0</p>
                                    <p class="small text-muted mb-0">Eventos Organizados</p>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-4 text-black">
                            <div class="mb-5">
                                <p class="lead fw-normal mb-1">Acerca de</p>
                                <div class="p-4" style="background-color: #f8f9fa;">
                                    <p class="font-italic mb-1">Desarrollador web</p>
                                    <p class="font-italic mb-1">Vive en Santa Cruz</p>
                                    <p class="font-italic mb-0">Animador</p>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <p class="lead fw-normal mb-0">Album de fotos</p>
                                <p class="mb-0"><a href="#!" class="text-muted">Show all</a></p>
                            </div>
                            <div class="row g-2">
                                @foreach($fotografias as $fotografia)
                                <div class="col mb-2">
                                    <img src="{{$fotografia->path_img}}"
                                         alt="image 1" class="w-100 rounded-3">
                                </div>
                                <div class="col mb-2">
                                    <img src="{{$fotografia->path_img}}"
                                         alt="image 1" class="w-100 rounded-3">
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('foot')
@endsection
