<?php

namespace Database\Seeders;

use App\Models\Aula;
use App\Models\Disciplina;
use App\Models\Turma;
use Illuminate\Database\Seeder;
use App\Models\Usuario;


class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Criando 1 administrador
        Usuario::factory()->administrador()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
        ]);

        // Criando 1 professor
        Usuario::factory()->professor()->create([
            'name' => 'Professor User',
            'email' => 'professor@example.com',
        ]);

        // Criando 1 aluno
        Usuario::factory()->aluno()->create([
            'name' => 'Aluno User',
            'email' => 'aluno@example.com',
        ]);
        Disciplina::factory()->count(3)->create();
        Turma::factory()->count(3)->create();
        Aula::factory()->count(2)->create();
    }
}