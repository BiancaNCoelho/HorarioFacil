<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('aula', function (Blueprint $table) {
            $table->bigIncrementsid();
            $table->string('sala')->nullable();
            $table->time('horario_inicio');
            $table->time('horario_fim');
            $table->unsignedBigInteger('disciplina_id'); // Adiciona a coluna disciplina_id
            $table->foreign('disciplina_id')->references('id')->on('disciplina')->onUpdate('cascade')->onDelete('cascade');
            $table->json('semana');
            $table->string('predio');
            $table->string('turma');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aula');
    }
};
