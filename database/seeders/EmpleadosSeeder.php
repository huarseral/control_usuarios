<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Empleados;

class EmpleadosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /*
        Empleados::factory()->create([
            'name'       => 'Ana María',
            'lname'     => 'Quispe Mamani',
            'dni'           => '12345678',
            'email'         => 'ana.quispe@empresa.pe',
            'sexo'          => 'femenino',
            'ciudad'        => 'Chincha Alta',
            'area'          => 'tecnologia',
            'cargo'         => 'Jefe de TI',
            'tipo_contrato' => 'indefinido',
            'sueldo'        => 8500.00,
            'activo'        => true,
        ]);
        */

        //Empleados::factory()->count(20)->create();
        Empleados::factory()->count(200)->create();
    }
}
