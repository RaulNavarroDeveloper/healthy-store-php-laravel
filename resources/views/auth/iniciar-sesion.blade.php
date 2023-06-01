@extends('layouts.main')

@section('title', 'Iniciar Sesión')

@section('main')
    <h1 class="ms-5 mt-4">Iniciar Sesión</h1>
    @if($errors->any())
        <div class="div-error-general mb-3 d-flex align-items-center mt-3">
            <i class="fa-solid fa-circle-exclamation text-danger fs-3 ms-4"></i>
            <p class="fw-bold m-0 ms-3">Hubo un error al iniciar sesión</p>
        </div>
    @endif
    <form action="{{route('auth.iniciar.sesion.ejecutar')}}" method="post" enctype="multipart/form-data" id="form-crud" novalidate>
        @csrf
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
            @enderror
        </div>
        <div class="m-auto d-flex flex-column align-items-center">
            <button type="submit" class="btn btn-form px-5 py-3 mt-4 ">Iniciar Sesión</button>
            <p class="mt-5">¿Aún no tienes una cuenta? <a href="{{route('auth.registro.form')}}" class="text-decoration-none">Haz click aquí para
                    registrarte</a></p>
        </div>
    </form>
    <script src="{{URL::asset('js/toggle-eye-password.js')}}"></script>
@endsection
