@extends('theme.frontoffice.layouts.admin')
@section('title','pagina demo frontoffice')
@section('head')
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
    <style>
        .boddy {
            background-color:#1d1d1d !important;
            font-family: "Asap", sans-serif;
            color:#989898;
            margin:10px;
            font-size:16px;
        }

        #demo {
            height:100%;
            position:relative;
            overflow:hidden;
        }


        .green{
            background-color:#6fb936;
        }
        .thumb{
            margin-bottom: 30px;
        }

        .page-top{
            margin-top:85px;
        }


        img.zoom {
            width: 100%;
            height: 200px;
            border-radius:5px;
            object-fit:cover;
            -webkit-transition: all .3s ease-in-out;
            -moz-transition: all .3s ease-in-out;
            -o-transition: all .3s ease-in-out;
            -ms-transition: all .3s ease-in-out;
        }


        .transition {
            -webkit-transform: scale(1.2);
            -moz-transform: scale(1.2);
            -o-transform: scale(1.2);
            transform: scale(1.2);
        }
        .modal-header {

            border-bottom: none;
        }
        .modal-title {
            color:#000;
        }
        .modal-footer{
            display:none;
        }

    </style>
@endsection

@section('content')
    <section class=" gradient-custom-2">
        <div class="container page-top">
            <div class="row d-flex justify-content-center align-items-center ">
                <div class="col p-5">
                    <div class="card">
                        <div class="rounded-top text-white d-flex flex-row" style="background-color: #000; height:200px;">
                            <div class="ms-4 mt-5 d-flex flex-column" style="width: 150px;">
                                <img src="{{auth()->user()->cliente->profile_photo_path}}"
                                     alt="Generic placeholder image" class="img-fluid img-thumbnail mt-4 mb-2"
                                     style="width: 150px; z-index: 1">
                                <form action="{{route('cliente.subir_fotografia')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <!-- Modal -->
                                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="mb-3">
                                                            <label for="formFile" class="form-label">Default file input example</label>
                                                            <input class="form-control" type="file" id="formFile" name="file">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                                        <button type="submit" class="btn btn-primary">Subir</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                </form>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#exampleModal" style="z-index: 1;" >
                                    Subir foto
                                </button>

                            </div>
                            <div class="ms-3" style="margin-top: 130px;">
                                <h5>{{$cliente->user->name}}</h5>
                                <p>{{$cliente->user->email}}</p>
                            </div>
                        </div>
                        <div class="p-4 text-black" style="background-color: #f8f9fa;">
                            <div class="d-flex justify-content-end text-center py-1">
                                <div>
                                    <p class="mb-1 h5">{{count($fotografias)}}</p>
                                    <p class="small text-muted mb-0">Fotografias</p>
                                </div>
                                <div class="px-3">
                                    <p class="mb-1 h5">{{count($eventos)}}</p>
                                    <p class="small text-muted mb-0">Eventos asistidos</p>
                                </div>
                                <div>
                                    <p class="mb-1 h5">0</p>
                                    <p class="small text-muted mb-0">Eventos Organizados</p>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-4 text-black">
                            <div class="mb-5">
                                <p class="lead fw-normal mb-1">Acerca de</p>
                                <div class="p-4" style="background-color: #f8f9fa;">
                                    <p class="font-italic mb-1">Desarrollador web</p>
                                    <p class="font-italic mb-1">Vive en Santa Cruz</p>
                                    <p class="font-italic mb-0">Animador</p>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <p class="lead fw-normal mb-0">Album de fotos</p>
                                <p class="mb-0"><a href="#!" class="text-muted">Show all</a></p>
                            </div>
                            <div class="container p-5 boddy">
                                <div class="row">
                                    @foreach($fotografias as $fotografia)
                                        <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                                            <a href="#" class="fancybox" rel="ligthbox">
                                                <img src="{{$fotografia->path_img}}"
                                                     alt="image" class="zoom img-fluid">
                                            </a>
                                        </div>
                                    @endforeach
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

    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->
    <script src="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
    <script>
        $(document).ready(function(){
            $(".fancybox").fancybox({
                openEffect: "none",
                closeEffect: "none"
            });

            $(".zoom").hover(function(){

                $(this).addClass('transition');
            }, function(){

                $(this).removeClass('transition');
            });
        });
    </script>
@endsection
