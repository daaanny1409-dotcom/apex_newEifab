<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ParPais;
use App\Models\ParDepartamento;

class ParDepartamentoSeeder extends Seeder
{
    public function run(): void
    {
        // Buscar Bolivia
        $bolivia = ParPais::where('codigo', 'BOL')->first();

        if (!$bolivia) {
            $this->command->error('❌ No se encontró Bolivia. Ejecuta primero ParPaisSeeder.');
            return;
        }

        $departamentos = [
            ['nombre' => 'LA PAZ', 'extension' => 'LP'],
            ['nombre' => 'SANTA CRUZ', 'extension' => 'SC'],
            ['nombre' => 'COCHABAMBA', 'extension' => 'CB'],
            ['nombre' => 'ORURO', 'extension' => 'OR'],
            ['nombre' => 'POTOSÍ', 'extension' => 'PT'],
            ['nombre' => 'TARIJA', 'extension' => 'TJ'],
            ['nombre' => 'CHUQUISACA', 'extension' => 'CH'],
            ['nombre' => 'BENI', 'extension' => 'BN'],
            ['nombre' => 'PANDO', 'extension' => 'PD'],
        ];

        foreach ($departamentos as $dep) {
            ParDepartamento::updateOrCreate(
                ['nombre' => $dep['nombre']],
                [
                    'extension' => $dep['extension'],
                    'pais_id' => $bolivia->id,
                    'activo' => true,
                ]
            );
        }

        $this->command->info('✅ ' . count($departamentos) . ' departamentos de Bolivia insertados.');
    }
}