<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Usuario;
use App\Models\Disciplina;
use App\Models\Turma;
use App\Models\Aula;
use App\Models\Notificacao;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Cria alguns usuários
        Usuario::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'tipo_usuario' => 'administrador',
            'senha' => Hash::make('password'),
        ]);

        Usuario::factory()->create([
            'name' => 'Professor User',
            'email' => 'professor@example.com',
            'tipo_usuario' => 'professor',
            'senha' => Hash::make('password'),
        ]);

        Usuario::factory()->create([
            'name' => 'Student User',
            'email' => 'student@example.com',
            'tipo_usuario' => 'aluno',
            'senha' => Hash::make('password'),
        ]);

        // Cria algumas disciplinas
        $disciplina1 = Disciplina::create([
            'codigo' => 'DIS101',
            'nome' => 'Matemática',
            'carga_horaria' => 60,
        ]);

        $disciplina2 = Disciplina::create([
            'codigo' => 'DIS102',
            'nome' => 'Física',
            'carga_horaria' => 45,
        ]);

        // Cria algumas turmas
        $turma1 = Turma::create([
            'nome' => 'Turma A',
            'disciplina_id' => $disciplina1->id,
            'professor_id' => Usuario::where('tipo_usuario', 'professor')->first()->id,
        ]);

        $turma2 = Turma::create([
            'nome' => 'Turma B',
            'disciplina_id' => $disciplina2->id,
            'professor_id' => Usuario::where('tipo_usuario', 'professor')->first()->id,
        ]);

        // Cria algumas aulas
        Aula::create([
            'turma_id' => $turma1->id,
            'dia_da_semana' => 'segunda',
            'horario' => '08:00:00',
            'sala' => '101',
            'campus' => 'Campus A',
            'local' => 'Bloco 1',
        ]);

        Aula::create([
            'turma_id' => $turma2->id,
            'dia_da_semana' => 'quarta',
            'horario' => '10:00:00',
            'sala' => '202',
            'campus' => 'Campus B',
            'local' => 'Bloco 2',
        ]);

        // Cria algumas notificações
        Notificacao::create([
            'texto' => 'Aula cancelada.',
            'tipo_notificacao' => 'cancelamento',
            'data' => now()->format('Y-m-d'),
            'hora' => now()->format('H:i:s'),
            'is_read' => false,
            'usuario_id' => Usuario::where('tipo_usuario', 'aluno')->first()->id,
        ]);
    }
}
