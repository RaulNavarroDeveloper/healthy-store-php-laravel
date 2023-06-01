<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsuarioSuscriptoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('usuarios_suscriptos')->insert([
            [
                "usuario_suscripto_id" => 1,
                "usuario_id" => 2,
                "suscripcion_id" => 1,
                "fecha_suscripcion" => "2023-01-03",
                "status" => "activo",
                "fecha_finalizacion" => "2023-02-03",
                "tipo_suscripcion" => "Mensual",
                "metodo_pago" => "mercadoPago",
                "total" => 2499,
                "ciudad" => "San Miguel de Tucumán",
                "direccion_envio" => "Avenida Mate de Luna 2307",
                'status_pago' => 'finalizado',
                'pago_id' => 'seeder1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                "usuario_suscripto_id" => 2,
                "usuario_id" => 3,
                "suscripcion_id" => 2,
                "fecha_suscripcion" => "2023-01-18",
                "status" => "activo",
                "fecha_finalizacion" => "2024-01-18",
                "tipo_suscripcion" => "Anual",
                "metodo_pago" => "mercadoPago",
                "total" => 38399,
                "ciudad" => "Yerba Buena",
                "direccion_envio" => "Aconquija 2607",
                'status_pago' => 'finalizado',
                'pago_id' => 'seeder2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                "usuario_suscripto_id" => 3,
                "usuario_id" => 4,
                "suscripcion_id" => 3,
                "fecha_suscripcion" => "2023-02-01",
                "status" => "inactivo",
                "fecha_finalizacion" => "2024-02-01",
                "tipo_suscripcion" => "Anual",
                "metodo_pago" => "mercadoPago",
                "total" => 56599,
                "ciudad" => "San Miguel de Tucumán",
                "direccion_envio" => "Muñecas 65",
                'status_pago' => 'finalizado',
                'pago_id' => 'seeder3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                "usuario_suscripto_id" => 4,
                "usuario_id" => 8,
                "suscripcion_id" => 3,
                "fecha_suscripcion" => "2023-02-10",
                "status" => "activo",
                "fecha_finalizacion" => "2023-03-10",
                "tipo_suscripcion" => "Mensual",
                "metodo_pago" => "mercadoPago",
                "total" => 5899,
                "ciudad" => "San Miguel de Tucumán",
                "direccion_envio" => "Muñecas 45",
                'status_pago' => 'finalizado',
                'pago_id' => 'seeder4',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
