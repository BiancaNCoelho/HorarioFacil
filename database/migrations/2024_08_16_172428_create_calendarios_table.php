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
        Schema::create('calendarios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('usuario_id'); // Referência ao professor ou administrador que criou o horário
            $table->unsignedBigInteger('disciplina_id'); // Referência à disciplina
            $table->string('dia_semana'); // Dia da semana (e.g., 'segunda-feira', 'terça-feira')
            $table->time('hora_inicio'); // Horário de início da aula
            $table->time('hora_fim'); // Horário de término da aula
            $table->string('local'); // Local onde a aula será realizada
            $table->timestamps();

            // Adiciona uma chave estrangeira, assumindo que você tem uma tabela `usuarios`
            $table->foreign('usuario_id')->references('id')->on('usuarios')->onUpdate('cascade')->onDelete('cascade');

            // Adiciona uma chave estrangeira, assumindo que você tem uma tabela `disciplinas`
            $table->foreign('disciplina_id')->references('id')->on('disciplinas')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('calendarios');
    }
};
