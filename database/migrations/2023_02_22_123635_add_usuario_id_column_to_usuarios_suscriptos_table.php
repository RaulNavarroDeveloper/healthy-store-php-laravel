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
        Schema::table('usuarios_suscriptos', function (Blueprint $table) {
            $table->unsignedBigInteger('usuario_id')->after('usuario_suscripto_id');
            $table->foreign('usuario_id')->references('usuario_id')->on('usuarios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('usuarios_suscriptos', function (Blueprint $table) {
            $table->dropColumn('usuario_id');
        });
    }
};
