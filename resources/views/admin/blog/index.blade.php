@extends('layouts.main-admin')
@section('title','Dashboard del blog')

@section('main')
    <h1 class="ms-5 mt-4 mb-3 fw-bold">¡Hola {{Auth::user()->nombre}}!</h1>
    <div class="btn-agregar-publicacion d-flex justify-content-end mb-3">
        <a class="btn btn-form py-3 px-2" href="{{route('admin.blog.nueva')}}">Agregar publicacion</a>
    </div>
    <table class="tabla-admin table table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>Titulo</th>
            <th>Categoría</th>
            <th>Autor</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($publicaciones as $publicacion)
            <tr>
                <td>{{$publicacion->publicacion_id}}</td>
                {{--                <td>{{$publicacion->imagen_preview}}</td>--}}
                <td>{{$publicacion->titulo}}</td>
                <td>{{$publicacion->categoria->nombre}}</td>
                <td>{{$publicacion->usuario->nombre}} {{$publicacion->usuario->apellido}}</td>
                <td>
                    <a href="{{route('admin.blog.ver.publicacion', ['id' => $publicacion->publicacion_id])}}"
                       class="btn btn-ver me-3 ms-3">Ver publicación</a>
                    <a href="{{route('admin.blog.form.editar', ['id' => $publicacion->publicacion_id])}}"
                       class="btn btn-secondary me-3">Editar</a>
                    <a class="btn btn-danger"
                       href="{{route('admin.blog.ver.eliminar', ['id' => $publicacion->publicacion_id])}}">Eliminar</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
