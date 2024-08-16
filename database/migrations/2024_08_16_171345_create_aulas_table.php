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
        Schema::create('aulas', function (Blueprint $table) {
		$table->bigIncrements('id');
		$table->unsignedBigInteger('disciplina_id'); // Usando unsignedBigInteger para chaves estrangeiras
		$table->unsignedBigInteger('professor_id');
		$table->string('sala');
		$table->time('horario_inicio'); // Horário de início da aula
		$table->time('horario_fim');    // Horário de término da aula
		$table->string('dia');         // Dia da semana ou data da aula
		$table->timestamps();

		// Definindo chaves estrangeiras (caso você tenha tabelas relacionadas)
		$table->foreign('disciplina_id')->references('id')->on('disciplinas')->onUpdate('cascade')->onDelete('cascade');
		$table->foreign('professor_id')->references('id')->on('usuarios')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aulas');
    }
};
