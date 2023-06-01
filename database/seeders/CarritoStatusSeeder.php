<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarritoStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('carrito_status')->insert([
            [
                'carrito_status_id' => 1,
                'status' => 'Pendiente',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'carrito_status_id' => 2,
                'status' => 'Abandonado',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'carrito_status_id' => 3,
                'status' => 'Finalizado',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
