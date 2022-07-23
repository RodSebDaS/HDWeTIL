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
        Schema::create('incidencias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->timestamp('sla')->nullable();
            $table->text('descripcion');
            $table->unsignedBigInteger('persona_id');
            $table->unsignedBigInteger('canal_id');
            $table->unsignedBigInteger('servicio_id');
            $table->unsignedBigInteger('prioridad_id');
            $table->unsignedBigInteger('estado_id');
            $table->unsignedBigInteger('flujoValor_id');
            $table->unsignedBigInteger('nivelActuacion_id');
            $table->unsignedBigInteger('user_id');
            $table->boolean('activa');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('incidencias');
    }
};
