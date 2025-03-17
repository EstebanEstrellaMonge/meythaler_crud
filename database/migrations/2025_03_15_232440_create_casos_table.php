<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCasosTable extends Migration
{
    public function up()
    {
        Schema::create('casos', function (Blueprint $table) {
            $table->increments('id'); // Clave primaria
            $table->string('titulo');
            $table->text('descripcion');
            $table->enum('estado', ['abierto', 'en proceso', 'cerrado'])->default('abierto');
            $table->unsignedInteger('usuario_id'); // Asegurar que solo haya una declaración de usuario_id
            $table->foreign('usuario_id')->references('id')->on('usuarios')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('casos');
    }
}
