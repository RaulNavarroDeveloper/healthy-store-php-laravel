<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('usuarios')->insert([
            [
                'usuario_id' => 1,
                'rol_id' => 1,
                'nombre' => 'Raul',
                'apellido' => 'Navarro',
                'email' => 'raulnavarro@gmail.com',
                'fecha_nacimiento' => '2002-03-01',
                'password' => \Hash::make('12345678'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'usuario_id' => 2,
                'rol_id' => 2,
                'nombre' => 'Alejandro',
                'apellido' => 'Gallo',
                'fecha_nacimiento' => '2002-05-13',
                'email' => 'alegallo@gmail.com',
                'password' => \Hash::make('sarazaza'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'usuario_id' => 3,
                'rol_id' => 2,
                'nombre' => 'Santiago',
                'apellido' => 'Gallino',
                'email' => 'santigallino@gmail.com',
                'fecha_nacimiento' => '1986-04-16',
                'password' => \Hash::make('portales'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'usuario_id' => 4,
                'rol_id' => 2,
                'nombre' => 'Kevin',
                'apellido' => 'Durant',
                'email' => 'kd@gmail.com',
                'fecha_nacimiento' => '1978-06-25',
                'password' => \Hash::make('bkn2022f'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'usuario_id' => 5,
                'rol_id' => 2,
                'nombre' => 'Jorge',
                'apellido' => 'Canterville',
                'email' => 'jorgecanterville@gmail.com',
                'fecha_nacimiento' => '1999-12-25',
                'password' => \Hash::make('asdasdasd'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'usuario_id' => 6,
                'rol_id' => 2,
                'nombre' => 'Gonzalo',
                'apellido' => 'Saccomani',
                'email' => 'gonzalosaco@gmail.com',
                'fecha_nacimiento' => '2002-04-09',
                'password' => \Hash::make('asdasdasd'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'usuario_id' => 7,
                'rol_id' => 2,
                'nombre' => 'Julian',
                'apellido' => 'Alvarez',
                'email' => 'julianalvarez@gmail.com',
                'fecha_nacimiento' => '1998-08-08',
                'password' => \Hash::make('asdasdasd'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'usuario_id' => 8,
                'rol_id' => 2,
                'nombre' => 'Leonel',
                'apellido' => 'Messi',
                'email' => 'leomessi@gmail.com',
                'fecha_nacimiento' => '1987-06-24',
                'password' => \Hash::make('asdasdasd'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'usuario_id' => 9,
                'rol_id' => 2,
                'nombre' => 'Zach',
                'apellido' => 'Lavine',
                'email' => 'zachlavine@gmail.com',
                'fecha_nacimiento' => '1995-03-10',
                'password' => \Hash::make('asdasdasd'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'usuario_id' => 10,
                'rol_id' => 2,
                'nombre' => 'Lebron',
                'apellido' => 'James',
                'email' => 'lebronjames@gmail.com',
                'fecha_nacimiento' => '1884-12-30',
                'password' => \Hash::make('asdasdasd'),
                'created_at' => now(),
                'updated_at' => now(),
            ]

        ]);
    }
}
