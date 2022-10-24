@extends('theme.backoffice.layouts.admin')
@section('title','pagina demo')
@section('head')
@endsection

@section('breadcrumbs')
    <li class="breadcrumb-item"><a href="{{route('backoffice.role.index')}}">Roles</a></li>
    <li class="breadcrumb-item active" aria-current="page">Rol:{{$role->id}}</li>
@endsection
@section('dropdown')
@endsection

@section('content')
    <div class="container">
        <div class="row p-3">
            <div class="col-10">
                <h1>Rol: {{$role->name}} </h1>
            </div>
            <div class="col-2">
                @include('theme.backoffice.layouts.includes.dropdown')
            </div>
        </div>
        <div class="container d-flex justify-content-center">
            <div class="row pt-2">
                <div class="card text-center">
                    <div class="card-header">
                        Rol
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{$role->name}}</h5>
                        <p class="card-text">{{$role->description}}</p>
                        <button type="button" class="btn btn-danger">Eliminar</button>
                        <a href="{{route('backoffice.role.edit',$role)}}"> <button type="button" class="btn btn-link">Editar</button></a>
                    </div>
                    <div class="card-footer text-muted">
                        Vigente
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
@section('foot')
@endsection
