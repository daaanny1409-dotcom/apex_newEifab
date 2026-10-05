<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'login' => 'admin',
            'password' => 'admin123',
            'name' => 'Administrador',
            'email' => 'admin@eifab.com.bo',
            'idPersona' => null,
            'idEmpresa' => 1,
            'idGrupo' => 1,
            'baja' => 'N',
            'usuario' => 'S',
        ]);

        echo "Usuario admin creado con contraseña admin123\n";
    }
}