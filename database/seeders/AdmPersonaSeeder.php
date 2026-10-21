<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AdmPersona;

class AdmPersonaSeeder extends Seeder
{
    public function run(): void
    {
        $personas = [
            [
                'nombre' => 'JUAN CARLOS',
                'paterno' => 'PEREZ',
                'materno' => 'GOMEZ',
                'sexo' => 'M',
                'fecha_nacimiento' => '2000-05-15',
                'nro_documento' => '12345678',
                'email' => 'juan.perez@test.com',
                'telefono' => '71234567',
                'direccion' => 'Av. 6 de Agosto #123',
                'tipo_persona' => 'estudiante',
            ],
            [
                'nombre' => 'MARIA FERNANDA',
                'paterno' => 'LOPEZ',
                'materno' => 'ROJAS',
                'sexo' => 'F',
                'fecha_nacimiento' => '1999-08-22',
                'nro_documento' => '87654321',
                'email' => 'maria.lopez@test.com',
                'telefono' => '72345678',
                'direccion' => 'Calle Comercio #456',
                'tipo_persona' => 'estudiante',
            ],
            [
                'nombre' => 'PEDRO ANTONIO',
                'paterno' => 'MAMANI',
                'materno' => 'CHOQUE',
                'sexo' => 'M',
                'fecha_nacimiento' => '2001-03-10',
                'nro_documento' => '11223344',
                'email' => 'pedro.mamani@test.com',
                'telefono' => '73456789',
                'direccion' => 'Av. Arce #789',
                'tipo_persona' => 'estudiante',
            ],
            [
                'nombre' => 'ROBERTO CARLOS',
                'paterno' => 'GUTIERREZ',
                'materno' => 'FLORES',
                'sexo' => 'M',
                'fecha_nacimiento' => '1985-07-12',
                'nro_documento' => '55667788',
                'email' => 'roberto.gutierrez@test.com',
                'telefono' => '74567890',
                'direccion' => 'Calle Potosí #321',
                'tipo_persona' => 'docente',
            ],
            [
                'nombre' => 'ANA LUCIA',
                'paterno' => 'VARGAS',
                'materno' => 'SALAZAR',
                'sexo' => 'F',
                'fecha_nacimiento' => '1990-11-30',
                'nro_documento' => '44332211',
                'email' => 'ana.vargas@test.com',
                'telefono' => '75678901',
                'direccion' => 'Av. Ballivián #654',
                'tipo_persona' => 'administrativo',
            ],
        ];

        foreach ($personas as $persona) {
            AdmPersona::updateOrCreate(
                ['nro_documento' => $persona['nro_documento']],
                array_merge($persona, ['activo' => true])
            );
        }

        $this->command->info('✅ ' . count($personas) . ' personas insertadas (3 estudiantes, 1 docente, 1 administrativo).');
    }
}