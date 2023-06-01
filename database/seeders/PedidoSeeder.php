<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PedidoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('pedidos')->insert([
            [
               'pedido_id' => 1,
               'carrito_id' => 2,
               'fecha_compra' => '2022-05-29',
               'total' => 3899,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'pedido_id' => 2,
                'carrito_id' => 1,
                'fecha_compra' => '2021-05-03',
                'total' => 2499,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'pedido_id' => 3,
                'carrito_id' => 4,
                'fecha_compra' => '2022-10-19',
                'total' => 5899,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'pedido_id' => 4,
                'carrito_id' => 3,
                'fecha_compra' => '2021-04-01',
                'total' => 3899,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'pedido_id' => 5,
                'carrito_id' => 5,
                'fecha_compra' => '2022-09-19',
                'total' => 5899,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'pedido_id' => 6,
                'carrito_id' => 6,
                'fecha_compra' => '2022-08-19',
                'total' => 5899,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
