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
        Schema::table('carrito', function (Blueprint $table) {
            $table->unsignedSmallInteger('carrito_status_id')->after('usuario_id');
            $table->foreign('carrito_status_id')->references('carrito_status_id')->on('carrito_status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('carrito', function (Blueprint $table) {
            $table->dropColumn('carrito_status_id');
        });
    }
};
