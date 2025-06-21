<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->json('notificacoes')->nullable();
            $table->integer('raio_alerta')->nullable();
            $table->time('hora_inicio')->nullable();
            $table->time('hora_fim')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['notificacoes', 'raio_alerta', 'hora_inicio', 'hora_fim']);
        });
    }
};
