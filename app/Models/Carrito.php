<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Usuario;

/**
 * App\Models\Carrito
 *
 * @property int $carrito_id
 * @property int $usuario_id
 * @property int $carrito_status_id
 * @property string $fecha_creacion
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\CarritoStatus $carritoStatus
 * @property-read \App\Models\Usuario $usuario
 * @method static \Illuminate\Database\Eloquent\Builder|Carrito newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Carrito newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Carrito query()
 * @method static \Illuminate\Database\Eloquent\Builder|Carrito whereCarritoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Carrito whereCarritoStatusId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Carrito whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Carrito whereFechaCreacion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Carrito whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Carrito whereUsuarioId($value)
 * @mixin \Eloquent
 */
class Carrito extends Model
{
//    use HasFactory;
    protected $table = 'carrito';
    protected $primaryKey = 'carrito_id';

    public function usuario() {
        return $this->belongsTo(
            Usuario::class,
            'usuario_id',
            'usuario_id',
        );
    }

    public function carritoStatus() {
        return $this->belongsTo(
            CarritoStatus::class,
            'carrito_status_id',
            'carrito_status_id',
        );
    }
}
