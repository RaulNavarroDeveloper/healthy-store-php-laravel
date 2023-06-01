@extends('layouts.main')
@section('title', 'Blog de Alimentación Saludable')

@section('main')
    <h1 class="ms-5 mt-4">Blog</h1>
    <div class="container mt-5">
        <div class="row">
    @foreach($publicaciones as $publicacion)
        <div class="col-12 col-md-6 col-lg-4">
            <div class="container-entradas card mb-5 mx-auto ms-md-0 me-md-4">
                <img src="{{'imgs/imgs-preview/' . $publicacion->imagen_preview}}" class="card-img-top img-fluid" alt="{{$publicacion->titulo}}">
                <div class="card-body">
                    <h2 class="card-title h5">{{$publicacion->titulo}}</h2>
                    <p class="card-text">{{ substr($publicacion->resumen, 0, 90) . '...'}}</p>
                    <p><b>Autor:</b> {{$publicacion->usuario->nombre}} {{$publicacion->usuario->apellido}}</p>
                    <div class="d-flex justify-content-center ">
                    <a href="{{route('publicacion', ['id' => $publicacion->publicacion_id])}}" class="btn btn-ver">Ver Entrada</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
        </div>
    </div>
@endsection
