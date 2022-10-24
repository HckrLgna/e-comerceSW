@extends('theme.frontoffice.layouts.admin')
@section('title','pagina demo frontoffice')
@section('head')
@endsection

@section('content')
   <div class="container p-5">
       <div class="row">
           <div class="col col-6 bg-dark"></div>
           <div class="col col-6 bg-warning">
               <form class="row g-3" method="post" action="{{route('fotografo.store')}}">
                   @csrf
                   <div class="col-md-4">
                       <label for="name" class="form-label">Nombre</label>
                       <input type="text" class="form-control" id="name" value="Mark" name="name" required>
                   </div>
                   <div class="col-md-4">
                       <label for="celular" class="form-label">Celular</label>
                       <input type="text" class="form-control" id="celular" value="Otto" name="celular" required>
                   </div>

                   <div class="col-md-6">
                       <label for="ciudad" class="form-label">Ciudad</label>
                       <input type="text" class="form-control" id="ciudad" name="ciudad" required>
                   </div>
                   <div class="col-md-3">
                       <label for="estudio_fotografico" class="form-label">Edio fotografico</label>
                       <select class="form-select" id="estudio_fotografico" name="estudio_fotografico" required>
                           <option selected disabled value="">Elige...</option>
                           <option>Si</option>
                           <option>No</option>
                       </select>
                       <div class="invalid-feedback">
                           Selecciona un estado válido.
                       </div>
                   </div>
                   <div class="col-md-3">
                       <label for="experiencia" class="form-label">Experiencia</label>
                       <input type="text" class="form-control" id="experiencia" name="experiencia" placeholder="años">
                   </div>
                   <div class="col-md-6">
                       <div class="form-check">
                           <label for="email" class="form-label">Correo electronico</label>
                           <input type="email" class="form-control" id="email" aria-describedby="inputGroupPrepend" name="email" required>
                       </div>
                   </div>
                   <div class="col-md-6">
                       <div class="form-check">
                           <label for="password" class="form-label">Contraseña</label>
                           <input type="password" class="form-control" id="password" aria-describedby="inputGroupPrepend" name="password" required>
                       </div>
                   </div>
                   <div class="col-12">
                       <div class="form-check">
                           <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                           <label class="form-check-label" for="invalidCheck">
                               Acepta los términos y condiciones
                           </label>
                       </div>
                   </div>
                   <div class="col-12">
                        <button class="btn btn-primary" type="submit">Unete a nosotros</button>
                   </div>
               </form>
           </div>
       </div>
   </div>
@endsection

@section('foot')
@endsection
