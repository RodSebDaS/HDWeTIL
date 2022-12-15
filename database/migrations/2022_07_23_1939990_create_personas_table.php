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
        Schema::create('personas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('tipo_id')->nullable();
            $table->string('nombre');
            $table->string('apellido')->nullable();
            $table->string('dni')->nullable();
            $table->string('cuit')->nullable();
            $table->string('descripcion')->nullable();
            $table->unsignedBigInteger('area_id')->nullable();
            $table->boolean('activa')->nullable();
            $table->unsignedBigInteger('estado_id')->nullable();
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
        Schema::dropIfExists('personas');
    }
};
