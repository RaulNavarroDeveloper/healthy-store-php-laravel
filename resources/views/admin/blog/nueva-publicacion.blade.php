@extends('layouts.main-admin')
@section('title','Publicar nueva entrada')

@section('main')
    <h1 class="ms-5 mt-4">Publicar nueva entrada</h1>
    @if($errors->any())
        <div class="div-error-general mb-3 d-flex align-items-center mt-3">
            <i class="fa-solid fa-circle-exclamation text-danger fs-3 ms-4"></i>
            <p class="fw-bold m-0 ms-3">Hubo un error al subir la publicación. Revisa los requerimentos de los
                campos.</p>
        </div>
    @endif
    <form action="{{route('admin.blog.publicar')}}" method="post" enctype="multipart/form-data" id="form-crud">
        @csrf
        <div class="mb-3">
            <label for="titulo" class="form-label h5">Título<span class="text-danger">*</span>:</label>
            <input
                type="text"
                name="titulo"
                id="titulo"
                class="form-control"
                @error('titulo') aria-describedby="error-titulo" @enderror
                value="{{old('titulo')}}"
            >
            @error('titulo')
            <p class="text-danger m" id="error-titulo">{{$message}}</p>
            @else
                <ul class="fa-ul my-auto mt-1">
                    <li><i class="fa-li fa-regular fa-circle-question text-warning"></i>Mínimo 10 caracteres</li>
                </ul>
            @enderror
        </div>
        <div class="mb-3">
            <label for="meta_title" class="form-label h5">Meta-title:</label>
            <input
                type="text"
                name="meta_title"
                id="meta_title"
                class="form-control"
            >
        </div>
        <div class="mb-3">
            <label for="contenido" class="form-label h5">Contenido<span class="text-danger">*</span>:</label>
            <textarea
                type="text"
                name="contenido"
                id="contenido"
                class="form-control"
                rows="12"
                @error('contenido') aria-describedby="error-contenido" @enderror
            >{{old('contenido')}}</textarea>
            @error('contenido')
            <p class="text-danger" id="error-contenido">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-3 d-flex flex-column">
            <label for="categoria_id" class="form-label h5">Categoria:</label>
            <select
                name="categoria_id"
                id="categoria_id"
                class="w-25 p-2 rounded"
                @error('categoria') aria-describedby="error-categoria" @enderror
            >
                @foreach($categorias as $categoria)
                    <option
                        value="{{$categoria->categoria_id}}"
                        @selected($categoria->categoria_id == old('categoria_id'))
                    >
                        {{$categoria->nombre}}
                    </option>
                @endforeach
            </select>
            @error('categoria')
            <p class="text-danger" id="error-categoria">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="resumen" class="form-label h5">Resumen<span class="text-danger">*</span>:</label>
            <textarea
                type="text"
                name="resumen"
                id="resumen"
                class="form-control"
                rows="12"
                @error('resumen') aria-describedby="error-resumen" @enderror
            >{{old('resumen')}}</textarea>
            @error('resumen')
            <p class="text-danger" id="error-resumen">{{$message}}</p>
            @else
                <ul class="fa-ul my-auto mt-1">
                    <li><i class="fa-li fa-regular fa-circle-question text-warning"></i>Mínimo 25 caracteres</li>
                </ul>
            @enderror
        </div>
        <div class="mb-3">
            <label for="imagen" class="form-label h5">Imagen:</label>
            <input
                type="file"
                name="imagen"
                id="imagen"
                class="form-control"
                @error('imagen') aria-describedby="error-imagen" @enderror
            >
            @error('imagen')
            <p class="text-danger" id="error-imagen">{{$message}}</p>
            @else
                <ul class="fa-ul my-auto mt-1">
                    <li><i class="fa-li fa-regular fa-circle-question text-warning"></i>Máximo 5MB</li>
                </ul>
            @enderror
        </div>
        <input type="hidden" name="usuario_id" id="usuario_id" value="{{Auth::id()}}">
        <input type="hidden" name="imagen_preview" id="imagen_preview" value="{{null}}">
        <div class="m-auto">
            <button type="submit" class="btn btn-form px-3 mt-4">Publicar Entrada</button>
        </div>
    </form>
@endsection
