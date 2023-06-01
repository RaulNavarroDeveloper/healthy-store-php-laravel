@extends('layouts.main')
<!-- Crear reseñas o calificaciones -->
@section('title', 'Inicio')
@section('main')
    <header id="header-carrusell">
        <div class="w-100">
            <picture>
                <source srcset="imgs\home\carrusel-mobile-01.jpg" media="(max-width: 768px)">
                <img src="imgs\home\carrusel-pc-01.jpg" class="d-block w-100 carrusel-pc" alt="healthy-box-cajas-con-hasta-36-alimentos-saludables">
            </picture>
        </div>
    </header>

    <h1 class="tipografia-titulo mt-5 mx-0 text-center">¿Cómo funciona la suscripción?</h1>
    <section id="pastillas">

        <div class="container mt-5">
            <div class="row">
                <div class="col-md-4 mb-5 mb-md-0">
                    <figure class="d-flex justify-content-center">
                        <img class="mx-auto" src="imgs/home/pill-1.png" alt="pastilla-de-seleccion-de-tipo-de-caja">
                    </figure>

                    <div>
                        <h2 class="text-center pb-2 h4 tipografia-titulo">Selecciona tu plan y tipo de caja</h2>
                        <p class="text-center">Hay diferentes planes y tipos de cajas según tu dieta y preferencias personales.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-5 mb-md-0">
                    <figure class="d-flex justify-content-center">
                        <img class="mx-auto" src="imgs/home/pill-2.png" alt="pastilla-seleccion-delivery">
                    </figure>

                    <div>
                        <h2 class="text-center pb-2 h4 tipografia-titulo">Selecciona la fecha de delivery</h2>
                        <p class="text-center">Puedes esperar hasta el 15 de cada mes para recibir tu caja o simplemente pedirla para cualquier momento!</p>
                    </div>
                </div>
                <div class="col-md-4 mb-5 mb-md-0">
                    <figure class="d-flex justify-content-center">
                        <img class="mx-auto" src="imgs/home/pill-3.png" alt="pastilla-de-envios-gratis">
                    </figure>

                    <div>
                        <h2 class="text-center pb-2 h4 tipografia-titulo">Envíos gratis a cualquier parte de Argentina</h2>
                        <p class="text-center">Nosotros nos encargamos del envío, para que disfrutes de nuestras cajas saludables.</p>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <h2 class="mt-5 mx-0 text-center tipografia-titulo">Planes de Suscripción</h2>
{{--        <div class="toggle-temporalidad">--}}
{{--            <label class="toggle">--}}
{{--                <input type="checkbox">--}}
{{--                <span class="slider"></span>--}}
{{--                <span class="label">Mensual</span>--}}
{{--                <span class="label">Anual</span>--}}
{{--            </label>--}}
{{--        </div>--}}
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
    </section>


@endsection

@section('main2')
    <h2>Footer</h2>
@endsection


