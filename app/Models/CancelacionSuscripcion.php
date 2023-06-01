<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CancelacionSuscripcion extends Model
{
    use HasFactory;

    protected $table = 'cancelacion_suscripciones';
    protected $primaryKey = 'cancelacion_suscripciones_id';
    protected $fillable = ['motivo', 'usuario_id', 'suscripcion_id', 'fecha_cancelacion'];

    public function usuario () {
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
