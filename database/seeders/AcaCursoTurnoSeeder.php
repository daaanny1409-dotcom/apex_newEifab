<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AcaCursoTurno;

class AcaCursoTurnoSeeder extends Seeder
{
    public function run(): void
    {
        $turnos = [
            [
                'descripcion' => 'MAÑANA',
                'lunes' => true,
                'martes' => true,
                'miercoles' => true,
                'jueves' => true,
                'viernes' => true,
                'sabado' => false,
                'domingo' => false,
                'hora_inicio' => '07:00',
                'hora_fin' => '12:00',
            ],
            [
                'descripcion' => 'TARDE',
                'lunes' => true,
                'martes' => true,
                'miercoles' => true,
                'jueves' => true,
                'viernes' => true,
                'sabado' => false,
                'domingo' => false,
                'hora_inicio' => '14:00',
                'hora_fin' => '19:00',
            ],
            [
                'descripcion' => 'SÁBADOS',
                'lunes' => false,
                'martes' => false,
                'miercoles' => false,
                'jueves' => false,
                'viernes' => false,
                'sabado' => true,
                'domingo' => false,
                'hora_inicio' => '08:00',
                'hora_fin' => '13:00',
            ],
        ];

        foreach ($turnos as $turno) {
            AcaCursoTurno::updateOrCreate(
                ['descripcion' => $turno['descripcion']],
                array_merge($turno, ['activo' => true])
            );
        }

        $this->command->info('✅ ' . count($turnos) . ' turnos insertados.');
    }
}