@extends('layouts.main')
 @section('title', 'Checkout Suscripcion ' . $suscripcion->nombre)
@push('js')
            <script src="https://sdk.mercadopago.com/js/v2"></script>
            <script>
                const preferenceId = JSON.parse('{!! json_encode($preference->id) !!}');
                const publicKey = JSON.parse('{!! json_encode($publicKey) !!}');
                const mp = new MercadoPago("{{$publicKey}}", {
                    locale: 'es-AR'
                });
                mp.checkout({
                    preference: {
                        id: "{{$preference->id}}",
                    },
                    render: {
                        container: '#mp-wrapper',
                        label:'Pagar',
                    }
                });
            </script>
{{--    <script src="{{URL::asset('js/ajax-request-suscription.js')}}"></script>--}}
@endpush
@section('main')
{{--    @if($errors2 !== null)--}}
{{--    {{dd($errors2)}}--}}
{{--    @endif--}}
{{--{{dd($preference)}}--}}
    <h1 class="ms-5 mt-5 tipografia-titulo">Checkout</h1>
    @if($errors->any())
{{--        {{dd($errors)}}--}}
        <div class="div-error-general mb-3 d-flex align-items-center mt-3">
            <i class="fa-solid fa-circle-exclamation text-danger fs-3 ms-4"></i>
            <p class="fw-bold m-0 ms-3">Rellena todos los campos para poder suscribirte.</p>
        </div>
    @endif
    <section class="checkout-container container mt-5">
        <div class="row justify-content-center">
            <div class="checkout-form-container col-12 col-lg-8 order-2 order-lg-0">
                <form id="form-suscription" action="{{route('suscripcion.ejecutar', ['id' => $suscripcion->suscripcion_id])}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <h2 class="tipografia-titulo mt-5 mt-lg-0">Detalles de Facturación</h2>
                    <div class="d-flex flex-column flex-lg-row justify-content-lg-between mt-5 ">
                        <div class="mb-3 w-50 me-5">
                            <label for="nombre" class="form-label h5">Nombre<span class="text-danger">*</span>:</label>
                            <input
                                type="text"
                                class="form-control"
                                name="nombre"
                                id="nombre"
                                @error('nombre') aria-describedby="error-nombre" @enderror
                                value="{{old('nombre')}}"
                            >
                            @error('nombre')
                            <p class="text-danger campo_error" id="error-nombre">{{$message}}</p>
                            @enderror
                            <span class="text-danger nombre_error" id="error-nombre"></span>
                        </div>
                        <div class="w-50">
                            <label for="apellido" class="form-label h5">Apellido<span class="text-danger">*</span>:</label>
                            <input
                                type="text"
                                class="form-control"
                                name="apellido"
                                id="apellido"
                                @error('apellido') aria-describedby="error-apellido" @enderror
                                value="{{old('apellido')}}"
                            >
                            @error('apellido')
                            <p class="text-danger m" id="error-apellido">{{$message}}</p>
                            @enderror
                            <span class="text-danger apellido_error" id="error-apellido"></span>
                        </div>
                    </div>
                    <div class="d-flex flex-column flex-lg-row justify-content-lg-between mt-3">
                        <div class="mb-3 w-50 me-5">
                            <label for="email" class="form-label h5">Email<span class="text-danger">*</span>:</label>
                            <input
                                type="text"
                                class="form-control"
                                name="email"
                                id="email"
                                @error('email') aria-describedby="error-email" @enderror
                                value="{{old('email')}}"
                            >
                            @error('email')
                            <p class="text-danger" id="error-email">{{$message}}</p>
                            @enderror
                            <span class="text-danger email_error" id="error-email"></span>
                        </div>
                        <div class="w-50">
                            <label for="codigo_postal" class="form-label h5">Código postal<span class="text-danger">*</span>:</label>
                            <input
                                type="text"
                                class="form-control"
                                name="codigo_postal"
                                id="codigo_postal"
                                @error('codigo_postal') aria-describedby="error-codigo_postal" @enderror
                                value="{{old('codigo_postal')}}"
                            >
                            @error('codigo_postal')
                            <p class="text-danger m" id="error-codigo_postal">{{$message}}</p>
                            @enderror
                            <span class="text-danger codigo_postal_error" id="codigo_postal-error"></span>
                        </div>
                    </div>
                    <div class="d-flex flex-column flex-lg-row justify-content-lg-between mt-3">
                        <div class="mb-3 w-50 me-5">
                            <label for="provincia" class="form-label h5">Provincia<span class="text-danger">*</span>:</label>
                            <select
                                name="provincia"
                                id="provincia"
                                class="form-control px-5">
                                <option class="text-center"
                                    value="Tucuman"
                                >Tucumán
                                </option>
                            </select>
                        </div>
                        <div class="mb-3 w-50">
                            <label for="ciudad"class="form-label h5">Ciudad<span class="text-danger">*</span>:</label>
                            <input
                                type="text"
                                class="form-control"
                                name="ciudad"
                                id="ciudad"
                                @error('ciudad') aria-describedby="error-ciudad" @enderror
                                value="{{old('ciudad')}}"
                            >
                            @error('ciudad')
                            <p class="text-danger m" id="error-ciudad">{{$message}}</p>
                            @enderror
                            <span class="text-danger ciudad_error" id="error-ciudad"></span>
                        </div>
                    </div>
                    <div class="d-flex flex-column d-lg block w-lg-50 mb-3">
                        <label for="dirección_envio" class="form-label h5">Dirección de envío<span class="text-danger">*</span>:</label>
                        <input
                            type="text"
                            class="form-control"
                            name="direccion_envio"
                            id="direccion_envio"
                            @error('direccion_envio') aria-describedby="error-direccion_envio" @enderror
                            value="{{old('direccion_envio')}}"
                        >
                        @error('direccion_envio')
                        <p class="text-danger m" id="error-direccion_envio">{{$message}}</p>
                        @enderror
                        <span class="text-danger direccion_envio_error" id="error-direccion_envio"></span>
                    </div>
                    <section id="metodoDePago" class="mt-5">
                        <h2 class="tipografia-titulo">Método de pago</h2>
                        <div class="d-flex justify-content-between mt-4">
                            <div id="div-suscripcion-mensual" class="d-flex flex-column w-50 me-3">
                                <div class="ms-2 mt-2">
                                    <input
                                        type="radio"
                                        name="metodo_pago"
                                        value="mercadoPago"
                                        id="radioMensual"
                                        class=""
                                    >
                                    <img src="../../imgs/mercado-pago.svg" alt="" width="90" height="25">
                                </div>
                                    <label for="mensual" class="ms-4 mt-2">
                                        <p class="bold-not-as-dark d-inline">Mercado Pago:</p>
                                        <span class="d-inline">Pagá de diversas formas con Mercadopago</span>
                                    </label>
                            </div>

                            <div id="div-suscripcion-anual" class="d-flex flex-column w-50 ms-3">
                                <div class=" ms-2 mt-2">
                                    <input
                                        type="radio"
                                        name="metodo_pago"
                                        value="tarjetaCredito"
                                        id="radioAnual"
                                        class=""
                                    >
                                    <img src="../../imgs/mastercard.svg" alt="" width="40" height="25">
                                    <img src="../../imgs/visa.svg" alt="" width="40" height="25">
                                </div>
                                <label for="anual" class="ms-4 mt-2 label-metodo-pago">
                                    <p class="bold-not-as-dark d-inline">Tarjeta de crédito:</p>
                                    <span class="d-inline">Aceptamos tarjetas de crédito Visa y Mastercard, crédito y débito</span>
                                </label>
                            </div>
                        </div>
                        @error('metodo_pago')
                        <p class="text-danger mt-3" id="error-metodo_pago">{{$message}}</p>
                        @enderror
{{--                        <button type="submit" class="btn btn-info-suscripcion-estandar fw-bold mt-5 mb-5 px-4 py-2">Suscribirse--}}
{{--                        </button>--}}

                        <div id="mp-wrapper" class="mt-5"></div>
                    </section>
                    <div class="mt-4 d-none d-md-block">
                        <img src="https://imgmp.mlstatic.com/org-img/banners/ar/medios/785X40.jpg" title="Mercado Pago - Medios de pago" alt="Mercado Pago - Medios de pago" width="785" height="40"/>
                    </div>
                </form>
            </div>
            <div class="checkout-order-container col-12 col-lg-4">
                <h2 class="tipografia-titulo">Tu pedido</h2>
                <div class="contenedor-img-checkout-orden mt-4 d-flex flex-column justify-content-end">
                    <div class="info-checkout-orden d-flex flex-column align-items-center justify-content-center">
                        <div class="h5 fw-bold">Suscripción {{$suscripcion->nombre}}</div>
                        <div class="fw-bold">Temporalidad: {{$tipoSuscripcion}}</div>
                    </div>
                </div>
                <div class="resumen-checkout d-flex flex-column mt-5 px-3 py-3 justify-content-around">
                    <div class="d-flex justify-content-between">
                        <div>{{$tipoSuscripcion}}</div>
                        <div class="fw-bold">
                            @if($tipoSuscripcion === "Mensual")
                                ${{$suscripcion->precio_mensual}}
                            @elseif($tipoSuscripcion === "Anual")
                                ${{$suscripcion->precio_anual}}
                            @endif
                        </div>
                    </div>
                    <div class="d-flex justify-content-between">
                        <div>Costo de envío</div>
                        <div>Gratis</div>
                    </div>
                    <div class="d-flex justify-content-between">
                        <div class="fw-bold">TOTAL</div>
                        <div class="fw-bold">
                            @if($tipoSuscripcion === "Mensual")
                                ${{$suscripcion->precio_mensual}}
                            @elseif($tipoSuscripcion === "Anual")
                                ${{$suscripcion->precio_anual}}
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @pushonce('js')
        <script src="{{URL::asset('js/suscription-info.js')}}"></script>
    @endpushonce
@endsection
