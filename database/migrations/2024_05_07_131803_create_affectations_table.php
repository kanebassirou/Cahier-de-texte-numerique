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
        Schema::create('affectations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('classe_id');
            $table->unsignedBigInteger('module_id'); // Ajout de module_id
            $table->unsignedBigInteger('user_id')->nullable(); // Permettre NULL pour user_id
            $table->integer('quantum');
            $table->timestamps();

            // Clés étrangères
            $table->foreign('classe_id')->references('id')->on('classes')->onDelete('cascade');
            $table->foreign('module_id')->references('id')->on('modules')->onDelete('cascade'); // Contrainte pour module_id
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null'); // Contrainte pour user_id
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('affectations');
    }
};
