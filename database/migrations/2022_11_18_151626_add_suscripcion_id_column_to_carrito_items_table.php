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
        Schema::table('carrito_items', function (Blueprint $table) {
            $table->unsignedSmallInteger('suscripcion_id')->after('carrito_id');
            $table->foreign('suscripcion_id')->references('suscripcion_id')->on('suscripciones');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('carrito_items', function (Blueprint $table) {
            $table->dropColumn('suscripcion_id');
        });
    }
};
