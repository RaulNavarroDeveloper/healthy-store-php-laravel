@extends('layouts.main')
@section('title', 'Precios de Suscripciones')

@section('main')
    <h1 class="tipografia-titulo text-center mt-4 mb-4">Precios de Suscripciones</h1>
    <div class="container mt-5">
        <div class="row-pricing row justify-content-center justify-content-lg-between">
            <div id="pricing-div" class="pd-b col-lg-4 mb-5 mb-lg-0 h-100">
                <h3 class="tipografia-titulo text-center mt-3">Básico</h3>
                <div class="div-precio-b m-auto py-2 text-center mt-4">
                    <p class="mb-0"><span class="fs-2 fw-bold">$2499</span>/mes</p>
                </div>
                <ul class="mt-5 fa-ul">
                    <li><i class="fa-li fa-solid fa-check li-b"></i>Envío gratis</li>
                    <li><i class="fa-li fa-solid fa-check li-b"></i>Mínimo 8 alimentos</li>
                    <li><i class="fa-li fa-solid fa-check li-b"></i>5% más barato que comprar individual</li>
                    <li><i class="fa-li fa-solid fa-check li-b"></i>Elección vegana, celíaca y para diabéticos</li>
                    <li><i class="fa-li fa-solid fa-check li-b"></i>Acumular puntos</li>
                </ul>
                <x-button suscriptionType="basico" action="Suscribíte a Básico" suscriptionId="{{1}}"/>
            </div>

            <div class="w-100 d-lg-none"></div>

            <div id="pricing-div" class="pd-s col-lg-4 mb-5 mb-lg-0 h-100">
                <h3 class="tipografia-titulo text-center mt-3">Estándar</h3>
                <div class="div-precio-s m-auto py-2 text-center mt-4">
                    <p class="mb-0"><span class="fs-2 fw-bold">$3899</span>/mes</p>
                </div>
                <ul class="mt-5 fa-ul">
                    <li><i class="fa-li fa-solid fa-check li-s"></i>Envío gratis</li>
                    <li><i class="fa-li fa-solid fa-check li-s"></i>Mínimo 14 alimentos</li>
                    <li><i class="fa-li fa-solid fa-check li-s"></i>10% más barato que comprar individual</li>
                    <li><i class="fa-li fa-solid fa-check li-s"></i>Elección vegana, celíaca y para diabéticos</li>
                    <li><i class="fa-li fa-solid fa-check li-s"></i>Acumular puntos</li>
                </ul>
                <x-button suscriptionType="estandar" action="Suscribíte a Estándar" suscriptionId="{{2}}" />
            </div>

            <div class="w-100 d-lg-none"></div>

            <div id="pricing-div" class="pd-p col-lg-4 h-100">
                <h3 class="tipografia-titulo text-center mt-3">Premium</h3>
                <div class="div-precio-p m-auto py-2 text-center mt-4">
                    <p class="mb-0"><span class="fs-2 fw-bold">$5899</span>/mes</p>
                </div>
                <ul class="mt-5 fa-ul">
                    <li><i class="fa-li fa-solid fa-check li-p"></i>Envío gratis</li>
                    <li><i class="fa-li fa-solid fa-check li-p"></i>Mínimo 20 alimentos</li>
                    <li><i class="fa-li fa-solid fa-check li-p"></i>15% más barato que comprar individual</li>
                    <li><i class="fa-li fa-solid fa-check li-p"></i>Elección vegana, celíaca y para diabéticos</li>
                    <li><i class="fa-li fa-solid fa-check li-p"></i>Acumular puntos</li>
                </ul>
                <x-button suscriptionType="premium" action="Suscribíte a Premium" suscriptionId="{{3}}"/>
            </div>
        </div>
    </div>
@endsection
