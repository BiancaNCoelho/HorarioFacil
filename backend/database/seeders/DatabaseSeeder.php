<?php

namespace Database\Seeders;

use App\Models\Aula;
use App\Models\Disciplina;
use App\Models\Turma;
use Illuminate\Database\Seeder;
use App\Models\Usuario;
use Hash;


class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Criando 1 administrador
        Usuario::factory()->administrador()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('admin')
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
        $disciplinas = [
            [
                'nome' => 'A&P',
                'codigo' => '2300099',
                'carga_horaria' => 4,
            ],
            [
                'nome' => 'Banco de Dados',
                'codigo' => '2300100',
                'carga_horaria' => 4,
            ],
            [
                'nome' => 'Engenharia de Software',
                'codigo' => '2300101',
                'carga_horaria' => 4,
            ]
        ];
        foreach ($disciplinas as $disciplina) {
            Disciplina::create($disciplina);
        }
        Turma::factory()->count(3)->create();
        Aula::factory()->count(2)->create();
    }
}