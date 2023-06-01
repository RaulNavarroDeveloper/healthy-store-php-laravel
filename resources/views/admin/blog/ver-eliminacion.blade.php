@extends('layouts.main-admin')
@section('title', 'Eliminar publicacion:' . e($publicacion->titulo))


@section('main')
    <div class="w-75 m-auto">
    <h1 class="mt-4">Eliminar: "{{$publicacion->titulo}}"</h1>
    <p class="">Estas a punto de eliminar para siempre la siguiente publicación:</p>
    <div class="card  mt-3" style="width: 20rem;">
        <img src="{{url('imgs/imgs-preview/' . $publicacion->imagen_preview)}}" class="card-img-top img-fluid" alt="{{$publicacion->titulo}}">
        <div class="card-body">
            <h2 class="card-title h4">{{$publicacion->titulo}}</h2>
            <p class="card-text">{{$publicacion->resumen}}</p>
            <p>Autor: {{$publicacion->usuario->nombre}} {{$publicacion->usuario->apellido}}</p>
            <form action="{{route('admin.blog.eliminar', ['id' => $publicacion->publicacion_id])}}" method="post"
                  enctype="multipart/form-data" class="text-center">
                @csrf
                <button class="btn btn-danger">Eliminar Publicación</button>
            </form>
        </div>
    </div>
    </div>
@endsection
