<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('AdmPersonas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 100);
            $table->string('paterno', 100);
            $table->string('materno', 100)->nullable();
            $table->enum('sexo', ['M', 'F', 'O']);
            $table->date('fecha_nacimiento')->nullable();
            $table->string('nro_documento', 25)->unique();
            $table->string('email', 100)->nullable();
            $table->string('telefono', 30)->nullable();
            $table->string('direccion', 200)->nullable();
            $table->string('foto')->nullable();
            $table->enum('tipo_persona', ['estudiante', 'docente', 'administrativo', 'postulante', 'otro'])
                  ->default('estudiante');
            
            $table->unsignedBigInteger('municipio_id')->nullable();
            $table->unsignedBigInteger('departamento_id')->nullable();
            $table->unsignedBigInteger('pais_id')->nullable();
            
            $table->boolean('activo')->default(true);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('AdmPersonas');
    }
};