<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Categoria;
use App\Models\Publicacion;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class AdminBlogController extends Controller
{
    public function traerPublicaciones () {
        $publicaciones = Publicacion::with(['categoria', 'usuario'])->get();

        return view('admin.blog.index', [
            'publicaciones' => $publicaciones,
        ]);
    }

//    PUBLICAR NUEVA PUBLICACION

    public function formNuevaPublicacion () {
        return view('admin.blog.nueva-publicacion', [
            'categorias' => Categoria::orderBy('nombre')->get()
        ]);
    }

    public function publicarEjecutar (Request $request) {
        $request->validate(Publicacion::VALIDATE_RULES, Publicacion::VALIDATE_MESSAGES);
        $datosPublicacion = $request->except('_token');

        if($request->hasFile('imagen')){
            $nombre = $request->file('imagen')->getClientOriginalName();
            $ruta = public_path('imgs/imgs-preview/' . $nombre);
//            dd($request->file('imagen')->getPath() . '/' . $request->file('imagen')->getFilename());
            $imagen_preview = Image::make($request->file('imagen')->getContent())->fit(375,245)->save($ruta);
            $datosPublicacion['imagen_preview'] = $imagen_preview->basename;


            $imagen = $request->file('imagen');
            $datosPublicacion['imagen'] = date("YmdHis") . "_" . \Str::slug($datosPublicacion['titulo']) . "." . $imagen->extension();
            $imagen->move(public_path('imgs'), $datosPublicacion['imagen']);
//            $imagen_preview_nombre = date("YmdHis") . "_" . \Str::slug($datosPublicacion['titulo']) . "_preview" ."." . $imagen->extension();
        }

        $publicacion = Publicacion::create($datosPublicacion);
        return redirect()
            ->route('admin.blog.listado')
            ->with('status.message', 'La publicación: <b>' . e($publicacion->titulo) . '</b> se subió correctamente')
            ->with('status.type', 'success');
    }

    public function verPublicacion ($id) {
            $publicacion = Publicacion::findOrFail($id);
            return view('admin.blog.ver-publicacion', [
            'publicacion' => $publicacion
            ]);
    }

    public function formEditarPublicacion ($id) {
        $publicacion = Publicacion::findOrFail($id);
        return view('admin.blog.editar-publicacion', [
            'publicacion' => $publicacion,
            'categorias' => Categoria::orderBy('nombre')->get()
        ]);
    }

    public function editarEjecutar (Request $request, $id) {
        $request->validate(Publicacion::VALIDATE_RULES, Publicacion::VALIDATE_MESSAGES);
        $publicacion = Publicacion::findOrFail($id);
        $datosEditados = $request->except('_token');

        if($request->hasFile('imagen')){
            $imagen = $request->file('imagen');
            $nombre = $imagen->getClientOriginalName();
            $ruta = public_path('imgs/imgs-preview/' . $nombre);
            $imagen_preview = Image::make($imagen->getContent())->fit(375,245)->save($ruta);
            $datosEditados['imagen_preview'] = $imagen_preview->basename;


            $datosEditados['imagen'] = date("YmdHis") . "_" . \Str::slug($datosEditados['titulo']) . "." . $imagen->extension();
            $imagen->move(public_path('imgs'), $datosEditados['imagen']);
            $imagenVieja = $publicacion->imagen;
        } else {
            $imagenVieja = null;
        }


        $publicacion->update($datosEditados);

        if($imagenVieja != null && file_exists(public_path('imgs/' . $imagenVieja))){
            unlink(public_path('imgs/' . $imagenVieja));
        }

        return redirect ()
            ->route('admin.blog.listado')
            ->with('status.message', 'La publicación <b>' .  e($publicacion->titulo) . '</b> fue editada correctamente')
            ->with('status.type', 'success');

    }

    public function paginaEliminar ($id) {
        $publicacion = Publicacion::findOrFail($id);
        return view('admin.blog.ver-eliminacion', [
            "publicacion" => $publicacion,
        ]);
    }

    public function eliminarEjecutar ($id) {
        $publicacion = Publicacion::findOrFail($id);
        $publicacion->delete();
        return redirect ()
            ->route('admin.blog.listado')
            ->with('status.message', 'La publicación <b>' .  e($publicacion->titulo) . '</b> se ha eliminado correctamente')
            ->with('status.type', 'success');
    }
}
