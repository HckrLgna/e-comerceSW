@extends('theme.frontoffice.layouts.admin')
@section('title','pagina demo frontoffice')
@section('head')
@endsection

@section('content')
    <div class="container-fluid d-flex p-3 flex-column text-center ">
        <div class="row">
            <h1>Cover your page.</h1>
            <p class="lead">Cover is a one-page template for building simple and beautiful home pages. Download, edit the text, and add your own fullscreen background photo to make it your own.</p>
            <p class="lead">
                <a href="{{route('fotografo.create')}}" class="btn btn-lg btn-secondary fw-bold border-white bg-white" style="color: #000000">Trabaja con nosotros</a>
            </p>
        </div>

    </div>
@endsection

@section('foot')
@endsection
