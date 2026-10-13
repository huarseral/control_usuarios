<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleados extends Model
{
    /** @use HasFactory<\Database\Factories\EmpleadosFactory> */
    use HasFactory;
    #protected $table="Empleados"

    protected $fillable =[
        'name', 'lname', 'dni', 'email', 'telefono',
        'sexo', 'estado_civil', 'edad',
        'pais', 'ciudad',
        'cargo', 'profesion', 'area', 'tipo_contrato', 'sueldo',
        'activo', 'observaciones',
    ];

    protected function casts():array
    {
        return [
            "edad"=>"integer",
            "sueldo"=>"decimal:2",
            "activo"=>"boolean",
            "observaciones"=>"array"
        ];
    }    

    public const TIPOS_CONTRATO =[
        "indefinido"=>"Indefinido",
        "plazo_fijo"=>"Plazo Fijo",
        "practicas"=>"Prácticas",
        "locacion"=>"Locación de servicios"
    ];

    public const AREAS=[
        "administracion"=>"Administración",
         "ventas"=>"Ventas",
         "tecnologia"=>"Tecnología",
         "finanzas"=>"Finanzas",
    ];

    public const SEXOS = [
        'masculino' => 'Masculino',
        'femenino'  => 'Femenino',
        'otro'      => 'Otro',
    ];

    public const ESTADOS_CIVILES = [
        'soltero'     => 'Soltero(a)',
        'casado'      => 'Casado(a)',
        'conviviente' => 'Conviviente',
        'divorciado'  => 'Divorciado(a)',
        'viudo'       => 'Viudo(a)',
    ];

}
