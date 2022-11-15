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
            $table->string('titulo');
            $table->unsignedBigInteger('persona_id')->nullable();  
            $table->unsignedBigInteger('canal_id')->nullable();
            $table->unsignedBigInteger('prioridad_id')->nullable();
            $table->unsignedBigInteger('servicio_id')->nullable();
            $table->unsignedBigInteger('activo_id')->nullable();
            $table->timestamp('sla')->nullable();
            $table->text('descripcion');
            $table->string('adjunto')->nullable();
            $table->unsignedBigInteger('estado_id')->nullable();
            $table->unsignedBigInteger('flujovalor_id')->nullable();
            $table->unsignedBigInteger('user_id_created_at')->nullable();
            $table->unsignedBigInteger('user_id_updated_at')->nullable();
            $table->text('observacion')->nullable();
            $table->string('calificacion')->nullable();
            $table->boolean('activa')->nullable();
            $table->timestamps();
            $table->softDeletes();

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
