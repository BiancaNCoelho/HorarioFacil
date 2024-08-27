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

        // Criando disciplinas
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

        // Criando turmas
        $turmaFIA = Turma::create([
            'nome' => 'FIA 2024-2',
            'disciplina_id' => $FIA->id,
            'professor_id' => $ferrugem->id,
            'data_inicio' => now()->subMonths(3),
            'data_fim' => now()->addMonths(3)
        ]);

        $turmaTECIII = Turma::create([
            'nome' => 'TECIII 2024-2',
            'disciplina_id' => $TECIII->id,
            'professor_id' => $patricia->id,
            'data_inicio' => now()->subMonths(3),
            'data_fim' => now()->addMonths(3),
        ]);

        // Cadastrando o aluno nas turmas
        Matricula::factory()->create([
            'usuario_id' => $aluno->id,
            'matricula' => $aluno->matricula,
            'turma_id' => $turmaFIA->id,
        ]);

        Matricula::factory()->create([
            'usuario_id' => $aluno->id,
            'matricula' => $aluno->matricula,
            'turma_id' => $turmaTECIII->id,
        ]);

        // Adicionando aulas para a turma FIA
        Aula::create([
            'turma_id' => $turmaFIA->id,
            'dia_da_semana' => 'segunda',
            'horario' => '08:00',
            'sala' => '101',
            'campus' => 'Centro',
        ]);

        Aula::create([
            'turma_id' => $turmaFIA->id,
            'dia_da_semana' => 'quarta',
            'horario' => '10:00',
            'sala' => '102',
            'campus' => 'Centro',
        ]);

        // Adicionando aulas para a turma TECIII
        Aula::create([
            'turma_id' => $turmaTECIII->id,
            'dia_da_semana' => 'terça',
            'horario' => '15:10',
            'sala' => '201',
            'campus' => 'Norte',
        ]);

        Aula::create([
            'turma_id' => $turmaTECIII->id,
            'dia_da_semana' => 'quinta',
            'horario' => '15:10',
            'sala' => '202',
            'campus' => 'Norte',
        ]);

        $turmaFIA->load('aulas');
        $turmaTECIII->load('aulas');

        // Associe o aluno às aulas da turma FIA
        foreach ($turmaFIA->aulas as $aula) {
            $aula->alunos()->attach($aluno->id);
        }

        // Associe o aluno às aulas da turma TECIII
        foreach ($turmaTECIII->aulas as $aula) {
            $aula->alunos()->attach($aluno->id);
        }
    }
}
