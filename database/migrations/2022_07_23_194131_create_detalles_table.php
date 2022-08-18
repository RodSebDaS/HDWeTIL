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
        Schema::create('detalles', function (Blueprint $table) {
            $table->unsignedBigInteger('id');
            $table->unsignedBigInteger('incidencia_id');
            $table->unsignedBigInteger('especificacionActivo_id');
            $table->integer('catidad');
            $table->unsignedBigInteger('diagnostico_id');
            $table->string('descripcion');
            $table->timestamps();

        
            $table
            ->foreign('incidencia_id')
            ->references('id')
            ->on('incidencias')
            ->onUpdate('CASCADE');
            //->onDelete('CASCADE');

            $table
            ->foreign('diagnostico_id')
            ->references('id')
            ->on('diagnosticos')
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
        Schema::dropIfExists('detalles');
        //$table->dropForeign(['incidencia_id']);
        //$table->dropForeign(['diagnostico_id']);
    }
};
