@extends('layouts.main')

@section('title', 'Registro')

@section('main')
    <h1 class="ms-5 mt-4 mb-3">Registro de usuarios</h1>
    @if($errors->any())
        <div class="div-error-general mb-3 d-flex align-items-center mt-3">
            <i class="fa-solid fa-circle-exclamation text-danger fs-3 ms-4"></i>
            <p class="fw-bold m-0 ms-3">Hubo un error al registrarte. Revisa los requerimentos de los
                campos.</p>
        </div>
    @endif
    <form action="{{route('auth.registro.ejecutar')}}" method="post" enctype="multipart/form-data" id="form-crud"
          novalidate>
        @csrf
        <div class="mb-3 w-50 mx-auto">
            <label for="nombre" class="form-label">Nombre<span class="text-danger">*</span></label>
            <input
                type="text"
                name="nombre"
                id="nombre"
                class="form-control"
                @error('nombre') aria-describedby="error-nombre" @enderror
                value="{{old('nombre')}}"
            >
            @error('nombre')
            <p class="text-danger m" id="error-titulo">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-3 w-50 mx-auto">
            <label for="apellido" class="form-label">Apellido<span class="text-danger">*</span></label>
            <input
                type="text"
                name="apellido"
                id="apellido"
                class="form-control"
                @error('apellido') aria-describedby="error-apellido" @enderror
                value="{{old('apellido')}}"
            >
            @error('apellido')
            <p class="text-danger m" id="error-titulo">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-3 w-50 mx-auto">
            <label for="email" class="form-label">Fecha de Nacimiento<span class="text-danger">*</span></label>
            <input
                type="date"
                class="form-control"
                id="fecha_nacimiento"
                name="fecha_nacimiento"
                @error('fecha_nacimiento') aria-describedby="error-fecha_nacimiento" @enderror
                value="{{old('fecha_nacimiento')}}"
            >
            @error('fecha_nacimiento')
            <p class="text-danger m" id="error-email">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-3 w-50 mx-auto">
            <label for="email" class="form-label">Email<span class="text-danger">*</span></label>
            <input
                type="email"
                class="form-control"
                id="email"
                name="email"
                @error('email') aria-describedby="error-email" @enderror
                value="{{old('email')}}"
            >
            @error('email')
            <p class="text-danger m" id="error-email">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-3 w-50 mx-auto">
            <label for="password" class="form-label">Password<span class="text-danger">*</span></label>
            <div class="mx-0 w-100 d-flex align-items-center">
                <input
                    type="password"
                    class="form-control"
                    id="password"
                    name="password"
                    @error('password') aria-describedby="error-password" @enderror
                    value="{{old('password')}}"
                >
                <i id="eye-icon" class="fa-regular fa-eye fs-4"></i>
            </div>
            @error('password')
            <p class="text-danger m" id="error-password">{{$message}}</p>
            @else
                <ul class="fa-ul my-auto mt-3">
                    <li><i class="fa-li fa-solid fa-check text-success"></i>Mínimo 8 caracteres</li>
                </ul>
            @enderror
        </div>
        <div class="m-auto d-flex flex-column align-items-center">
            <button type="submit" class="btn btn-form px-5 py-3 mt-4 ">Registrarte</button>
            <p class="mt-5">¿Ya tienes una cuenta? <a href="{{route('auth.iniciar.sesion.form')}}" class="text-decoration-none">Haz click aquí para iniciar sesion</a></p>
        </div>
    </form>
    <script src="{{URL::asset('js/toggle-eye-password.js')}}"></script>
@endsection
