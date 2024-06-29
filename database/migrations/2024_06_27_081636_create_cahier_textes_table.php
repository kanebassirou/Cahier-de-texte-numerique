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
        Schema::create('cahier_textes', function (Blueprint $table) {
            $table->id();
            $table->string('cours');
            $table->time('heure');
            $table->date('jour');
            $table->string('coutenuCour');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cahier_textes');
    }
};
