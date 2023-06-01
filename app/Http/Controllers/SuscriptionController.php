<?php
namespace App\Http\Controllers;
use App\Models\CancelacionSuscripcion;
use App\Models\Suscripcion;
use App\Models\User;
use App\Models\Usuario;
use App\Models\UsuarioSuscripto;
use Illuminate\Http\Request;
use Illuminate\Support\ViewErrorBag;
use MercadoPago\SDK;
use MercadoPago\Item;
use MercadoPago\Preference;
use Illuminate\Support\Facades\Validator;

class SuscriptionController extends Controller
{
    function paginaBajaSuscripcion(){
        return view('suscripciones.cancelar-suscripcion');
    }
    function verPreciosSuscripciones(){
        return view('suscripciones.pricing');
    }

    function cancelarSuscripcionEjecutar (Request $request) {
        $usuario = \Auth::user();
        $suscripcion = UsuarioSuscripto::join('suscripciones', 'suscripciones.suscripcion_id', '=', "usuarios_suscriptos.suscripcion_id")
            ->where('usuarios_suscriptos.usuario_id', '=', $usuario->usuario_id)->first();
            $motivos = $request->except('_token');
            $motivos['usuario_id'] = $usuario->usuario_id;
            $motivos['suscripcion_id'] = $suscripcion->suscripcion_id;
            $motivos['fecha_cancelacion'] = date("Y-m-d");
//            $motivos['nombre'] = $suscripcion->nombre;
//            var_dump($motivos);
        $cancelacion = CancelacionSuscripcion::create($motivos);
        $status['status'] = 'inactivo';
        $suscripcion->update($status);

        return redirect()
            ->route('home')
            ->with('status.message', 'Tu suscripción: <b>' . e($suscripcion->nombre) . '</b> se canceló correctamente')
            ->with('status.type', 'success');
    }

    function verInfoSuscripcion ($id, Request $request){
        $suscripcion = Suscripcion::findOrFail($id);
        return view('suscripciones.info-suscripcion', [
            'suscripcion' => $suscripcion
        ]);
    }


//    function checkoutSuscripcion ($id) {
//        $usuario = \Auth::user();
//        $suscripcion = Suscripcion::findOrFail($id);
//        $tipoSuscripcion = session('tipoSuscripcion', 'default');
////        var_dump(session()->all());
//        return view('suscripciones.checkout', [
//            'suscripcion' => $suscripcion,
//            'tipoSuscripcion' => ucfirst($tipoSuscripcion),
//            'usuario' => $usuario,
////            'preference' => $preference,
////            'publicKey' => config('mercadopago.public_key'),
//        ]);
//    }

    function guardarInfoSuscripcion (Request $request, $id){
        $suscripcion = Suscripcion::findOrFail($id);
//    var_dump($request->except('_token'));
    session(['tipoSuscripcion' => $request->suscription_type]);
        return redirect()
        ->route('suscripcion.checkout.mp', ['id' => $suscripcion->suscripcion_id]);
    }

    function suscripcionEjecutar (Request $request, $id) {
        $request->validate(UsuarioSuscripto::VALIDATE_RULES, UsuarioSuscripto::VALIDATE_MESSAGES);
//        $validator = Validator::make($request->all(), UsuarioSuscripto::VALIDATE_RULES, UsuarioSuscripto::VALIDATE_MESSAGES);

        $usuario = \Auth::user();
        $suscripcion = Suscripcion::findOrFail($id);
        $tipoSuscripcion = session('tipoSuscripcion', 'default');
        $mensualidad = "precio_" . $tipoSuscripcion;
        $fecha = date("Y-m-d");

//        if (!$validator->passes()) {
//            $errors = $validator->errors();
//            dd($errors);
//            return response()->json(['status' => 0, 'errors' => $validator->errors()->toArray()], 422);
//            return redirect()
////                ->back()
//                ->route('suscripcion.checkout.mp', ['id' => $suscripcion->suscripcion_id])
//                ->withErrors($validator->errors()->toArray())
//                ->withInput();
//        } else {
            $datosForm = $request->except('_token');
            $datosForm['usuario_id'] = $usuario->usuario_id;
            $datosForm['fecha_suscripcion'] = date('Y-m-d');
            $datosForm['fecha_finalizacion'] =
                $tipoSuscripcion == "mensual" ? date("Y-m-d", strtotime($fecha . ' + 1 month')) : ( $tipoSuscripcion == "anual" ? date("Y-m-d", strtotime($fecha . ' + 1 year')) : null);
            $datosForm['suscripcion_id'] = intval($id);
            $datosForm['status'] = "inactivo";
            $datosForm['tipo_suscripcion'] = ucfirst($tipoSuscripcion);
            $datosForm['total'] = intval($suscripcion->$mensualidad);
            $datosForm['status_pago'] = 'pendiente';
//            dd($request->query());
            $preferenceInit = session('preferenceInit', 'default');
//            dd($preferenceInit);
        $query = UsuarioSuscripto::create($datosForm);
        if($query) {
//        return response(json_encode($datosForm), 200)->header('Content-type', 'application/json');
//            return response()->json(['status' => 1, 'msg' => 'suscripcion exitosa']);
            return redirect($preferenceInit);
//        }

        }

//        return redirect()
//            ->route('perfil', ['usuario_id' => $usuario->usuario_id])
//            ->with('status.message', 'Te suscribiste al plan: <b>' . e($suscripcion->nombre) . " " . ucfirst($tipoSuscripcion) . '</b> ')
//            ->with('status.type', 'success');
//        return redirect()
//            ->route('mp.test');
//            ->with('status.message', 'Te suscribiste al plan: <b>' . e($suscripcion->nombre) . " " . ucfirst($tipoSuscripcion) . '</b> ')
//            ->with('status.type', 'success');

    }
}
