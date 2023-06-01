<?php
namespace App\Http\Controllers;
use MercadoPago\Item;
use MercadoPago\Preference;
use MercadoPago\SDK;
use Illuminate\Http\Request;
use App\Models\Suscripcion;
use App\Models\UsuarioSuscripto;
class MercadoPagoController extends Controller {
    public function checkoutSuscripcion ($id) {
//        SDK de MercadoPago
        $usuario = \Auth::user();
        $tipoSuscripcion = session('tipoSuscripcion', 'default');
        $mensualidad = "precio_" . $tipoSuscripcion;
        SDK::setAccessToken(config('mercadopago.access_token'));
        $preference = new Preference();
        $items = [];
        $suscripcion = Suscripcion::find($id);

            $item = new Item();
            $item->id = $suscripcion->suscripcion_id;
            $item->title = $suscripcion->nombre;
            $item->unit_price = intval($suscripcion->$mensualidad);
            $item->quantity = 1;
            $items[] = $item;
        $preference->items = $items;

        $preference->back_urls = [
            'success' => route('mp.success'),
            'pending' => route('mp.pending'),
            'failure' => route('mp.failure'),
        ];
        //Generar URL de preferencia
        $preference->save();
        session(['preferenceInit' => $preference->init_point]);
        return view('mercadopago.checkout', [
            'suscripcion' => $suscripcion,
            'tipoSuscripcion' => ucfirst($tipoSuscripcion),
            'usuario' => $usuario,
            'preference' => $preference,
            'publicKey' => config('mercadopago.public_key'),
        ]);
    }
    public function successEjecutar (Request $request) {
        $usuario = \Auth::user();
        $pagoId = $request->query('payment_id');
        $datosNuevos = [];
        $datosNuevos['pago_id'] = $pagoId;
        $datosNuevos['status_pago'] = 'finalizado';
        $datosNuevos['status'] = 'activo';
        $usuarioActivo = UsuarioSuscripto::where('usuario_id', '=', $usuario->usuario_id)->update($datosNuevos);
        return view('mercadopago.success', [
            'usuario' => $usuario,
        ]);
    }
    public function pendingEjecutar (Request $request) {
        $usuario = \Auth::user();
        $pagoId = $request->query('payment_id');
        $datosNuevos = [];
        $datosNuevos['pago_id'] = $pagoId;
        $datosNuevos['status_pago'] = 'pendiente';
        UsuarioSuscripto::where('usuario_id', '=', $usuario->usuario_id)->update($datosNuevos);
        return view('mercadopago.pending');
    }
    public function failureEjecutar (Request $request) {
        $usuario = \Auth::user();
        $pagoId = $request->query('payment_id');
        $datosNuevos = [];
        $datosNuevos['pago_id'] = $pagoId;
        $datosNuevos['status_pago'] = 'fallido';
        $usuarioActivo = UsuarioSuscripto::where('usuario_id', '=', $usuario->usuario_id)->update($datosNuevos);
        return view('mercadopago.failure');
    }

}
