<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OuvertureDossier extends Model
{
    use HasFactory;

    protected $fillable =[
        'numero_ouverture',
        'nom_requerant',
        'telephone',
        'nature_dossier',
        'arrondissement',
        'quartier',
        'lieu_dit',
        'mappe',
        'blog',
        'lot',
        'numero_feuille',
        'zone',
    ];
}
