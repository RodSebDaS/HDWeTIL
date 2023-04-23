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
        Schema::create('procesos_comentarios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('post_id');
            $table->string('role_user_created_at')->nullable();
            $table->unsignedBigInteger('user_id_created_at')->nullable();
            $table->string('user_name_created_at')->nullable();
            $table->string('user_email_created_at')->nullable();
            $table->string('role_user_updated_at')->nullable();
            $table->unsignedBigInteger('user_id_updated_at')->nullable();
            $table->string('user_name_updated_at')->nullable();
            $table->string('user_email_updated_at')->nullable();
            $table->unsignedBigInteger('comentario_id');
            $table->text('mensaje')->nullable();
            $table->string('calificacion')->nullable();
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
        Schema::dropIfExists('procesos_comentarios');
    }
};