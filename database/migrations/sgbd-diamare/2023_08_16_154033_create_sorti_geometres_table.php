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
        Schema::create('sorti_geometres', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('nouveau_dossier_id');
            $table->date('date_travaux');
            $table->string('liste_materiaux');
            $table->string('observation');
            $table->string('liste_geometre');
            $table->timestamps();

            $table->foreign('nouveau_dossier_id')->references('id')->on('nouveau_dossiers')->onUpdate('cascade')->onUpdate('cascade');

        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sorti_geometres');
    }
};
