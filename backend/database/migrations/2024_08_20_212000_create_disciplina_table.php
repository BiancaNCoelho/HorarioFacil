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
        Schema::create('disciplina', function (Blueprint $table) {
            $table->bigIncrements('id'); // Cria a coluna 'id' como chave primária auto-incrementada
            $table->string('nome'); // Nome da disciplina
            $table->string('codigo')->unique(); // Código da disciplina (único)
            $table->integer('carga_horaria'); // Carga horária da disciplina
            $table->timestamps(); // Cria as colunas 'created_at' e 'updated_at'
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
