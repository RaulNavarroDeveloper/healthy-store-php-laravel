<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [\App\Http\Controllers\HomeController::class, 'verHome'])->name('home');
Route::get('/blog', [\App\Http\Controllers\BlogController::class, 'verBlog'])->name('blog');
Route::get('/blog/publicacion-{id}', [\App\Http\Controllers\BlogController::class, 'verPublicacion'])->name('publicacion');


/**
 * Autenticación
 */
Route::controller(\App\Http\Controllers\AuthController::class)
    ->group(function () {
        Route::get('iniciar-sesion', 'iniciarSesionForm')->name('auth.iniciar.sesion.form');
        Route::post('iniciar-sesion', 'iniciarSesionEjecutar')->name('auth.iniciar.sesion.ejecutar');

        Route::post('cerrar-sesion', 'cerrarSesionEjecutar')->name('auth.cerrar.sesion.ejecutar');
        Route::get('perfil/{usuario_id}', 'verPerfil')->name('perfil')->middleware(['auth'])->whereNumber('usuario_id');

        Route::get('registro', 'registroForm')->name('auth.registro.form');
        Route::post('registro', 'registroEjecutar')->name('auth.registro.ejecutar');
    });

//Route::get('iniciar-sesion', [\App\Http\Controllers\AuthController::class, 'iniciarSesionForm'])->name('auth.iniciar.sesion.form');
//Route::post('iniciar-sesion', [\App\Http\Controllers\AuthController::class, 'iniciarSesionEjecutar'])->name('auth.iniciar.sesion.ejecutar');
//
//Route::post('cerrar-sesion', [\App\Http\Controllers\AuthController::class, 'cerrarSesionEjecutar'])->name('auth.cerrar.sesion.ejecutar');
//Route::get('perfil', [\App\Http\Controllers\AuthController::])

/**
 * Suscripciones
 */
    Route::middleware(['auth'])
        ->controller(\App\Http\Controllers\SuscriptionController::class)
        ->group(function () {
            Route::get('suscripciones/informacion-cancelacion', 'paginaBajaSuscripcion')->name('suscripcion.baja');
            Route::post('suscripciones/cancelar-suscripcion', 'cancelarSuscripcionEjecutar')->name('suscripcion.cancelar.ejecutar');
        });
    Route::controller(\App\Http\Controllers\SuscriptionController::class)
        ->group(function (){
            Route::get('suscripciones/precios', 'verPreciosSuscripciones')->name('suscripcion.pricing');
            Route::get('suscripciones/suscripcion-{id}', 'verInfoSuscripcion')->name('suscripcion.ver');
//            Route::get('suscripciones/suscripcion-{id}/checkout', 'checkoutSuscripcion')->name('suscripcion.checkout');
            Route::post('suscripciones/suscripcion-{id}', 'guardarInfoSuscripcion')->name('suscripcion.precheckout');
            Route::post('/suscripcion/suscripcion-{id}/checkout', 'suscripcionEjecutar')->name('suscripcion.ejecutar')
            ->middleware(['estaSuscripto', 'auth']);
        });

/**
 * Publicaciones del BLOG
 */
Route::middleware(['auth', 'admin'])
    ->controller(\App\Http\Controllers\AdminBlogController::class)
    ->group(function () {
        Route::get('admin/blog', 'traerPublicaciones')->name('admin.blog.listado');

        Route::get('admin/blog/nueva', 'formNuevaPublicacion')->name('admin.blog.nueva');
        Route::post('admin/blog/nueva', 'publicarEjecutar')->name('admin.blog.publicar');

        Route::get('admin/blog/publicacion-{id}', 'verPublicacion')->name('admin.blog.ver.publicacion');

        Route::get('admin/blog/editar/publicacion-{id}', 'formEditarPublicacion')->name('admin.blog.form.editar')->whereNumber('id');
        Route::post('admin/blog/editar/publicacion-{id}', 'editarEjecutar')->name('admin.blog.editar')->whereNumber('id');


        Route::get('admin/blog/eliminar/publicacion-{id}', 'paginaEliminar')->name('admin.blog.ver.eliminar')->whereNumber('id');
        Route::post('admin/blog/eliminar/publicacion-{id}', 'eliminarEjecutar')->name('admin.blog.eliminar')->whereNumber('id');
    });

/**
 * Administración de Usuarios
 */

Route::middleware(['auth', 'admin'])
    ->controller(\App\Http\Controllers\AdminUsersController::class)
    ->group(function() {
    Route::get('admin/usuarios', 'traerUsuarios')->name('usuarios.index');
    Route::get('admin/usuarios/usuario-{id}', 'verUsuarioDetalle')->name('usuario.detalle');
    });


/**
 * Estadísticas
 */

Route::middleware(['auth', 'admin'])
    ->controller(\App\Http\Controllers\AdminStatisticsController::class)
    ->group(function () {
        Route::get('admin/estadisticas', 'index')->name('estadisticas.index');
    });

/**
 * MERCADOPAGO
 */
Route::controller(\App\Http\Controllers\MercadoPagoController::class)
    ->group(function (){
    Route::get('suscripciones/suscripcion-{id}/checkout', 'checkoutSuscripcion')->name('suscripcion.checkout.mp')->middleware('auth');
    Route::get('mp/success', 'successEjecutar')->name('mp.success');
    Route::get('mp/pending', 'pendingEjecutar')->name('mp.pending');
    Route::get('mp/failure', 'failureEjecutar')->name('mp.failure');
    });
//Route::get('mp/test', [\App\Http\Controllers\MercadoPagoController::class, 'confirmarCompraForm'])->name('mp.test');

