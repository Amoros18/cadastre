<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NouveauDossier extends Model
{
    use HasFactory;

    
    protected $fillable =[
        'numero_ouverture',
        'numero_dossier',
        'nom_requerant',
        'telephone',
        'nature_dossier',
        'arrondissement',
        'zone',
        'quartier',
        'lieu_dit',
        'mappe',
        'bloc',
        'lot',
        'numero_feuille',
        'date_ouverture', // timestamps enregistre cela
        'geometre',
        'montant_recette',
        'cumule',
        'superficie_recette',
        'date_cession',  // a verifier
        'numero_quittance',
        'date_quittance', // a verifier
        'observation_recette', // a vrifier longtexte
        'montant_rattachement',
        'date_rattachement', // a verifier date
        'observation_rattachement', // a verifier longtexte
        'echelle',
        'dao',
        'point',
        'longitude',
        'latitude',
        'superficie',
        'date_ccp', // a verifie date
        'message_porter',
        'mise_en_valeur',
        'avis_main_courante', //a verifier longtexte
        'date_bornage', //a verifier date
        'observation_main_courante',
        's_c',
        'numero_ccp',
        'numero_controle',
        'controlleur_1',
        'date_controle_1', // a verifier date
        'controlleur_2',
        'date_controle_2', // averifier date
        'numero_mj',
        'verificateur',
        'avis_mj',
        'numero_visa',
        'date_visa',
    ];
}
