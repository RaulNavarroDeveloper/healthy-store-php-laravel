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
            $table->unsignedBigInteger('carrito_id')->after('carrito_item_id');
            $table->foreign('carrito_id')->references('carrito_id')->on('carrito');
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
            $table->dropColumn('carrito_id');
        });
    }
};
