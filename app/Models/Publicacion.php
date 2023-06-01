<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Publicacion
 *
 * @property int $publicacion_id
 * @property int|null $categoria_id
 * @property string $titulo
 * @property string|null $meta_title
 * @property string $contenido
 * @property string $resumen
 * @property string|null $imagen
 * @property string|null $imagen_preview
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read Publicacion|null $categoria
 * @method static \Illuminate\Database\Eloquent\Builder|Publicacion newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Publicacion newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Publicacion query()
 * @method static \Illuminate\Database\Eloquent\Builder|Publicacion whereCategoriaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Publicacion whereContenido($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Publicacion whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Publicacion whereImagen($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Publicacion whereImagenPreview($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Publicacion whereMetaTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Publicacion wherePublicacionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Publicacion whereResumen($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Publicacion whereTitulo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Publicacion whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property int $usuario_id
 * @property-read \App\Models\Usuario $usuario
 * @method static \Illuminate\Database\Eloquent\Builder|Publicacion whereUsuarioId($value)
 */
class Publicacion extends Model
{
//    use HasFactory;
    protected $table = 'publicaciones';

    protected $primaryKey = "publicacion_id";

    protected $fillable = ['categoria_id', 'usuario_id', 'titulo', 'meta_title', 'contenido', 'resumen', 'imagen', 'imagen_preview'];

    public const VALIDATE_RULES = [
        'titulo' => 'required|min:10',
        'meta_title' => '',
        'contenido' => 'required',
        'resumen' => 'required|min:25',
        'imagen' => 'image|max:5000',

    ];

    public const VALIDATE_MESSAGES = [
        'titulo.required' => 'El título de la publicación no puede quedar vacío.',
        'titulo.min' => 'El título de la publicación debe tener al menos 10  caracteres.',
        'contenido.required' => 'Debes escribir el contenido de la publicación',
        'resumen.required' => 'Debes escribir un resumen para la publicación',
        'resumen.min' => 'El resumen debe contener 25 caracteres como mínimo',
        'imagen.max' => 'El archivo debe pesar menos de 5MB',
        'imagen.image' => 'Debes subir una imágen con extensión válida (jpeg, jpg, png, svg, webp, o gif',
    ];

public function categoria() {
    return $this->belongsTo(
        Categoria::class,
        'categoria_id',
        'categoria_id'
    );
}

public function usuario() {
    return $this->belongsTo(
        Usuario::class,
        'usuario_id',
        'usuario_id',
    );
}

}
