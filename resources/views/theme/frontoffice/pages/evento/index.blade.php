@extends('theme.frontoffice.layouts.admin')
@section('title','pagina demo frontoffice')
@section('head')
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-4 col-lg-3 d-md-block bg-light sidebar collapse">
                <div class="d-flex flex-column flex-shrink-0 p-3 bg-light" style="width: 280px;">
                    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
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
                    <h1>aqui ira el main</h1>
            </main>
        </div>

    </div>

@endsection

@section('foot')
@endsection
