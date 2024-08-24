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
        return [
            'nome' => $this->faker->word(), // Nome da turma
            'disciplina_id' => Disciplina::factory(), // Cria uma disciplina relacionada
            'professor_id' => Usuario::factory()->state([
                'tipo_usuario' => 'professor', // Assegura que o usuário é um professor
            ]),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
