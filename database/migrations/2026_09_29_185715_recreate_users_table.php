<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id('idUsuario');
            $table->unsignedBigInteger('idPersona')->nullable();
            $table->string('login', 30)->unique();
            $table->string('password');
            $table->unsignedBigInteger('idEmpresa')->nullable();
            $table->unsignedBigInteger('idGrupo')->nullable();
            $table->char('baja', 1)->default('N');
            $table->char('usuario', 1)->nullable();
            $table->timestamp('fechaModificacion')->nullable();
            $table->dateTime('fechaCreacion')->nullable();
            
            $table->string('email')->nullable()->unique();
            $table->string('name')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};