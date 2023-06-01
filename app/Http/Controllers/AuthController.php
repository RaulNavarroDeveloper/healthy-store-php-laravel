<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Models\UsuarioSuscripto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function iniciarSesionForm (){
    return view('auth.iniciar-sesion');
    }

    public function iniciarSesionEjecutar(Request $request){
        $request->validate(Usuario::VALIDATE_RULES_LOGIN, Usuario::VALIDATE_MESSAGES_LOGIN);
        $identificacion = [
          'email' => $request->input('email'),
          'password' => $request->input('password'),
        ];
        if(Auth::attempt($identificacion)){
            //Evito el ataque "session fixed"
            //Regenerar cambia el id de la sesión
            $request->session()->regenerate();
            if(Auth::user()->rol_id == 1){
            return redirect()
                ->route('admin.blog.listado')
                ->with('status.message', 'Sesión iniciada con éxito')
                ->with('status.type', 'success');
            } else {
                return redirect()
                    ->route('home')
                    ->with('status.message', 'Sesión iniciada con éxito')
                    ->with('status.type', 'success');
            }
        }
        return redirect()
            ->route('auth.iniciar.sesion.form')
            ->with('status.message', 'Las credenciales ingresadas no coinciden')
            ->with('status.type', 'danger');
    }
    public function registroForm () {
        return view('auth.registro');
    }
    public function registroEjecutar (Request $request) {
        $request->validate(Usuario::VALIDATE_RULES_REGISTER, Usuario::VALIDATE_MESSAGES_REGISTER);

        $datosRegistro = $request->except('_token');
        $datosRegistro['rol_id'] = 2;
        $datosRegistro['password'] = \Hash::make($request->input('password'));
        $registro = Usuario::create($datosRegistro);
        return redirect()
            ->route('auth.iniciar.sesion.form')
            ->with('status.message', 'Te has registrado correctamente<b> ' . e($registro->nombre) . '</b>, ya puedes iniciar sesión.')
            ->with('status.type', 'success');
    }

    public function cerrarSesionEjecutar (Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()
            ->route('auth.iniciar.sesion.form')
            ->with('status.message', 'Cerraste la sesión correctamente')
            ->with('status.type', 'success');
    }

    public function verPerfil ($usuario_id) {
        $usuario = Auth::user();
//        $suscripcionActiva = Usuario::join('suscripciones', 'usuarios.suscripcion_activa', '=', 'suscripciones.suscripcion_id')
//            ->where('usuarios.usuario_id', '=', $usuario->usuario_id)
//            ->first();

        $suscripcionActiva = UsuarioSuscripto::join('suscripciones', 'usuarios_suscriptos.suscripcion_id', '=', 'suscripciones.suscripcion_id')
            ->where('usuarios_suscriptos.usuario_id', '=', $usuario->usuario_id)
            ->first();
        return view ('auth.perfil', [
            'usuario' => $usuario,
            'suscripcionActiva' => $suscripcionActiva
        ]);
    }
}
