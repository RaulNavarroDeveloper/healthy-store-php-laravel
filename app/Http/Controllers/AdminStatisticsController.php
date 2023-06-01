<?php
namespace App\Http\Controllers;

use App\Models\CancelacionSuscripcion;
use App\Models\Usuario;
use App\Models\UsuarioSuscripto;
use App\DateFormatter\ConvertMonthToName;

class AdminStatisticsController extends Controller {

    function index () {
        $dataSuscripciones = UsuarioSuscripto::join('suscripciones', 'usuarios_suscriptos.suscripcion_id', '=', 'suscripciones.suscripcion_id')
            ->select(\DB::raw('
                suscripciones.suscripcion_id,
                suscripciones.nombre,
                SUM(usuarios_suscriptos.total) AS totalGastadoPorSuscripcion
                '))
//            ->where('usuarios_suscriptos.status', '=', 'activo')
            ->groupBy('suscripciones.suscripcion_id', 'suscripciones.nombre')
            ->pluck('nombre', 'totalGastadoPorSuscripcion');

        $ingresosPorMes = UsuarioSuscripto::select(\DB::raw('
                SUM(total) AS totalGastado,
                MONTH(fecha_suscripcion) as mes
                '))
            ->whereYear('fecha_suscripcion', '=', 2023)
            ->groupBy(\DB::raw('MONTH(fecha_suscripcion)'))
            ->orderBy(\DB::raw('MONTH(fecha_suscripcion)'))
            ->pluck('mes', 'totalGastado')
            ->toArray();

        $mesesNombreIngresos = ConvertMonthToName::convertMonth(array_values($ingresosPorMes));

        $suscriptoresPorMes = UsuarioSuscripto::select(\DB::raw('
                MONTH(fecha_suscripcion) as mes,
                COUNT(*) AS cantidad_suscripciones
                '))
            ->whereYear('fecha_suscripcion', '=', 2023)
            ->groupBy(\DB::raw('MONTH(fecha_suscripcion)'))
            ->orderBy(\DB::raw('MONTH(fecha_suscripcion)'))
            ->pluck('cantidad_suscripciones', 'mes')
            ->toArray();
        $mesesNombreSuscripciones = ConvertMonthToName::convertMonth(array_keys($suscriptoresPorMes));

        $suscripcionesPorTemporalidad = UsuarioSuscripto::select(\DB::raw('
            tipo_suscripcion,
            COUNT(*) as cantidad_suscripciones'))
            ->groupBy('tipo_suscripcion')
            ->pluck('cantidad_suscripciones', 'tipo_suscripcion')
            ->toArray();

        //Estadísticas Simples
        $facturacionTotal = UsuarioSuscripto::select(\DB::raw('SUM(total) as facturacion_total'))->pluck('facturacion_total')->first();
        $cantidadSuscriptores = UsuarioSuscripto::all()->count();
        $ticketPromedio = intval($facturacionTotal) / $cantidadSuscriptores;
        $cantidadUsuarios = Usuario::all()->count();
        $suscripcionesAbandonadas = CancelacionSuscripcion::all()->count();

        return view('admin.estadisticas.index', [
            'ingresosPorSuscripcion' => $dataSuscripciones->keys()->toArray(),
            'nombresSuscripciones' => $dataSuscripciones->values()->toArray(),
            'ingresosPorMes' => $ingresosPorMes,
            'mesesNombreIngresos' => $mesesNombreIngresos,
            'suscriptoresPorMes' => $suscriptoresPorMes,
            'mesesNombreSuscripciones' => $mesesNombreSuscripciones,
            'facturacionTotal' => $facturacionTotal,
            'cantidadSuscriptores' => $cantidadSuscriptores,
            'ticketPromedio' => $ticketPromedio,
            'cantidadUsuarios' => $cantidadUsuarios,
            'suscripcionesAbandonadas' => $suscripcionesAbandonadas,
            'suscripcionesPorTemporalidad' => $suscripcionesPorTemporalidad,


        ]);
    }




}

