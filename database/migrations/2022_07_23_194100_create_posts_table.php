<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
   
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('tipo_id');
            $table->string('tipo_nombre')->nullable();
            $table->string('titulo');
            $table->unsignedBigInteger('persona_id')->nullable();  
            $table->unsignedBigInteger('prioridad_id')->nullable();
            $table->string('prioridad_nombre')->nullable();
            $table->unsignedBigInteger('servicio_id')->nullable();
            $table->string('servicio_nombre')->nullable();
            $table->unsignedBigInteger('activo_id')->nullable();
            $table->string('activo_nombre')->nullable();
            $table->dateTime('sla')->nullable();
            $table->text('descripcion');
            $table->string('mensaje')->nullable();
            $table->unsignedBigInteger('estado_id')->nullable();
            $table->string('estado_nombre')->nullable();
            $table->unsignedBigInteger('flujovalor_id')->nullable();
            $table->string('flujovalor_nombre')->nullable();
            $table->unsignedBigInteger('user_id_created_at')->nullable();
            $table->string('user_name_created_at')->nullable();
            $table->unsignedBigInteger('user_id_updated_at')->nullable();
            $table->string('user_name_updated_at')->nullable();
            $table->unsignedBigInteger('user_id_asignated_at')->nullable();
            $table->string('user_name_asignated_at')->nullable();
            $table->unsignedBigInteger('user_id_closed_at')->nullable();
            $table->string('user_name_closed_at')->nullable();
            $table->unsignedBigInteger('user_id_reject_at')->nullable();
            $table->string('user_name_reject_at')->nullable();
            $table->text('respuesta')->nullable();
            $table->text('observacion')->nullable();
            $table->string('calificacion')->nullable();
            $table->string('votos')->nullable();
            $table->boolean('activa')->nullable();
            $table->timestamps();
            $table->softDeletes();

            //$table->index(['tipo_id', 'titulo'], 'indice_post');

            /* $table
                ->foreign('persona_id')
                ->references('id')
                ->on('personas')
                ->onUpdate('CASCADE');

            $table
                ->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onUpdate('CASCADE'); */
        });
    }


    public function down()
    {
        Schema::dropIfExists('posts');
    }
};
