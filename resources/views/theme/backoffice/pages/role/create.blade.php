@extends('theme.backoffice.layouts.admin')
@section('title','pagina demo')
@section('head')
@endsection

@section('breadcrumbs')
    <li class="breadcrumb-item"><a href="{{route('backoffice.role.index')}}">Roles</a></li>
    <li class="breadcrumb-item active" aria-current="page">Crear</li>
@endsection
@section('dropdown')
@endsection

@section('content')
    <div class="container">
        <div class="row p-3">
            <div class="col-10">
                <h1>Crear rol </h1>
            </div>
        </div>
        <div class="container d-inline-flex justify-content-center">
            <div class="row w-50 pt-2 ">
                <form class="row g-2" method="post" action="{{route('backoffice.role.store')}}">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nombre del rol</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Escriba un rol">
                        @error('name')
                            <span  >
                               <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Escriba una descripcion del rol.</label>
                        <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                        @error('description')
                            <span >
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-12">
                        <button class="btn btn-primary" type="submit">Crear rol</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection
@section('foot')
@endsection
