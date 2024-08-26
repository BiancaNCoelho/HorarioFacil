<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAulaUsuarioTable extends Migration
{
    public function up()
    {
        Schema::create('aula_usuario', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('aula_id');
            $table->unsignedBigInteger('usuario_id');
            $table->timestamps();

            $table->foreign('aula_id')->references('id')->on('aulas')->onDelete('cascade');
            $table->foreign('usuario_id')->references('id')->on('usuarios')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('aula_usuario');
    }
}
