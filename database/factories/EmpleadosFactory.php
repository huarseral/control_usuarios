<?php

namespace Database\Factories;

use App\Models\Empleados;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Empleados>
 */
class EmpleadosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    private const CIUDADES = [
        'Lima', 'Arequipa', 'Trujillo', 'Chiclayo', 'Piura',
        'Cusco', 'Ica', 'Chincha Alta', 'Huancayo', 'Tacna',
    ];

    private const CARGOS = [
        'administracion' => ['Asistente administrativo', 'Jefe de administración', 'Secretaria ejecutiva'],
        'ventas'         => ['Ejecutivo de ventas', 'Supervisor comercial', 'Gerente de ventas'],
        'tecnologia'     => ['Desarrollador backend', 'Desarrollador frontend', 'Analista QA', 'Jefe de TI'],
        'finanzas'       => ['Contador', 'Analista financiero', 'Tesorero'],
    ];

    private const PROFESIONES = [
        'Ingeniero de sistemas', 'Contador público', 'Administrador de empresas',
        'Psicólogo', 'Economista', 'Ingeniero industrial', 'Técnico en computación',
    ];

    public function definition(): array
    {

        $sexo= fake()->boolean(95) ? fake()->randomElement(["masculino","femenino"])
                                    : "otro";

        $genero= match($sexo){
            "masculino"=>"male",
            "femenino"=>"female",
            default => null
        };

        $area = fake()->randomElement(array_keys(Empleados::AREAS));

        return [
            "name"=>fake()->firstName($genero),
            "lname"=>fake()->lastName(). " ".fake()->lastName(),
            "dni"=>fake()->unique()->numerify("########"),
            "email"=>fake()->boolean(85) ? fake()->unique()->safeEmail() : null ,
            "telefono"=>fake()->optional(0.8)->numerify("9########"),
            "edad"=>fake()->numberBetween(18,55),
            "sexo"=>$sexo,
            "estado_civil"=>fake()->randomElement(array_keys(Empleados::ESTADOS_CIVILES)),
            "pais"=>"Perú",
            "ciudad"=>fake()->randomElement(self::CIUDADES),
            "cargo"=>fake()->randomElement(self::CARGOS[$area]),
            "profesion"=>fake()->randomElement(array_keys(self::PROFESIONES)),
            "area"=>$area,
            "tipo_contrato"=>fake()->randomElement(array_keys(Empleados::TIPOS_CONTRATO)),
            "sueldo"=>fake()->randomFloat(2,1150,15000),
            "activo"=>fake()->boolean(85),
            "observaciones"=>fake()->optional(0.3)->sentences(3, true),
        ];
    }


    public function inactivo():static
    {
        return $this->state(fn(array $attributes)=>["activo"=>false]);
    }

    public function deArea(string $area): static
    {
        return $this->state(fn(array $attribute) =>[
            "area"=>$area,
            "cargo"=>fake()->randomElement(self::CARGOS[$area])
        ]);
    }
}
