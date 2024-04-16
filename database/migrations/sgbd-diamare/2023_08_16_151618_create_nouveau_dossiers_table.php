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
        Schema::create('nouveau_dossiers', function (Blueprint $table) {
            $table->id();
            //$table->string('numero_ouverture')->unique();
            $table->string('numero_dossier')->nullable()->unique();
            $table->string('nom_requerant');
            $table->integer('telephone')->nullable();
            $table->string('nature_dossier')->nullable();
            $table->string('arrondissement')->nullable();
            $table->string('zone')->nullable();
            $table->string('quartier')->nullable();
            $table->string('lieu_dit')->nullable();
            $table->string('mappe')->nullable();
            $table->string('bloc')->nullable();
            $table->string('lot')->nullable();
            $table->string('numero_feuille')->nullable();
            $table->date('date_ouverture')->nullable();
            $table->string('geometre')->nullable();
            $table->integer('montant_recette')->nullable();
            $table->string('cumule')->nullable();
            $table->string('superficie_recette')->nullable();
            $table->date('date_cession')->nullable();
            $table->string('numero_quittance')->nullable();
            $table->date('date_quittance')->nullable();
            $table->string('observation_recette')->nullable();
            $table->integer('montant_rattachement')->nullable();
            $table->date('date_rattachement')->nullable();
            $table->string('observation_rattachement')->nullable();
            $table->string('echelle')->nullable();
            $table->string('dao')->nullable();
            $table->string('point')->nullable();
            $table->string('longitude')->nullable();
            $table->string('latitude')->nullable();
            $table->integer('superficie')->nullable();
            $table->date('date_ccp')->nullable();
            $table->string('message_porter')->nullable();
            $table->string('mise_en_valeur')->nullable();
            $table->string('avis_main_courante')->nullable();
            $table->date('date_bornage')->nullable();
            $table->string('observation_main_courante')->nullable();
            $table->string('s_c')->nullable();
            $table->string('numero_ccp')->nullable();
            $table->string('numero_controle')->nullable();
            $table->string('controlleur_1')->nullable();
            $table->date('date_controle_1')->nullable();
            $table->string('controlleur_2')->nullable();
            $table->date('date_controle_2')->nullable();
            $table->string('numero_mj')->nullable();
            $table->string('verificateur')->nullable();
            $table->string('avis_mj')->nullable();
            $table->string('numero_visa')->nullable();
            $table->date('date_visa')->nullable();
            $table->string('status')->nullable();
            $table->string('type_coordonnees')->nullable();
            $table->string('numero_decision')->nullable();
            $table->string('titre_foncier')->nullable();
            $table->timestamps();

            $table->foreign('numero_decision')->references('numero_decision')->on('decisions')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nouveau_dossiers');
    }
};
