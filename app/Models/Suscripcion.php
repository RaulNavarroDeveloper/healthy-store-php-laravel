<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Suscripcion
 *
 * @property int $suscripcion_id
 * @property string $nombre
 * @property string $precio
 * @property string $descripcion
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Suscripcion newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Suscripcion newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Suscripcion query()
 * @method static \Illuminate\Database\Eloquent\Builder|Suscripcion whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Suscripcion whereDescripcion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Suscripcion whereNombre($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Suscripcion wherePrecio($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Suscripcion whereSuscripcionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Suscripcion whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Suscripcion extends Model
{
//    use HasFactory;

    protected $table = 'suscripciones';
    protected $primaryKey = 'suscripcion_id';
}
