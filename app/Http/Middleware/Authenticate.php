<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('auth.iniciar.sesion.form');
//                ->with('status.message', 'Debes tener una cuenta para poder suscribirte. Inicia sesión o Registrate si no tienes una.')
//                ->with('status.type', 'danger');
        }
    }
}
