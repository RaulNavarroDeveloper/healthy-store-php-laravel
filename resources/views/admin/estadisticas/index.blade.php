@extends("layouts.main-admin")
@section('title', 'Estadísticas del sitio')
@section('main')
    <h1 class="ms-5 mt-5">Estadísticas</h1>
{{--    {{dd($suscripcionesPorTemporalidad)}}--}}
    <section id="contenedorGraficos1" class="container mt-4">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-8 charts">
                <div class="mb-5 me-5">
                    <h2 class="h4 mb-3 text-center">Ingresos Mensuales</h2>
                    <div class="d-flex flex-column align-items-center">
                        <canvas id="chartIngresosPorMes"></canvas>
                    </div>
                </div>
                <div class="mb-5 me-5">
                    <h2 class="h4 mb-3 text-center">Suscripciones Mensuales</h2>
                    <div class="d-flex flex-column align-items-center">
                        <canvas id="chartSuscriptoresPorMes"></canvas>
                    </div>
                </div>
                <div class="mb-5 me-5">
                    <h2 class="h4 mb-3 text-center">Ingresos por cada Suscripción</h2>
                    <div class="d-flex flex-column align-items-center">
                        <canvas id="chartIngresoPorSuscripcion"></canvas>
                    </div>
                </div>
                <div class="mb-5 me-5">
                    <h2 class="h4 mb-3 text-center">Usuarios Suscriptos Temporalidad</h2>
                    <div class="d-flex flex-column align-items-center">
                        <canvas id="chartSuscriptoresTemporalidad"></canvas>
                    </div>
                </div>
            </div>
            <div id="estadisticasOverview" class="col-12 col-md-6 col-lg-4">
                <h2 class="text-center tipografia-titulo mt-3">Overview</h2>
                <div class="overview-contenedor d-flex justify-content-between align-items-center mt-3">
                    <div class="d-flex justify-content-center align-items-center ms-3">
                        <i class='bx bx-dollar-circle fs-1 bx-overview'></i>
                    </div>
                    <div class="d-flex flex-column align-items-center me-3">
                        <h3 class="h4 tipografia-titulo">${{round($facturacionTotal)}}</h3>
                        <span class="tipografia-titulo bold-not-as-dark text-center">Facturación Total</span>
                    </div>

                </div>
                <div class="overview-contenedor d-flex justify-content-between align-items-center mt-3">
                    <div class="d-flex justify-content-center align-items-center ms-3">
                        <i class='bx bxs-coupon fs-1 bx-overview'></i>
                    </div>
                    <div class="d-flex flex-column align-items-center me-3">
                        <h3 class="h4 tipografia-titulo">${{$ticketPromedio}}</h3>
                        <span class="tipografia-titulo bold-not-as-dark text-center">Ticket Promedio</span>
                    </div>

                </div>
                <div class="overview-contenedor d-flex justify-content-between align-items-center mt-3">
                    <div class="d-flex justify-content-center align-items-center ms-3">
                        <i class='bx bxs-user-badge fs-1 bx-overview'></i>
                    </div>
                    <div class="d-flex flex-column align-items-center me-3">
                        <h3 class="h4 tipografia-titulo">{{$cantidadSuscriptores}}</h3>
                        <span class="tipografia-titulo bold-not-as-dark text-center">Cantidad Suscriptores</span>
                    </div>

                </div>
                <div class="overview-contenedor d-flex justify-content-between align-items-center mt-3">
                    <div class="d-flex justify-content-center align-items-center ms-3">
                        <i class='bx bxs-user fs-1 bx-overview'></i>
                    </div>
                    <div class="d-flex flex-column align-items-center me-3">
                        <h3 class="h4 tipografia-titulo">{{$cantidadUsuarios}}</h3>
                        <span class="tipografia-titulo bold-not-as-dark text-center">Usuarios Registrados</span>
                    </div>

                </div>
                <div class="overview-contenedor d-flex justify-content-between align-items-center mt-3">
                    <div class="d-flex justify-content-center align-items-center ms-3">
                        <i class='bx bxs-error-alt fs-1 bx-overview'></i>
                    </div>
                    <div class="d-flex flex-column align-items-center">
                        <h3 class="h4 tipografia-titulo">{{$suscripcionesAbandonadas}}</h3>
                        <div class="tipografia-titulo bold-not-as-dark text-center">Suscripciones Abandonadas</div>
                    </div>

                </div>
{{--                <div class="d-flex flex-column align-items-center">--}}
{{--                    <canvas id="chartIngresoPorSuscripcion"></canvas>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-12 col-md-6 col-lg-8">--}}
{{--                <h2 class="h5 mb-2 text-center">Suscripciones Mensuales</h2>--}}
{{--                <div class="d-flex flex-column align-items-center">--}}
{{--                    <canvas id="chartSuscriptoresPorMes"></canvas>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-12 col-md-6 col-lg-4">--}}
{{--                <h2 class="h5 mb-2 text-center">Ingresos por cada Suscripción</h2>--}}
{{--                <div class="d-flex flex-column align-items-center">--}}
{{--                    <canvas id="chartIngresoPorSuscripcion"></canvas>--}}
{{--                </div>--}}
            </div>
        </div>
    </section>
{{--    <section id="contenedorGraficos2" class="container mt-5 mb-5">--}}
{{--        <div class="row">--}}
{{--            <div class="col-12 col-md-6 col-lg-8">--}}
{{--                <h2 class="h5 mb-2 text-center">Suscripciones Mensuales</h2>--}}
{{--                <div class="d-flex flex-column align-items-center">--}}
{{--                    <canvas id="chartSuscriptoresPorMes"></canvas>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-12 col-md-6 col-lg-4">--}}
{{--                <div class="d-flex flex-column align-items-center">--}}
{{--                <canvas id="chartTemporalidades"></canvas>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-12 col-md-6 col-lg-4">--}}
{{--                <div class="">--}}

{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        --}}{{--    <canvas id="myChart"></canvas>--}}
{{--    </section>--}}
    <section id="contenedorGraficos3" class="">
        <div class="row">

        </div>
        {{--    <canvas id="myChart"></canvas>--}}
    </section>
@endsection

@pushonce('js')
    <script type="text/javascript">
        //Chart ingresos por suscripción
        let nombresSuscripcion = JSON.parse('{!! json_encode($nombresSuscripciones) !!}');
        let dataIngresosPorSuscripcion = JSON.parse('{!! json_encode($ingresosPorSuscripcion) !!}');
        //Chart ingresos por mes
        let ingresosPorMes = JSON.parse('{!! json_encode(array_keys($ingresosPorMes)) !!}');
        let mesesIngresos = JSON.parse('{!! json_encode($mesesNombreIngresos) !!}');
        // Chart suscriptores por mes
        let suscriptoresPorMes = JSON.parse('{!! json_encode(array_values($suscriptoresPorMes)) !!}');
        let mesesSuscripciones = JSON.parse('{!! json_encode($mesesNombreSuscripciones) !!}');
        // Chart suscriptores por temporalidad
        let tipoSuscripciones = JSON.parse('{!! json_encode(array_keys($suscripcionesPorTemporalidad)) !!}');
        let suscripcionPorTemporalidad = JSON.parse('{!! json_encode(array_values($suscripcionesPorTemporalidad)) !!}');

    </script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="{{URL::asset('js/admin-charts.js')}}"></script>

@endpushonce
