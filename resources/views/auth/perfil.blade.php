<?php
/** @var \Illuminate\Database\Eloquent\Collection|\App\Models\UsuarioSuscripto[] $suscripcionActiva */
?>
@extends('layouts.main')
@section('title', 'Detalle Usuario ' . $usuario->nombre )

@section('main')
{{--        {{var_dump($suscripcionActiva)}}--}}
    <section class="container">
        <div class="row mb-5 mt-5">
            <div class="col-12 col-lg-4 p-0 resumen-perfil mb-5 mb-lg-0 mt-4 mt-lg-0">
                <div class="border border-4 border-black me-5">
                    <div class="d-flex justify-content-center mt-5">
                        <img class="img-fluid rounded-circle" src="https://via.placeholder.com/175" alt="{{"imagen-perfil-de-" . $usuario->nombre . "-" . $usuario->apellido}}">
                    </div>
                    <h1 class="mt-4 text-center">{{$usuario->nombre}} {{$usuario->apellido}}</h1>
                    <div
                        @class([
                                'div-suscripcion',
                                'rounded-pill',
                                 'm-auto',
                                  'mt-4',
                                'no-suscrito' => !$suscripcionActiva || $suscripcionActiva->status == 'inactivo',
                                'suscripcion-basica' =>  $suscripcionActiva && $suscripcionActiva->status == 'activo' && $suscripcionActiva->suscripcion_id == 1,
                                'suscripcion-estandar' =>  $suscripcionActiva && $suscripcionActiva->status == 'activo' && $suscripcionActiva->suscripcion_id == 2,
                                'suscripcion-premium' =>  $suscripcionActiva && $suscripcionActiva->status == 'activo' && $suscripcionActiva->suscripcion_id == 3,
                            ])
                    >
                        <p class="py-2 px-3 text-center fw-bold h5">
                            {{!$suscripcionActiva || $suscripcionActiva->status == 'inactivo' ? 'No Suscrito' : $suscripcionActiva->nombre}}
                        </p>
                    </div >
                    <div class="d-flex justify-content-center">
                    @if(!$suscripcionActiva || $suscripcionActiva->status == "inactivo")
                        <a class="text-decoration-none" href="{{route('suscripcion.pricing')}}">Suscribite ahora</a>
                    @else()
                        <a class="text-decoration-none mt-2" data-bs-target="#modalSuscripcion" data-bs-toggle="modal" href="#">Más información de tu suscripción</a>
                    @endif
                    </div>
                    <div class="d-flex flex-column align-items-center mt-4">
                        <ul class="fa-ul">
                            <li><i class="fa-li fa-solid fa-location-dot me-2"></i>Argentina</li>
                            <li><i class="fa-li fa-solid fa-phone me-2 "></i>+54 381 4576054</li>
                            <li><i class="fa-li fa-solid fa-envelope me-2"></i>{{$usuario->email}}</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-4 p-0">
                <div class="detalle-cuenta-y-total me-5 d-flex flex-column justify-content-between mb-5 mb-lg-0">
                    <div class="detalle-cuenta border border-4 border-black mb-0 mb-lg-5">
                        <h2 class="h4 text-center mt-3 mb-3">Detalles de la cuenta</h2>
                        <p class="d-flex justify-content-around"><span class="span-detalle">Nombre:</span><span>{{$usuario->nombre}}</span></p>
                        <p class="d-flex justify-content-around"><span class="span-detalle">Apellido:</span><span>{{$usuario->apellido}}</span></p>
                        <p class="d-flex justify-content-around"><span class="span-detalle">Nacimiento:</span><span>{{$usuario->fecha_nacimiento}}</span></p>
                        <p class="d-flex justify-content-around"><span class="span-detalle">Género:</span><span>Masculino</span></p>
                    </div>

                    <div class="total-consumido border border-4 border-black">
                        <h2 class="h4 text-center mt-3">Actividad</h2>
                    </div>
                </div>
            </div>
            <div class="metodos-pago col-12 col-lg-4 p-0">
                <div class="border border-4 border-black">
                    <h2 class="h3 mt-3 text-center">Métodos de pago</h2>
                    <div class="d-flex"></div>
                </div>
            </div>
            @if($suscripcionActiva)
            <x-modal :suscripcion-activa="$suscripcionActiva"/>
            @endif
        </div>
    </section>
@endsection
