<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('empleados', function (Blueprint $table) {
            
            $table->id();
            $table->string("name", 25);
            $table->string("lname",35);
            $table->char("dni",8)->unique();
            $table->string("email",100)->nullable()->unique();
            $table->string("telefono", 20)->nullable();
            $table->unsignedTinyInteger("edad");
            $table->enum("sexo",["masculino","femenino"]);
            $table->enum("estado_civil", ["soltero","casado","conviviente","divorciado","viudo"] )->default("soltero");
            $table->string("pais",60)->default("Perú");
            $table->string("ciudad",80);

            $table->string("cargo", 80);
            $table->string("profesion", 150)->nullable();
            $table->enum("area",["administracion", "ventas", "tecnologia", "soporte", "finanzas"]);
            $table->enum("tipo_contrato",["indefinido","plazo_fijo","practicas","locacion"])->default("plazo_fijo");
            $table->decimal("sueldo", 10,2)->default(0);
            
            $table->boolean("activo")->default(true);
            $table->text("observaciones")->nullable();

            $table->index("ciudad");
            $table->index("cargo");
            $table->index(["area","activo"]);
            $table->index(["lname","name"]);


            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empleados');
    }
};
