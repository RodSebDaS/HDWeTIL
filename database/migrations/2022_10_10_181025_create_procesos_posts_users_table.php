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
        Schema::create('procesos_posts_users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('post_id');
            $table->string('titulo')->nullable();
            $table->unsignedBigInteger('tipo_id');
            $table->unsignedBigInteger('prioridad_id')->nullable();
            $table->unsignedBigInteger('estado_id')->nullable();
            $table->unsignedBigInteger('flujovalor_id')->nullable();
            $table->unsignedBigInteger('servicio_id')->nullable();
            $table->string('servicio_nombre')->nullable();
            $table->unsignedBigInteger('activo_id')->nullable();
            $table->string('activo_nombre')->nullable();
            $table->timestamp('sla')->nullable();
            $table->text('descripcion');
            $table->text('observacion')->nullable();
            $table->boolean('activa')->nullable();
            $table->string('role_user_created_at')->nullable();
            $table->unsignedBigInteger('user_id_created_at')->nullable();
            $table->string('user_name_created_at')->nullable();
            $table->string('user_email_created_at')->nullable();
            $table->unsignedBigInteger('level_created_at')->nullable();
            $table->string('role_user_updated_at')->nullable;
            $table->unsignedBigInteger('user_id_updated_at')->nullable();
            $table->string('user_name_updated_at')->nullable();
            $table->string('user_email_updated_at')->nullable();
            $table->unsignedBigInteger('level_updated_at')->nullable();
            $table->string('role_user_asignated_at')->nullable();
            $table->unsignedBigInteger('user_id_asignated_at')->nullable();
            $table->string('user_name_asignated_at')->nullable();
            $table->string('user_email_asignated_at')->nullable();
            $table->unsignedBigInteger('level_asignated_at')->nullable();
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
        Schema::dropIfExists('procesos_posts_users');
    }
};
