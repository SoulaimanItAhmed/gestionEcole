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
        Schema::create('notes', function (Blueprint $table) {
            $table->unsignedBigInteger('eleve_id')->nullable(false);
            $table->foreign('eleve_id')->references('id')->on('eleves')->onDelete('cascade');
            $table->unsignedBigInteger('matiere_id')->nullable(false);
            $table->foreign('matiere_id')->references('id')->on('matieres')->onDelete('cascade');
            $table->primary(['matiere_id','eleve_id']);
            $table->float('note')->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notes');
    }
};
