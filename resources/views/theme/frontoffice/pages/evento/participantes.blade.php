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
                            <a href="{{route('evento.participantes',$evento)}}" class="nav-link active" aria-current="page">
                                <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#home"></use></svg>
                                Participantes
                            </a>
                        </li>
                        <li>
                            <a href="{{route('evento.album',$evento)}}" class="nav-link link-dark">
                                <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#speedometer2"></use></svg>
                                Albun de fotos
                            </a>
                        </li>
                    </ul>
                    <hr>
                </div>
            </nav>
            <main class="col-md-8 ms-sm-auto col-lg-9 px-md-4">
                    <div class="container">
                        <div class="row p-3">
                            <div class="col-10">
                                <h1>{{$evento->nombre}} </h1>
                            </div>
                        </div>
                        <div class="row pt-2">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Correo</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($clientes as $cliente)
                                    <tr>
                                        <th scope="row">{{$cliente->id}}</th>
                                        <td><a href="#">{{$cliente->user->name}}</a> </td>
                                        <td>{{$cliente->user->email}}</td>
                                        <td><a href="#">Ver</a></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
            </main>
        </div>

    </div>

@endsection


@section('foot')
@endsection
