<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('roles')->insert([
            [
                'rol_id' => 1,
                'nombre'=> 'Administrador',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'rol_id' => 2,
                'nombre'=> 'Usuario',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
