<?php

namespace Database\Seeders;

use App\Models\Aula;
use App\Models\Matricula;
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

        // Criando o Ferrugem
        $ferrugem = Usuario::factory()->professor()->create([
            'name' => 'Anderson Ferrugem',
            'email' => 'ferrugem@inf.ufpel.edu.br',
        ]);

        // Criando a Patricia
        $patricia = Usuario::factory()->professor()->create([
            'name' => 'Patricia Agustin',
            'email' => 'patricia@inf.ufpel.edu.br',
        ]);
        // Criando 1 aluno
        $aluno = Usuario::factory()->aluno()->create([
            'name' => 'Aluno User',
            'email' => 'aluno@example.com',
        ]);

        $FIA = Disciplina::create([
            'nome' => 'Fundamentos de IA',
            'codigo' => 2300099,
            'carga_horaria' => 4,
        ]);

        $TECIII = Disciplina::create([
            'nome' => 'TEC III',
            'codigo' => 2300101,
            'carga_horaria' => 2,
        ]);

        Turma::create([
            'nome' => 'T1',
            'disciplina_id' => $FIA->id,
            'professor_id' => $ferrugem->id,
            'data_inicio' => now()->subMonths(3),
            'data_fim' => now()->addMonths(3)
        ]);

        Turma::create([
            'nome' => 'T1',
            'disciplina_id' => $TECIII->id,
            'professor_id' => $patricia->id,
            'data_inicio' => now()->subMonths(3),
            'data_fim' => now()->addMonths(3),
        ]);

        // Cadastrando o aluno na turma FIA
        Matricula::factory()->create([
            'usuario_id' => $aluno->id,
            'matricula' => $aluno->matricula,
            'turma_id' => $FIA->id,
        ]);

        // Cadastrando o aluno na turma TECIII
        Matricula::factory()->create([
            'usuario_id' => $aluno->id,
            'matricula' => $aluno->matricula,
            'turma_id' => $TECIII->id,
        ]);
    }
}