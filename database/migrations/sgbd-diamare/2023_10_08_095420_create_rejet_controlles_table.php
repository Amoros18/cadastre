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
        Schema::create('rejet_controlles', function (Blueprint $table) {
            $table->id();
            $table->string('numero_dossier');
            $table->string('motif');
            $table->string('etat')->nullable();
            $table->date('date_rejet');
            $table->string('controlleur')->nullable();
            $table->timestamps();

            $table->foreign('numero_dossier')->references('numero_dossier')->on('nouveau_dossiers')->onUpdate('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rejet_controlles');
    }
};
