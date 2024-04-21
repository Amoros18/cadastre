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
        Schema::create('quittances', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('nouveau_dossier_id');
            $table->string('numero_quittance');
            $table->integer('montant_recette')->nullable();
            $table->string('cumule')->nullable();
            $table->string('superficie_recette')->nullable();
            $table->date('date_cession')->nullable();
            $table->date('date_quittance')->nullable();
            $table->string('observation_recette')->nullable();
            $table->timestamps();

            $table->unique(['numero_quittance','date_quittance']);
            $table->foreign('nouveau_dossier_id')->references('id')->on('nouveau_dossiers')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quittances');
    }
};
