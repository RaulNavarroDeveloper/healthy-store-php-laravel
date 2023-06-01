@extends('layouts.main')
@section('title', 'pendiente')

@section('main')
    <h1 class="mt-5 text-center tipografia-titulo">Tu pago se realizó pero se encuentra Pendiente</h1>
    <div class="d-flex justify-content-center animate__animated animate__backInDown">
        <i class='bx bx-info-circle'></i>
    </div>
    <div class="d-flex flex-column align-items-center mt-4">
        <p class="text-center h5">Te avisaremos por email el estado de tu pago!</p>
        <a href="{{route('home')}}" class="btn btn-info-suscripcion-estandar mt-3">Volver al inicio</a>
    </div>
@endsection
