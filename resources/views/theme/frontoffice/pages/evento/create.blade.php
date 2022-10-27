@extends('theme.frontoffice.layouts.admin')
@section('title','pagina demo frontoffice')
@section('head')
@endsection

@section('content')
    <div class="container">
        <main>
            <div class="py-5 text-center">
                <img class="d-block mx-auto mb-4" src="{{asset('img/logo.png')}}" alt="" width="172" >
                <h2>Solicita nuestros servicios para tu evento.</h2>
                <p class="lead">Below is an example form built entirely with Bootstrap’s form controls. Each required form group has a validation state that can be triggered by attempting to submit the form without completing it.</p>
            </div>

            <div class="row g-5 d-flex justify-content-center">
                <div class="col-md-7 col-lg-8">
                    <h4 class="mb-3">Rellena los datos solicitados para la creacion de tu perfil y evento</h4>
                    <form class="needs-validation" novalidate method="post" action="{{route('evento.store')}}">
                        @csrf
                        <div class="row g-3">
                            <div class="col-sm-6">
                                <label for="firstName" class="form-label">Nombres</label>
                                <input type="text" class="form-control" id="firstName" placeholder="" value="" name="name" required>
                            </div>

                            <div class="col-sm-6">
                                <label for="lastName" class="form-label">Apellidos</label>
                                <input type="text" class="form-control" id="lastName" placeholder="" value="" name="last_name" required>
                            </div>

                            <div class="col-6">
                                <label for="email" class="form-label">Email <span class="text-muted">(Del organizador)</span></label>
                                <input type="email" class="form-control" id="email" placeholder="you@example.com" name="email">
                            </div>
                            <div class="col-6">
                                <label for="password" class="form-label">Contraseña</label>
                                <input type="password" class="form-control" id="password"  name="password">
                            </div>
                            <div class="col-12">
                                <label for="nombre" class="form-label">Nombre del evento</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" required>
                            </div>

                            <div class="col-12">
                                <label for="address" class="form-label">Direccion</label>
                                <input type="text" class="form-control" id="address" placeholder="1234 Main St" name="address" required>
                            </div>

                            <div class="col-12">
                                <label for="address2" class="form-label">Direccion del evento <span class="text-muted">(Requerido)</span></label>
                                <input type="text" class="form-control" id="address2" placeholder="Apartment or suite" name="event_address">
                            </div>

                            <div class="col-md-6">
                                <label for="country" class="form-label">Fotografo</label>
                                <select class="form-select" id="country" name="id_fotografo" required>
                                    <option value="">Seleccione un fotografo...</option>
                                    @foreach($fotografos as $fotografo)
                                        <option value="{{$fotografo->id}}">{{$fotografo->user->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label for="country" class="form-label">Fecha</label>
                                <input class="form-select" type="date" name="fecha">
                            </div>

                        </div>

                        <hr class="my-4">

                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="same-address">
                            <label class="form-check-label" for="same-address">Recibir la invitacion y qr del evento por correo</label>
                        </div>

                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="save-info">
                            <label class="form-check-label" for="save-info">Save this information for next time</label>
                        </div>

                        <hr class="my-4">

                        <button class="w-100 btn btn-primary btn-lg" type="submit">Crear evento</button>
                    </form>
                </div>
            </div>
        </main>
    </div>
@endsection

@section('foot')
@endsection
