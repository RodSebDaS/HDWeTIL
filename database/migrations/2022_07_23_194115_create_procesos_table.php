<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('procesos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('descripcion');
            $table->unsignedBigInteger('incidencia_id');
            $table->unsignedBigInteger('flujoValor_id');
            $table->unsignedBigInteger('estado_id');
            $table->unsignedBigInteger('rol_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
            $table->text('comentario');
            $table->string('calificacion');

            $table
            ->foreign('incidencia_id')
            ->references('id')
            ->on('incidencias')
            ->onUpdate('CASCADE');
            //->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('procesos');
    }
};
