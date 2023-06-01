@extends('layouts.main')
@section('title', e($publicacion->meta_title))

@section('main')
    <section class="container">
        <div class="row mt-4">
            <div class="col-12 col-lg-8 mb-5 mb-lg-0">
                <div class="me-5">
                    <article class="div-contenido">
                    <p class="mb-0">Autor: {{$publicacion->usuario->nombre}} {{$publicacion->usuario->apellido}}</p>
                    <h1>{!!$publicacion->titulo !!}</h1>
                    <p>{!!$publicacion->resumen !!}</p>
                    <figure class="figure-publicacion">
                    <img src="{{'../imgs/' . $publicacion->imagen}}" alt="{{$publicacion->titulo}}" class="img-fluid">
                    </figure>
                    <article>
                        <p>{!! $publicacion->contenido !!}</p>
                    </article>
                    </article>
                </div>
                <div class="d-flex flex-column align-items-center">
                    <h2 class="mt-3 mt-lg-5 mb-4 text-center">Compartir en Redes</h2>
                    <aside class="d-flex flex-column flex-sm-row justify-content-center social-media">
                        <a class="d-flex justify-content-center align-items-center ms-4 ms-sm-0 mb-3 mb-sm-0" href="https://www.facebook.com/"><i class="fa-brands fa-facebook text-light animate_animated animate__bounce"></i></a>
                        <a class="d-flex justify-content-center align-items-center ms-4 mb-3 mb-sm-0" href="https://www.instagram.com/"><i class="fa-brands fa-twitter text-light"></i></a>
                        <a class="d-flex justify-content-center align-items-center ms-4 mb-3 mb-sm-0" href="https://www.twitter.com/"><i class="fa-brands fa-instagram text-light"></i></a>
                        <a class="d-flex justify-content-center align-items-center ms-4 mb-3 mb-sm-0" href="https://discord.com/"><i class="fa-brands fa-discord text-light"></i></a>
                    </aside>
                </div>
            </div>
            <div class="col-12 col-lg-4">
                <div class="border-none border-lg-start w-75 w-md-25 w-lg-100 mx-auto">
                    <h2 class="text-center">Podría interesarte</h2>
                    @foreach($publicaciones_relacionadas as $data)
                        <article class="card m-auto mt-4">
                            <img src="{{'../imgs/imgs-preview/' . $data->imagen_preview}}" class="card-img-top img-fluid" alt="{{$data->titulo}}">
                            <article class="card-body d-flex flex-column">
                                <h5 class="card-title">{{$data->titulo}}</h5>
                                <p><b>Autor:</b> {{$data->usuario->nombre}} {{$data->usuario->apellido}}</p>
                                <p class="card-text">{{ substr($data->resumen, 0, 90) . '...'}}</p>
                                <a href="{{route('publicacion', ['id' => $data->publicacion_id])}}" class="btn btn-ver">Ver Publicación</a>
                            </article>
                        </article>
                    @endforeach

                </div>
            </div>
        </div>
    </section>
@endsection
