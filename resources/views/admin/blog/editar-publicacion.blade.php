@extends('layouts.main-admin')
@section('title','Editar publicación')


@section('main')
    <h1 class="ms-5 mt-4">Editar entrada</h1>
    @if($errors->any())
        <div class="div-error-general mb-3 d-flex align-items-center mt-3">
            <i class="fa-solid fa-circle-exclamation text-danger fs-3 ms-4"></i>
            <p class="fw-bold m-0 ms-3">Hubo un error al editar la publicación. Revisa los requerimentos de los
                campos.</p>
        </div>
    @endif
    <form action="{{route('admin.blog.editar', ['id' => $publicacion->publicacion_id])}}" method="post"
          enctype="multipart/form-data" id="form-crud">
        @csrf
        <div class="mb-3">
            <label for="titulo" class="form-label h5">Título<span class="text-danger">*</span>:</label>
            <input
                type="text"
                name="titulo"
                id="titulo"
                class="form-control"
                @error('titulo') aria-describedby="error-titulo" @enderror
                value="{{old('titulo',$publicacion->titulo)}}"
            >
            @error('titulo')
            <p class="text-danger m" id="error-titulo">{{$message}}</p>
            @else
                <ul class="fa-ul my-auto mt-1">
                    <li><i class="fa-li fa-solid fa-check text-success"></i>Mínimo 10 caracteres</li>
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
                value="{{old('meta_title', $publicacion->meta_title)}}"
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
            >{{old('contenido', $publicacion->contenido)}}</textarea>
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
                        @selected($categoria->categoria_id == old('categoria_id', $publicacion->categoria_id))
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
            >{{old('resumen', $publicacion->resumen)}}</textarea>
            @error('resumen')
            <p class="text-danger" id="error-resumen">{{$message}}</p>
            @else
                <ul class="fa-ul my-auto mt-1">
                    <li><i class="fa-li fa-solid fa-check text-success"></i>Mínimo 25 caracteres</li>
                </ul>
            @enderror
        </div>
        <div class="mb-3">
            <h3>Portada actual:</h3>
            @if($publicacion->imagen != null && file_exists(public_path('imgs/' . $publicacion->imagen)))
                <img src="{{url('imgs/imgs-preview/' . $publicacion->imagen_preview)}}">

            @else
                <p>Sin portada</p>
            @endif
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
        <input type="hidden" name="imagen_preview" id="imagen_preview" value="{{$publicacion->imagen_preview}}">
        <div class="m-auto">
            <button type="submit" class="btn btn-form px-3 mt-4">Editar Publicación</button>
        </div>
    </form>
@endsection

