<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['login' => 'admin'],
            [
                'password' => 'admin123',
                'name' => 'Administrador',
                'email' => 'admin@eifab.com.bo',
                'idPersona' => null,
                'idEmpresa' => 1,
                'idGrupo' => 1,
                'baja' => 'N',
                'usuario' => 'S',
            ]
        );

        $this->command->info('✅ Usuario admin listo (login: admin / password: admin123)');
    }
}