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
        Schema::create('notificacaos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('usuario_id'); // Referência ao usuário que recebe a notificação
            $table->string('type'); // Tipo de notificação (e.g., 'aula_cancelada', 'mudanca_local')
            $table->text('message'); // Conteúdo da notificação
            $table->boolean('is_read')->default(false); // Indica se a notificação foi lida
            $table->timestamps();

            // Adiciona uma chave estrangeira, assumindo que você tem uma tabela `users`
            $table->foreign('usuario_id')->references('id')->on('usuarios')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notificacaos');
    }
};
