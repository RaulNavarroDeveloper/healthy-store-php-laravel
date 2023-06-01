<?php

namespace App\Http\Controllers;

use App\Models\Publicacion;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function verBlog () {
        $publicaciones = Publicacion::orderBy('created_at')->get();
        return view('blog.index', [
            "publicaciones" => $publicaciones,
        ]);
    }

    public function verPublicacion ($id) {
        $publicacion = Publicacion::findOrFail($id);
        $publicaciones_relacionadas = Publicacion::orderBy('created_at')->where('publicacion_id', '!=', $publicacion->publicacion_id)->get();

    return view('blog.publicacion', [
        'publicacion' => $publicacion,
        'publicaciones_relacionadas' => $publicaciones_relacionadas,
    ]);
    }
}
