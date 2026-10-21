<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            ParPaisSeeder::class,
            ParDepartamentoSeeder::class,
            AdmPersonaSeeder::class,
        ]);
    }
}<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            ParPaisSeeder::class,
            ParDepartamentoSeeder::class,
            AdmPersonaSeeder::class,
        ]);
    }
}