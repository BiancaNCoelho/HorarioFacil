<?php

namespace Database\Factories;

use App\Models\Aula;
use App\Models\Turma;
use Illuminate\Database\Eloquent\Factories\Factory;

class AulaFactory extends Factory
{
    protected $model = Aula::class;

    public function definition(): array
    {
        return [
            'nome' => $this->faker->word(),
            'turma_id' => Turma::factory(), // Cria uma nova Turma se nenhuma for especificada
            'dia_da_semana' => $this->faker->randomElement(['segunda', 'terça', 'quarta', 'quinta', 'sexta', 'sábado', 'domingo']),
            'horario' => $this->faker->time(),
            'sala' => $this->faker->word(),
            'campus' => $this->faker->word(),
            'local' => $this->faker->optional()->word(),
        ];
    }

    /**
     * Estado para associar a aula a uma turma específica.
     */
    public function comTurma(Turma $turma): static
    {
        return $this->state(fn(array $attributes) => [
            'turma_id' => $turma->id,
        ]);
    }
}
