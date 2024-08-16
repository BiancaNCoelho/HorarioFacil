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
        Schema::create('modificaçaos', function (Blueprint $table) {
		    $table->bigIncrements('id');
		    $table->unsignedBigInteger('usuario_id'); // Referência ao usuário que fez a modificação
		    $table->string('tipo_modificacao'); // Tipo de modificação (e.g., 'adicao', 'edicao', 'remocao')
		    $table->text('descricao'); // Descrição ou detalhes da modificação
		    $table->unsignedBigInteger('entidade_id'); // ID da entidade modificada (por exemplo, id da aula ou outro recurso)
		    $table->string('entidade_tipo'); // Tipo da entidade (e.g., 'aula', 'evento')
		    $table->timestamps();

		    // Adiciona uma chave estrangeira, assumindo que você tem uma tabela `usuarios`
		    $table->foreign('usuario_id')->references('id')->on('usuarios')->onUpdate('cascade')->onDelete('cascade');

		    // Se você deseja que `entidade_id` e `entidade_tipo` sejam indexados, adicione índices para melhorar a performance
		    $table->index(['entidade_id', 'entidade_tipo']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('modificaçaos');
    }
};
