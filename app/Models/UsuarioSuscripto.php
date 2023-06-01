<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsuarioSuscripto extends Model
{
//    use HasFactory;
    protected $table = "usuarios_suscriptos";
    protected $primaryKey = "usuario_suscripto_id";
    protected $fillable = ['usuario_id', 'suscripcion_id','status', 'fecha_suscripcion', 'fecha_finalizacion', 'tipo_suscripcion','total', 'metodo_pago', 'ciudad', 'direccion_envio', 'status_pago', 'pago_id'];

    public const VALIDATE_RULES = [
        'nombre' => 'required',
        'apellido' => 'required',
        'email' => 'required|email',
        'codigo_postal' => 'required|numeric',
        'ciudad' => 'required',
        'direccion_envio' => 'required',
        'metodo_pago' => 'required'
    ];

    public const VALIDATE_MESSAGES = [
        'nombre.required' => 'Debes ingresar tu nombre.',
        'apellido.required' => 'Debes ingresar tu apellido.',
        'email.required' => 'Debes ingresar tu email.',
        'email.email' => 'El mail ingresado tiene un formato incorrecto.',
        'codigo_postal.required' => 'Debes introducir tu código postal.',
        'codigo_postal.numeric' => 'El codigo postal no puede contener letras',
        'ciudad.required' => 'Debes introducir la ciudad donde resides.',
        'direccion_envio.required' => 'Debes introducir la dirección donde recibirás tu pedido.',
        'metodo_pago.required' => 'Debes seleccionar un método de pago antes de proceder a pagar.',
        'direccion_envio.numeric' => 'Debes ingresar la altura de tu casa o departamento',
    ];

    public function usuario() {
        return $this->belongsTo(
            Usuario::class,
            'usuario_id',
            'usuario_id',
        );
    }

    public function suscripcion() {
        return $this->belongsTo(
            Suscripcion::class,
            'suscripcion_id',
            'suscripcion_id',
        );
    }
}
