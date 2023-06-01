<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Carrito;
use App\Models\CarritoItem;
use App\Models\Usuario;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CategoriaSeeder::class);
        $this->call(RolSeeder::class);
        $this->call(SuscripcionSeeder::class);
        $this->call(UsuarioSeeder::class);
        $this->call(PublicacionSeeder::class);
        $this->call(CarritoStatusSeeder::class);
        $this->call(CarritoSeeder::class);
        $this->call(PedidoSeeder::class);
        $this->call(CarritoItemSeeder::class);
        $this->call(UsuarioSuscriptoSeeder::class);
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
