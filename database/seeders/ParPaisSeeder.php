<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ParPais;

class ParPaisSeeder extends Seeder
{
    public function run(): void
    {
        $paises = [
            ['nombre' => 'BOLIVIA', 'codigo' => 'BOL'],
            ['nombre' => 'PERÚ', 'codigo' => 'PER'],
            ['nombre' => 'ARGENTINA', 'codigo' => 'ARG'],
            ['nombre' => 'BRASIL', 'codigo' => 'BRA'],
            ['nombre' => 'CHILE', 'codigo' => 'CHI'],
        ];

        foreach ($paises as $pais) {
            ParPais::updateOrCreate(
                ['nombre' => $pais['nombre']],
                ['codigo' => $pais['codigo'], 'activo' => true]
            );
        }

        $this->command->info('✅ ' . count($paises) . ' países insertados.');
    }
}