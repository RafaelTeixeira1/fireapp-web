<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('incendios', function (Blueprint $table) {
            $table->longText('area_poligono')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('incendios', function (Blueprint $table) {
            $table->dropColumn('area_poligono');
        });
    }
};
