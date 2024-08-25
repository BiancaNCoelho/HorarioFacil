<?php

namespace Database\Factories;

use App\Models\Matricula;
use App\Models\Turma;
use App\Models\Usuario;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Matricula>
 */
class MatriculaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Matricula::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'usuario_id' => Usuario::query()->where('tipo_usuario', 'aluno')->inRandomOrder()->value('id') 
                ?? Usuario::factory()->state(['tipo_usuario' => 'aluno']),
            'turma_id' => Turma::query()->inRandomOrder()->value('id') ?? Turma::factory(),
            'matricula' => $this->faker->unique()->numerify('#########'), // Gera um número de matrícula de 9 dígitos
        ];
    }
}
