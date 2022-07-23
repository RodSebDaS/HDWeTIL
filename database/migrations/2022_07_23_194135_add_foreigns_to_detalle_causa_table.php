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
        Schema::table('detalle_causa', function (Blueprint $table) {
            $table
                ->foreign('causa_id')
                ->references('id')
                ->on('causas')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table
                ->foreign('incidencia_id')
                ->references('id')
                ->on('incidencias')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('detalle_causa', function (Blueprint $table) {
            $table->dropForeign(['causa_id']);
            $table->dropForeign(['incidencia_id']);
        });
    }
};
