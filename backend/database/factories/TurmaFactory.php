<?php

namespace Database\Factories;

use App\Models\Turma;
use App\Models\Disciplina;
use App\Models\Usuario;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Turma>
 */
class TurmaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Turma::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Definindo data de início e data de fim
        $dataInicio = $this->faker->dateTimeBetween('-1 year', 'now');
        $dataFim = $this->faker->dateTimeBetween($dataInicio, '+1 year');

        return [
            'nome' => $this->faker->word(), // Nome da turma

            // Seleciona uma disciplina existente ou cria uma nova
            'disciplina_id' => Disciplina::query()->inRandomOrder()->value('id') ?? Disciplina::factory(),

            // Seleciona um professor existente ou cria um novo
            'professor_id' => Usuario::query()->where('tipo_usuario', 'professor')->inRandomOrder()->value('id') 
                ?? Usuario::factory()->state([
                    'tipo_usuario' => 'professor',
                ]),

            'data_inicio' => $dataInicio,
            'data_fim' => $dataFim,
            
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
