<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SortiGeometre extends Model
{
    use HasFactory;

    protected $fillable =[
        'nouveau_dossier_id',
        'date_travaux',
        'liste_materiaux',
        'observation',
        'liste_geometre',
    ];
}
