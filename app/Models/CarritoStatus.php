<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\CarritoStatus
 *
 * @property int $carrito_status_id
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|CarritoStatus newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CarritoStatus newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CarritoStatus query()
 * @method static \Illuminate\Database\Eloquent\Builder|CarritoStatus whereCarritoStatusId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CarritoStatus whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CarritoStatus whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CarritoStatus whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class CarritoStatus extends Model
{
//    use HasFactory;
    protected $table = 'carrito_status';
    protected $primaryKey = 'carrito_status_id';
}
