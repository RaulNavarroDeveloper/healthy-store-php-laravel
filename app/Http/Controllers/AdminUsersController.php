<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Carrito;
use App\Models\CarritoItem;
use App\Models\UsuarioSuscripto;

class AdminUsersController extends Controller
{
    public function traerUsuarios () {
//        $usuarios = Usuario::where('rol_id', '=', 2)
//            ->orderBy('nombre')
//            ->get();

//        $dataUsuarios = Usuario::join('carrito', 'carrito.usuario_id', "=", 'usuarios.usuario_id')
//            ->join('carrito_items', 'carrito.carrito_id', '=', 'carrito_items.carrito_id')
//            ->select(\DB::raw('
//            usuarios.email,
//             usuarios.nombre,
//             usuarios.apellido,
//             usuarios.usuario_id,
//             SUM(carrito_items.precio) AS total_comprado,
//             SUM(carrito_items.cantidad) AS carritos_creados,
//             SUM(carrito.carrito_status_id = 3) AS compras_realizadas'))
//            ->where('usuarios.rol_id', '=', 2)
//            ->groupBy('usuarios.email', 'usuarios.nombre', 'usuarios.apellido', 'usuarios.usuario_id')
//            ->get();
        $dataUsuarios = Usuario::join('usuarios_suscriptos', 'usuarios_suscriptos.usuario_id', "=", 'usuarios.usuario_id')
            ->select(\DB::raw('
            usuarios.email,
             usuarios.nombre,
             usuarios.apellido,
             usuarios.usuario_id,
             usuarios_suscriptos.status,
             usuarios_suscriptos.fecha_suscripcion,
             SUM(usuarios_suscriptos.total) AS total_comprado'))
            ->where('usuarios.rol_id', '=', 2)
            ->groupBy('usuarios.email', 'usuarios.nombre', 'usuarios.apellido', 'usuarios.usuario_id', 'usuarios_suscriptos.status', 'usuarios_suscriptos.fecha_suscripcion')
            ->get();





        return view('admin.usuarios.index', [
            'dataUsuarios' => $dataUsuarios,
        ]);
    }
    public function verUsuarioDetalle ($id) {
        $usuario = Usuario::findOrFail($id);
        $carritos = Usuario::join('carrito', 'carrito.usuario_id', '=', 'usuarios.usuario_id')
            ->where('carrito.usuario_id', '=', $usuario->usuario_id)
            ->pluck('carrito_id');

//        $dataCompras = Usuario::join('carrito', 'carrito.usuario_id', '=', 'usuarios.usuario_id')
//            ->join('pedidos', 'carrito.carrito_id', '=', 'pedidos.carrito_id')
//            ->join('carrito_items', 'carrito.carrito_id', '=', 'carrito_items.carrito_id')
//            ->join('carrito_status', 'carrito.carrito_status_id', '=', 'carrito_status.carrito_status_id')
//            ->join('suscripciones', 'carrito_items.suscripcion_id', '=', 'suscripciones.suscripcion_id')
//            ->whereIn('pedidos.carrito_id', $carritos)
//            ->get();

        $dataCompras2 = Usuario::join('usuarios_suscriptos', 'usuarios_suscriptos.usuario_id', '=', 'usuarios.usuario_id')
            ->join('suscripciones', 'suscripciones.suscripcion_id', '=', 'usuarios_suscriptos.suscripcion_id')
            ->where('usuarios_suscriptos.usuario_id', '=', $usuario->usuario_id)
            ->get();

//        $suscripcionActiva = Usuario::join('suscripciones', 'usuarios.suscripcion_activa', '=', 'suscripciones.suscripcion_id')
//            ->where('usuarios.usuario_id', '=', $usuario->usuario_id)
//            ->first();
        $suscripcionUsuario = UsuarioSuscripto::join('suscripciones', 'usuarios_suscriptos.suscripcion_id', '=', 'suscripciones.suscripcion_id')
            ->where('usuarios_suscriptos.usuario_id', '=', $usuario->usuario_id)
            ->first();

//        $dataActividad = $dataCompras->pluck('total');

//        $total = 0;
//        foreach ($dataActividad as $data) {
//            $total += intval($data);
//        }

        return view('admin.usuarios.usuario-detalles', [
           'usuario' => $usuario,
            'dataCompras' => $dataCompras2,
            'suscripcionUsuario' => $suscripcionUsuario,
//            'dataActividad' => $dataActividad,
//            'total' => $total
        ]);

    }

}
