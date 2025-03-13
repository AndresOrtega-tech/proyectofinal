<?php

namespace Database\Seeders;

use App\Models\Project; // Importar el modelo Project
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Project::factory()->count(10)->create(); // Crear 10 proyectos usando ProjectFactory
    }
}
