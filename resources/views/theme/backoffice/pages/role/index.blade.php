@extends('theme.backoffice.layouts.admin')
@section('title','pagina demo')
@section('head')
@endsection

@section('breadcrumbs')
    <!--<li class="breadcrumb-item"><a href="#">Library</a></li>-->
    <li class="breadcrumb-item active" aria-current="page">Roles</li>
@endsection
@section('dropdown')
@endsection

@section('content')
    <div class="container">
        <div class="row p-3">
            <div class="col-10">
                <h1>Lista de roles </h1>
            </div>
            <div class="col-2">
                @include('theme.backoffice.layouts.includes.dropdown')
            </div>
        </div>
        <div class="row pt-2">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($roles as $role)
                    <tr>

                        <th scope="row">{{$role->id}}</th>
                        <td><a href="{{route('backoffice.role.show',$role->id)}}">{{$role->name}}</a> </td>
                        <td>{{$role->description}}</td>
                        <td><a href="{{route('backoffice.role.edit',$role)}}">Editar</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
@section('foot')
@endsection
