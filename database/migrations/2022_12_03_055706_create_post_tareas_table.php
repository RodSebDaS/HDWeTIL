<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostTareasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_tareas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tarea_id')->nullable();
            $table->unsignedBigInteger('post_id')->nullable();
            $table->unsignedBigInteger('id_user_created_at')->nullable();
            $table->unsignedBigInteger('id_user_updated_at')->nullable();
            $table->text('respuesta')->nullable();
            $table->boolean('activa');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post_tareas');
    }
}
