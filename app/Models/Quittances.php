<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quittances extends Model
{
    use HasFactory;

    protected $fillable = [
        'nouveau_dossier_id',
        'montant_recette',
        'cumule',
        'superficie_recette',
        'date_cession',
        'numero_quittance',
        'date_quittance',
        'observation_recette',
    ];
}
