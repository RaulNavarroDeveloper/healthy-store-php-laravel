@extends('layouts.main')
@section('title', 'success')

@section('main')
    <h1 class="mt-5 text-center tipografia-titulo">Felicidades, te acabas de suscribir a Healthy Box</h1>
    <div class="d-flex justify-content-center animate__animated animate__backInDown">
        <i class='bx bx-check-circle text-success'></i>
    </div>
    <div class="d-flex flex-column align-items-center mt-4">
        <p class="text-center h5">Ahora puedes conocer más información sobre tu cuenta</p>
        <a href="{{route('perfil', ['usuario_id' => $usuario->usuario_id])}}" class="btn btn-info-suscripcion-estandar mt-3">Ir a mi perfil</a>
    </div>

@endsection
