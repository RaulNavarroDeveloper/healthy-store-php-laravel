<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios_suscriptos', function (Blueprint $table) {
            $table->id('usuario_suscripto_id');
            $table->date('fecha_suscripcion');
            $table->string('status', 8);
            $table->date('fecha_finalizacion');
            $table->string('tipo_suscripcion', 10);
            $table->string('metodo_pago', 20);
            $table->decimal('total', 7,2);
            $table->string('ciudad', 40);
            $table->string('direccion_envio', 90);
            $table->string('status_pago', 20);
            $table->string('pago_id', 256)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios_suscriptos');
    }
};
