@extends('layouts.main')
@section('title', 'fallo')

@section('main')
    <h1 class="mt-5 text-center tipografia-titulo">Tu pago fue rechazado!</h1>
    <div class="d-flex justify-content-center animate__animated animate__backInDown">
        <i class='bx bx-error-circle'></i>
    </div>
    <div class="d-flex flex-column align-items-center mt-4">
        <p class="text-center h5 w-75">Sucedió un error inesperado mientras se procesaba tu pago. Puedes volver a intentarlo y si tienes incovenientes no dudes en contactar a soporte.</p>
        <a href="{{route('home')}}" class="btn btn-info-suscripcion-estandar mt-3">Volver a intetarlo</a>
    </div>
@endsection
