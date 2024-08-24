<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use App\Faker\CpfProvider;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Usuario>
 */
class UsuarioFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password = null;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = $this->faker;
        $faker->addProvider(new CpfProvider($faker));
        
        return [
            'name' => $faker->name(),
            'cpf' => $faker->cpf,
            'email' => $faker->unique()->safeEmail(),
            'senha' => static::$password ??= Hash::make('password'),
            'tipo_usuario' => $faker->randomElement(['aluno', 'professor', 'administrador']),
            'departamento' => $faker->word(),
            'curso' => $faker->word(),
            'nivel' => $faker->numberBetween(0, 2), // Ajuste o intervalo conforme seus níveis
        ];
    }

    /**
     * Estado para criar um usuário do tipo administrador.
     */
    public function administrador(): static
    {
        return $this->state(fn(array $attributes) => [
            'tipo_usuario' => 'administrador',
            'nivel' => 2, // Nivel para administrador
            'senha' => 'admin',
        ]);
    }

    /**
     * Estado para criar um usuário do tipo professor.
     */
    public function professor(): static
    {
        return $this->state(fn(array $attributes) => [
            'tipo_usuario' => 'professor',
            'nivel' => 1, // Nivel para professor
        ]);
    }

    /**
     * Estado para criar um usuário do tipo aluno.
     */
    public function aluno(): static
    {
        return $this->state(fn(array $attributes) => [
            'tipo_usuario' => 'aluno',
            'nivel' => 0, // Nivel para aluno
        ]);
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified(): static
    {
        return $this->state(fn(array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}