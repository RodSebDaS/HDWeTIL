<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
   
    public function up()
    {
        Schema::create('incidencias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('titulo');
            $table->unsignedBigInteger('persona_id')->nullable();  
            $table->unsignedBigInteger('canal_id')->nullable();
            $table->unsignedBigInteger('prioridad_id')->nullable();
            $table->unsignedBigInteger('especificacionservicio_id')->nullable();
            $table->timestamp('sla')->nullable();
            $table->text('descripcion');
            $table->string('adjunto')->nullable();
            $table->unsignedBigInteger('estado_id');
            $table->unsignedBigInteger('flujovalor_id');
            $table->unsignedBigInteger('user_id');
            $table->boolean('activa');
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
        Schema::dropIfExists('incidencias');
    }
};
