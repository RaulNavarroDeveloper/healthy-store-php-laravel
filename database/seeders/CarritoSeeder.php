<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarritoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('carrito')->insert([
            [
                'carrito_id' => 1,
                'usuario_id' => 2,
                'carrito_status_id' => 3,
                'fecha_creacion' => '2022-05-29 11:52:52',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'carrito_id' => 2,
                'usuario_id' => 3,
                'carrito_status_id' => 3,
                'fecha_creacion' => '2021-05-01 18:22:56',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'carrito_id' => 3,
                'usuario_id' => 3,
                'carrito_status_id' => 3,
                'fecha_creacion' => '2021-04-01 15:12:16',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'carrito_id' => 4,
                'usuario_id' => 4,
                'carrito_status_id' => 3,
                'fecha_creacion' => '2022-10-19 14:26:09',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'carrito_id' => 5,
                'usuario_id' => 4,
                'carrito_status_id' => 3,
                'fecha_creacion' => '2022-09-19 13:56:10',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'carrito_id' => 6,
                'usuario_id' => 4,
                'carrito_status_id' => 3,
                'fecha_creacion' => '2022-08-19 11:26:13',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
