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
        Schema::create('_notificacao', function (Blueprint $table) {
            $table->bigIncrementsid();
            $table->text('texto');
            $table->string('tipo_notificacao');
            $table->date('data');
            $table->time('hora');
            $table->boolean('is_read');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('_notificacao');
    }
};
