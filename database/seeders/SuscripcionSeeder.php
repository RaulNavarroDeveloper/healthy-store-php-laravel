<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SuscripcionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('suscripciones')->insert([
           [
               'suscripcion_id' => 1,
               'nombre' => 'Básico',
               'precio_mensual' => 2499,
               'precio_anual' => 23999,
               'descripcion' => 'Suscripcion básica en la cual tendrás acceso a:',
               'created_at' => now(),
               'updated_at' => now(),
           ],
            [
                'suscripcion_id' => 2,
                'nombre' => 'Estándar',
                'precio_mensual' => 3999,
                'precio_anual' => 38399,
                'descripcion' => 'Suscripcion Estándar en la cual tendrás acceso a:',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'suscripcion_id' => 3,
                'nombre' => 'Premium',
                'precio_mensual' => 5899,
                'precio_anual' => 56599,
                'descripcion' => 'Suscripcion Premium en la cual tendrás acceso a:',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
