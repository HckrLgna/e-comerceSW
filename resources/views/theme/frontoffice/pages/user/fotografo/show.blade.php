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
                                    Edit profile
                                </button>
                            </div>
                            <div class="ms-3" style="margin-top: 130px;">
                                <h5>{{$fotografo->user->name}}</h5>
                                <p>{{$fotografo->ciudad}}</p>
                            </div>
                        </div>
                        <div class="p-4 text-black" style="background-color: #f8f9fa;">
                            <div class="d-flex justify-content-end text-center py-1">
                                <div>
                                    <p class="mb-1 h5">253</p>
                                    <p class="small text-muted mb-0">Fotografias</p>
                                </div>
                                <div class="px-3">
                                    <p class="mb-1 h5">{{count($eventos)}}</p>
                                    <p class="small text-muted mb-0">Eventos asistidos</p>
                                </div>
                                <div>
                                    <p class="mb-1 h5">478</p>
                                    <p class="small text-muted mb-0">Reconocimientos</p>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-4 text-black">
                            <div class="mb-5">
                                <p class="lead fw-normal mb-1">About</p>
                                <div class="p-4" style="background-color: #f8f9fa;">
                                    <p class="font-italic mb-1">Dise??ador Web</p>
                                    <p class="font-italic mb-1">Vive en La Paz</p>
                                    <p class="font-italic mb-0">Fotografo</p>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <p class="lead fw-normal mb-0">Lista de eventos</p>
                                <div class="container">
                                    <div class="row pt-2">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Nombre del evento</th>
                                                <th scope="col">Lugar</th>
                                                <th scope="col">Fecha</th>
                                                <th scope="col">Administrar</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($eventos as $evento)
                                                <tr>
                                                    <th scope="row">{{$evento->id}}</th>
                                                    <td>{{$evento->nombre}}</td>
                                                    <td>{{$evento->fecha}}</td>
                                                    <td>{{$evento->lugar}}</td>
                                                    <td><a href="{{route('evento.album',$evento)}}">Ver</a></td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
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
