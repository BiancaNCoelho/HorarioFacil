<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('usuarios', function (Blueprint $table) {
		$table->bigIncrements('id');
		$table->string('name');                        // Nome do usuário
		$table->string('cpf')->unique();               // CPF (usando string para armazenar caracteres e evitar problemas com zeros à esquerda)
		$table->string('email')->unique();             // Email (corrigido para 'email')
		$table->string('senha');                       // Senha (pode ser 'text' se necessário)
		$table->enum('tipo_usuario', ['aluno', 'professor', 'administrador']); // Tipo do usuário
		$table->string('departamento')->nullable();    // Departamento (pode ser nulo para alguns tipos de usuário)
		$table->string('curso')->nullable();           // Curso (pode ser nulo para alguns tipos de usuário)
		$table->unsignedTinyInteger('nivel');          // Nível do administrador (0-aluno, 1-professor, 2-admin)
		$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
