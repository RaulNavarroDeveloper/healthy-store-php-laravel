@extends('layouts.main-admin')
@section('title',e($publicacion->meta_title))


@section('main')
    <div class="d-flex mt-5">
            <div class="div-contenido">
                <p class="mb-0">Autor: {{$publicacion->usuario->nombre}} {{$publicacion->usuario->apellido}}</p>
                <h1>{!!$publicacion->titulo !!}</h1>
                <p>{!!$publicacion->resumen !!}</p>
                <figure class="figure-publicacion">
                    <img src="{{'../../imgs/' . $publicacion->imagen}}" alt="{{$publicacion->titulo}}" class="img-fluid">
                </figure>
                <p>{!! $publicacion->contenido !!}</p>
            </div>
    </div>
@endsection
