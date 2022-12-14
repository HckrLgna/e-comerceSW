@extends('theme.frontoffice.layouts.admin')
@section('title','pagina demo frontoffice')
@section('head')
    <link rel="stylesheet" href="/css/app.css">
@endsection

@section('content')

            <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{asset('img/portada2.jpg')}}" alt="100%" width="100%" >

                        <div class="container">
                            <div class="carousel-caption text-start">
                                <h1>Example headline.</h1>
                                <p>Some representative placeholder content for the first slide of the carousel.</p>
                                <p><a class="btn btn-lg btn-primary" href="#">Sign up today</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{asset('img/portada1.jpg')}}" alt="100%" width="100%" >
                        <div class="container">
                            <div class="carousel-caption">
                                <h1>Another example headline.</h1>
                                <p>Some representative placeholder content for the second slide of the carousel.</p>
                                <p><a class="btn btn-lg btn-primary" href="#">Learn more</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{asset('img/portada3.jpg')}}" alt="100%" width="100%" >

                        <div class="container">
                            <div class="carousel-caption text-end">
                                <h1>One more for good measure.</h1>
                                <p>Some representative placeholder content for the third slide of this carousel.</p>
                                <p><a class="btn btn-lg btn-primary" href="#">Browse gallery</a></p>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
            <div class="container marketing">

                <!-- Three columns of text below the carousel -->

                <div class="row">
                    @foreach($users as $user)
                        @if($user->fotografo)
                            <div class="col-lg-4">
                                <div class="text-center">
                                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-profiles/avatar-1.webp"
                                         alt="Generic placeholder image" class="img-fluid img-thumbnail mt-4 mb-2"
                                         style="width: 150px; z-index: 1; border-radius:100%;">
                                </div>
                                <h2 class="fw-normal">{{$user->name}}</h2>
                                <p>Ciudad de: {{$user->fotografo->ciudad}}</p>
                                <p><a class="btn btn-secondary" href="{{route('fotografo.showProfile',$user->fotografo)}}">Ver perfil &raquo;</a></p>
                            </div><!-- /.col-lg-4 -->
                        @endif

                    @endforeach
                </div><!-- /.row -->


                <!-- START THE FEATURETTES -->

                <hr class="featurette-divider">

                <div class="row featurette">
                    <div class="col-md-7">
                        <h2 class="featurette-heading fw-normal lh-1">Captura los mejores momentos. <span class="text-muted">It???ll blow your mind.</span></h2>
                        <p class="lead">Some great placeholder content for the first featurette here. Imagine some exciting prose here.</p>
                    </div>
                    <div class="col-md-5">
                            <img src="{{asset('img/evento1.jpg')}}" alt="" with="350" height="350">
                    </div>
                </div>

                <hr class="featurette-divider">

                <div class="row featurette">
                    <div class="col-md-7 order-md-2">
                        <h2 class="featurette-heading fw-normal lh-1">Oh yeah, it???s that good. <span class="text-muted">See for yourself.</span></h2>
                        <p class="lead">Another featurette? Of course. More placeholder content here to give you an idea of how this layout would work with some actual real-world content in place.</p>
                    </div>
                    <div class="col-md-5 order-md-1">
                        <img src="{{asset('img/evento2.jpg')}}" alt="" with="350" height="350">
                    </div>
                </div>

                <hr class="featurette-divider">

                <div class="row featurette">
                    <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
                        <h1 class="display-4 fw-normal">Precios</h1>
                        <p class="fs-5 text-muted">Quickly build an effective pricing table for your potential customers with this Bootstrap example. It???s built with default Bootstrap components and utilities with little customization.</p>
                    </div>
                    <main>
                        <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
                            <div class="col">
                                <div class="card mb-4 rounded-3 shadow-sm">
                                    <div class="card-header py-3">
                                        <h4 class="my-0 fw-normal">Free</h4>
                                    </div>
                                    <div class="card-body">
                                        <h1 class="card-title pricing-card-title">$0<small class="text-muted fw-light">/mo</small></h1>
                                        <ul class="list-unstyled mt-3 mb-4">
                                            <li>2 eventos gratuitos</li>
                                            <li>520 MB de almacenamiento</li>
                                            <li>Invitacion por email</li>
                                            <li>Asistencia tecnica</li>
                                        </ul>
                                        <a href="{{route('register')}}"> <button type="button" class="w-100 btn btn-lg btn-outline-primary">Registrate gratis</button></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card mb-4 rounded-3 shadow-sm">
                                    <div class="card-header py-3">
                                        <h4 class="my-0 fw-normal">Pro</h4>
                                    </div>
                                    <div class="card-body">
                                        <h1 class="card-title pricing-card-title">$15<small class="text-muted fw-light">/mo</small></h1>
                                        <ul class="list-unstyled mt-3 mb-4">
                                            <li>5 eventos</li>
                                            <li>1 GB de almacenamiento</li>
                                            <li>Invitacion por email</li>
                                            <li>Asistencia tecnica</li>
                                        </ul>
                                        <a href="{{route('suscripcion.index')}}"> <button type="button" class="w-100 btn btn-lg btn-primary">Suscribete</button></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card mb-4 rounded-3 shadow-sm border-primary">
                                    <div class="card-header py-3 text-bg-primary border-primary">
                                        <h4 class="my-0 fw-normal">Enterprise</h4>
                                    </div>
                                    <div class="card-body">
                                        <h1 class="card-title pricing-card-title">$29<small class="text-muted fw-light">/mo</small></h1>
                                        <ul class="list-unstyled mt-3 mb-4">
                                            <li>15 eventos gratuitos</li>
                                            <li>2 GB de almacenamiento</li>
                                            <li>Invitacion por email</li>
                                            <li>Asistencia tecnica</li>
                                        </ul>
                                        <a href="{{route('suscripcion.index')}}"> <button type="button" class="w-100 btn btn-lg btn-primary">Suscribete</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <h2 class="display-6 text-center mb-4">Compare plans</h2>

                        <div class="table-responsive">
                            <table class="table text-center">
                                <thead>
                                <tr>
                                    <th style="width: 34%;"></th>
                                    <th style="width: 22%;">Free</th>
                                    <th style="width: 22%;">Pro</th>
                                    <th style="width: 22%;">Enterprise</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th scope="row" class="text-start">Public</th>
                                    <td><svg class="bi" width="24" height="24"><use xlink:href="#check"/></svg></td>
                                    <td><svg class="bi" width="24" height="24"><use xlink:href="#check"/></svg></td>
                                    <td><svg class="bi" width="24" height="24"><use xlink:href="#check"/></svg></td>
                                </tr>
                                <tr>
                                    <th scope="row" class="text-start">Private</th>
                                    <td></td>
                                    <td><svg class="bi" width="24" height="24"><use xlink:href="#check"/></svg></td>
                                    <td><svg class="bi" width="24" height="24"><use xlink:href="#check"/></svg></td>
                                </tr>
                                </tbody>

                                <tbody>
                                <tr>
                                    <th scope="row" class="text-start">Permissions</th>
                                    <td><svg class="bi" width="24" height="24"><use xlink:href="#check"/></svg></td>
                                    <td><svg class="bi" width="24" height="24"><use xlink:href="#check"/></svg></td>
                                    <td><svg class="bi" width="24" height="24"><use xlink:href="#check"/></svg></td>
                                </tr>
                                <tr>
                                    <th scope="row" class="text-start">Sharing</th>
                                    <td></td>
                                    <td><svg class="bi" width="24" height="24"><use xlink:href="#check"/></svg></td>
                                    <td><svg class="bi" width="24" height="24"><use xlink:href="#check"/></svg></td>
                                </tr>
                                <tr>
                                    <th scope="row" class="text-start">Unlimited members</th>
                                    <td></td>
                                    <td><svg class="bi" width="24" height="24"><use xlink:href="#check"/></svg></td>
                                    <td><svg class="bi" width="24" height="24"><use xlink:href="#check"/></svg></td>
                                </tr>
                                <tr>
                                    <th scope="row" class="text-start">Extra security</th>
                                    <td></td>
                                    <td></td>
                                    <td><svg class="bi" width="24" height="24"><use xlink:href="#check"/></svg></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </main>
                </div>

                <hr class="featurette-divider">

                <!-- /END THE FEATURETTES -->

            </div><!-- /.container -->
            @section('footer')
            @endsection

@endsection

@section('foot')
@endsection
