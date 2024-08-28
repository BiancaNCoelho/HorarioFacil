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
            $table->string('nome');
            $table->unsignedBigInteger('turma_id');
            $table->foreign('turma_id')->references('id')->on('turmas')->onUpdate('cascade')->onDelete('cascade');
            $table->boolean('cancelada')->default(false);
            $table->enum('dia_da_semana', ['segunda', 'terça', 'quarta', 'quinta', 'sexta', 'sábado', 'domingo']);
            $table->enum('horario', ['08:00','10:00','13:30','15:10','16:50']);
            $table->string('sala');
            $table->string('campus');
            $table->string('local')->nullable();
            $table->timestamps();
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
