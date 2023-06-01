<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Pedido
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Pedido newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Pedido newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Pedido query()
 * @method static \Illuminate\Database\Eloquent\Builder|Pedido whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pedido whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pedido whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property int $pedido_id
 * @property int $carrito_id
 * @property string $fecha_compra
 * @property string $total
 * @property-read \App\Models\Carrito $carrito
 * @method static \Illuminate\Database\Eloquent\Builder|Pedido whereCarritoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pedido whereFechaCompra($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pedido wherePedidoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pedido whereTotal($value)
 */
class Pedido extends Model
{
//    use HasFactory;

    protected $table = 'pedidos';
    protected $primaryKey = 'pedido_id';

    public function carrito () {
        return $this->belongsTo(
            Carrito::class,
            'carrito_id',
            'carrito_id',
        );

    }
}
