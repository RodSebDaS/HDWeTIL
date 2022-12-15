<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('descripcion')->nullable();
            $table->date('fecha_adquisicion')->nullable();
            $table->decimal('valor')->nullable();
            $table->integer('stock');
            $table->unsignedBigInteger('categoria_id')->nullable();
            $table->unsignedBigInteger('marca_id')->nullable();
            $table->unsignedBigInteger('modelo_id')->nullable();
            $table->unsignedBigInteger('estado_id')->nullable();
            $table->unsignedBigInteger('area_id')->nullable();
            $table->string('image_url')->nullable();
            $table->string('cod_prosupuesto')->nullable;
            $table->string('categoria_nombre')->nullable();
            $table->string('vida_util')->nullable;
            $table->string('amortizacion')->nullable;
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
        Schema::dropIfExists('activos');
    }
};
