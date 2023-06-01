@extends('layouts.main')

@section('title', 'Información suscripción ' . $suscripcion->nombre)

@section('main')
    <div class="container mt-5">
        <div class="row">
            <div class=" col-12 col-lg-6 d-flex justify-content-center d-lg-block text-center">
                <img src="../imgs/suscripcion-img-final.jpg" class="img-fluid" alt="imagen-ilustrativa-suscription-box">
            </div>
            <div class=" col-12 col-lg-6">
                <h1 class="text-center tipografia-titulo mt-5 mt-lg-0">{{$suscripcion->nombre}}</h1>
                <p class="text-center text-lg-start">{{$suscripcion->descripcion}}</p>
                @if($suscripcion->suscripcion_id === 1)
                <ul class="fa-ul ">
                    <li><i class="fa-li fa-solid fa-check li-b"></i>Envío gratis</li>
                    <li><i class="fa-li fa-solid fa-check li-b"></i>Mínimo 8 alimentos</li>
                    <li><i class="fa-li fa-solid fa-check li-b"></i>5% más barato que comprar individual</li>
                    <li><i class="fa-li fa-solid fa-check li-b"></i>Elección vegana, celíaca y para diabéticos</li>
                    <li><i class="fa-li fa-solid fa-check li-b"></i>Acumular puntos</li>
                </ul>
                @elseif($suscripcion->suscripcion_id === 2)
                    <ul class="fa-ul">
                        <li><i class="fa-li fa-solid fa-check li-s"></i>Envío gratis</li>
                        <li><i class="fa-li fa-solid fa-check li-s"></i>Mínimo 14 alimentos</li>
                        <li><i class="fa-li fa-solid fa-check li-s"></i>10% más barato que comprar individual</li>
                        <li><i class="fa-li fa-solid fa-check li-s"></i>Elección vegana, celíaca y para diabéticos</li>
                        <li><i class="fa-li fa-solid fa-check li-s"></i>Acumular puntos</li>
                    </ul>
                @elseif($suscripcion->suscripcion_id === 3)
                    <ul class="fa-ul">
                        <li><i class="fa-li fa-solid fa-check li-p"></i>Envío gratis</li>
                        <li><i class="fa-li fa-solid fa-check li-p"></i>Mínimo 20 alimentos</li>
                        <li><i class="fa-li fa-solid fa-check li-p"></i>15% más barato que comprar individual</li>
                        <li><i class="fa-li fa-solid fa-check li-p"></i>Elección vegana, celíaca y para diabéticos</li>
                        <li><i class="fa-li fa-solid fa-check li-p"></i>Acumular puntos</li>
                    </ul>
                @endif
                    <h3 class="tipografia-titulo text-center h4 mt-4">Elíge tu suscripción</h3>
                <form action="{{route('suscripcion.precheckout', ['id' => $suscripcion->suscripcion_id])}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="d-flex justify-content-between mt-4">
                        <div id="div-suscripcion-mensual" class="d-flex flex-column w-50 me-3">
                            <div class="d-flex justify-content-center">
                                <input type="radio" name="suscription_type" value="mensual" id="radioMensual" class="d-none">
                                <label for="mensual" class="h5 pt-2">Mensual</label>
                            </div>
                            <p class="text-center m-0 p-0">Precio final:</p>
                            <span class="fw-bold h4 text-center mt-2">${{round($suscripcion->precio_mensual)}}</span>
                        </div>

                        <div id="div-suscripcion-anual" class="d-flex flex-column w-50 ms-3">
                            <div class="d-flex justify-content-center">
                                <input type="radio" name="suscription_type" value="anual" id="radioAnual" class="d-none">
                                <label for="anual" class="h5 pt-2">Anual</label>
                            </div>
                            <p class="text-center m-0 p-0">Precio final:</p>
                            <span class="fw-bold h4 text-center mt-2">${{round($suscripcion->precio_anual)}}</span>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center mt-5">
                        <button type="submit" class="btn btn-info-suscripcion-estandar">Suscribirme</button>
                    </div>
                </form>
{{--                <a href="{{route('suscripcion.checkout', ['id' => $suscripcion->suscripcion_id])}}" class="btn btn-success m-auto text-center">Suscribirse</a>--}}
            </div>
        </div>
    </div>
    @pushonce('js')
        <script src="{{URL::asset('js/suscription-info.js')}}"></script>
    @endpushonce
@endsection
