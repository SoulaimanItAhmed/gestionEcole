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
        Schema::create('eleves', function (Blueprint $table) {
            $table->id();
            $table->string('nom', 255)->nullable(false);
            $table->string('prenom', 255)->nullable(false);
            $table->date('date_de_naissance')->nullable(false);
            $table->string('adresse', 255)->nullable(false);
            $table->string('telephone', 255)->nullable(false);
            $table->foreignId('classe_id')->references('id')->on('classes')->onDelete('cascade');
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('eleves');
    }
};
