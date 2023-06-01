<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarritoItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('carrito_items')->insert([
           [
               'carrito_item_id' => 1,
               'carrito_id' => 1,
               'suscripcion_id' => 1,
               'cantidad' => 1,
               'precio' => 2499,
               'created_at' => now(),
               'updated_at' => now(),
           ],
            [
                'carrito_item_id' => 2,
                'carrito_id' => 2,
                'suscripcion_id' => 2,
                'cantidad' => 1,
                'precio' => 3899,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'carrito_item_id' => 3,
                'carrito_id' => 3,
                'suscripcion_id' => 2,
                'cantidad' => 1,
                'precio' => 3899,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'carrito_item_id' => 4,
                'carrito_id' => 4,
                'suscripcion_id' => 3,
                'cantidad' => 1,
                'precio' => 5899,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'carrito_item_id' => 5,
                'carrito_id' => 5,
                'suscripcion_id' => 2,
                'cantidad' => 1,
                'precio' => 5899,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'carrito_item_id' => 6,
                'carrito_id' => 6,
                'suscripcion_id' => 1,
                'cantidad' => 1,
                'precio' => 5899,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
