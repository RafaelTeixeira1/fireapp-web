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
        Schema::create('incendios', function (Blueprint $table) {
            $table->id();
            $table->string('tipo');
            $table->string('gravidade');
            $table->text('descricao');
            $table->string('ponto_referencia')->nullable();
            $table->longText('area_poligono')->nullable(); // campo para armazenar o polígono
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('incendios');
    }
};
