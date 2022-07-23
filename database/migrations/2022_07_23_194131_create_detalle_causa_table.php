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
        Schema::create('detalle_causa', function (Blueprint $table) {
            $table->unsignedBigInteger('id');
            $table->unsignedBigInteger('causa_id');
            $table->unsignedBigInteger('incidencia_id');
            $table->string('descripcion');
            $table->integer('catidad');
            $table->unsignedBigInteger('especificacionActivo_id');

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
        Schema::dropIfExists('detalle_causa');
    }
};
