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
        Schema::create('transmission_delegues', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('nouveau_dossier_id');
            $table->date('date_transmission');
            $table->date('date_reception')->nullable();
            $table->string('motif');
            $table->enum('statut',['ENVOYER','RECUPERER','INCONNU']);
            $table->foreign('nouveau_dossier_id')->references('id')->on('nouveau_dossiers')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transmission_delegues');
    }
};
