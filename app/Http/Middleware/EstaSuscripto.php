<?php

namespace App\Http\Middleware;

use App\Models\Suscripcion;
use App\Models\UsuarioSuscripto;
use Closure;
use Illuminate\Http\Request;

class EstaSuscripto
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(\Auth::user()){
            $usuarioSuscripto = UsuarioSuscripto::where('usuario_id', '=', \Auth::user()->usuario_id)->first();
//            print_r($usuarioSuscripto);
            if(isset($usuarioSuscripto) && !empty($usuarioSuscripto)){
                return redirect()->route('perfil', ['usuario_id' => \Auth::user()->usuario_id])
                    ->with('status.message', 'Ya tienes una suscripción activa, si quieres mejorar o cancelar tu plan lo puedes hacer desde tu perfil.')
                    ->with('status.type', 'danger');
            }
        }
        return $next($request);
    }
}
