<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\CarritoItem
 *
 * @property int $carrito_item_id
 * @property int $carrito_id
 * @property int $suscripcion_id
 * @property int $cantidad
 * @property string $precio
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Carrito $carrito
 * @property-read \App\Models\Suscripcion $suscripcion
 * @method static \Illuminate\Database\Eloquent\Builder|CarritoItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CarritoItem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CarritoItem query()
 * @method static \Illuminate\Database\Eloquent\Builder|CarritoItem whereCantidad($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CarritoItem whereCarritoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CarritoItem whereCarritoItemId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CarritoItem whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CarritoItem wherePrecio($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CarritoItem whereSuscripcionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CarritoItem whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class CarritoItem extends Model
{
//    use HasFactory;

    protected $table = 'carrito_items';
    protected $primaryKey = 'carrito_item_id';

    public function carrito() {
        return $this->belongsTo(
            Carrito::class,
            'carrito_id',
            'carrito_id'
        );
    }

    public function suscripcion() {
        return $this->belongsTo(
            Suscripcion::class,
            'suscripcion_id',
            'suscripcion_id'
        );
    }
}

