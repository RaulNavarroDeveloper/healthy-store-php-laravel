<?php
/** @var \Illuminate\Database\Eloquent\Collection|\App\Models\Usuario[] $dataUsuarios */
?>
@extends('layouts.main-admin')
@section('title', 'Dashboard de Usuarios')

@section('main')
{{--    {{var_dump($dataUsuarios->groupBy('usuarios.usuario_id'))}}--}}
    <h1 class="mt-3 ms-5">Dashboard de Usuarios</h1>
    <table class="table-usuarios my-5 mx-auto">
        <thead>
            <tr>
                <th>Usuario</th>
                <th class="text-center">Email</th>
                <th>Total Consumido</th>
                <th>Status Usuario</th>
                <th>Fecha Suscripción</th>
            </tr>
        </thead>
        <tbody>
            @foreach($dataUsuarios as $usuario)
                <tr>
                    <td><i class="fa-regular fa-user me-2"></i> <a class="text-decoration-none" href="{{route('usuario.detalle', ['id' => $usuario->usuario_id])}}">{{$usuario->nombre}} {{$usuario->apellido}}</a></td>
                    <td class="text-center">{{$usuario->email}}</td>
                    <td class="text-center">{{$usuario->total_comprado}}</td>
                    <td class="text-center">{{ucfirst($usuario->status)}}</td>
                    <td class="text-center">{{$usuario->fecha_suscripcion}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
