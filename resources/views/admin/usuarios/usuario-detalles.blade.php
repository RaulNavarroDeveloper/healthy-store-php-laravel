<?php
    /** @var \App\Models\Usuario $usuario */
    /** @var \Illuminate\Database\Eloquent\Collection|\App\Models\Usuario[] $dataActividad */

?>
@extends('layouts.main-admin')

@section('title', 'Detalle Usuario ' . $usuario->nombre )

@section('main')
{{--    {{var_dump($suscripcionActiva)}}--}}
    <section class="container">
        <div class="row mb-5 mt-5">
            <div class="col-12 col-lg-4 p-0 resumen-perfil mb-5 mb-lg-0 mt-4 mt-lg-0">
                <div class="border border-4 border-black me-5">
                    <div class="d-flex justify-content-center mt-5">
                        <img class="img-fluid rounded-circle" src="https://via.placeholder.com/175" alt="{{"imagen-perfil-de-" . $usuario->nombre . "-" . $usuario->apellido}}">
                    </div>
                    <h1 class="mt-4 text-center">{{$usuario->nombre}} {{$usuario->apellido}}</h1>
                    <div
{{--                        @class([--}}
{{--                            'div-suscripcion',--}}
{{--                            'rounded-pill',--}}
{{--                             'm-auto',--}}
{{--                              'mt-4',--}}
{{--                            'no-suscrito' => !$suscripcionActiva,--}}
{{--                            'suscripcion-basica' => $usuario->suscripcion_activa == 1,--}}
{{--                            'suscripcion-estandar' => $usuario->suscripcion_activa == 2,--}}
{{--                            'suscripcion-premium' => $usuario->suscripcion_activa == 3,--}}
{{--                        ])--}}
                    >
                        <p class="py-2 px-3 text-center fw-bold h5">
{{--                            {{!$suscripcionActiva ? 'No Suscrito' : $suscripcionActiva->nombre}}--}}
                        </p>
                    </div >
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
                        <h2 class="h4 text-center mt-3 mb-3">Detalles del usuario</h2>
                        <p class="d-flex justify-content-around"><span class="span-detalle">Nombre:</span><span>{{$usuario->nombre}}</span></p>
                        <p class="d-flex justify-content-around"><span class="span-detalle">Apellido:</span><span>{{$usuario->apellido}}</span></p>
                        <p class="d-flex justify-content-around"><span class="span-detalle">Nacimiento:</span><span>{{$usuario->fecha_nacimiento}}</span></p>
                        <p class="d-flex justify-content-around"><span class="span-detalle">Género:</span><span>Masculino</span></p>
                    </div>

                    <div class="total-consumido border border-4 border-black">
                        <h2 class="h4 text-center mt-3">Actividad</h2>
                        <table class="table table-stripped">
                            <thead>
                                <tr>
                                    <th>Total consumido</th>
                                    <th>Ventas</th>
                                    <th>Consultas</th>
                                </tr>
                            </thead>
                            <tbody>
{{--                            @if(count($dataActividad) > 0)--}}

                                <tr>
{{--                                    <td class="text-center">${{$total}}</td>--}}
{{--                                    <td class="text-center">{{count($dataActividad)}}</td>--}}
{{--                                    <td class="text-center"></td>--}}
{{--                                    <td class="text-center"></td>--}}
{{--                                    <td class="text-center">0</td>--}}
                                </tr>
{{--                            @else--}}
                                <tr>
                                    <td class="text-center">$0.00</td>
                                    <td class="text-center">0</td>
                                    <td class="text-center">0</td>
                                </tr>
{{--                            @endif--}}

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="metodos-pago col-12 col-lg-4 p-0">
                <div class="border border-4 border-black">
                    <h2 class="h3 mt-3 text-center">Métodos de pago</h2>
                        <div class="d-flex"></div>
                </div>
            </div>
        </div>
        <h2 class="mb-4 mt-5">Últimas Compras</h2>
        <div class="row">
            <table class="suscripciones col-12 table-usuarios py-3 m-auto">
                <thead>
                <tr>
                    <th class="text-center">Suscripcion ID</th>
                    <th class="text-center">Suscripcion</th>
                    <th class="text-center">Fecha Suscripcion</th>
                    <th class="text-center">Temporalidad</th>
                    <th class="text-center">Fecha Finalización</th>
                </tr>
                </thead>
                @if(count($dataCompras) > 0)
                <tbody>
                    @foreach($dataCompras as $data)
                        <tr>
                            <td class="text-center">{{$data->usuario_suscripto_id}}</td>
                            <td class="text-center">{{$data->nombre}}</td>
                            <td class="text-center">{{$data->fecha_suscripcion}}</td>
                            <td class="text-center">{{$data->tipo_suscripcion}}</td>
                            <td class="text-center">{{$data->fecha_finalizacion}}</td>
                        </tr>
                    @endforeach
                </tbody>
                @else
                    <tfoot>
                    <tr>
                        <td></td>
                        <td></td>
                        <td class="text-center ms-5"><h3>Este usuario no realizó compras</h3></td>
                        <td></td>
                    </tr>
                    </tfoot>
                @endif
            </table>
        </div>
    </section>
@endsection
