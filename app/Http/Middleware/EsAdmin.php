<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EsAdmin
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
            if(\Auth::user()->rol_id == 2) {
            return redirect()->route('home')
            ->with('status.message', 'Acceso Bloqueado. Para acceder necesitas ser administrador')
            ->with('status.type', 'danger');
            }
        }
        return $next($request);
    }
}
