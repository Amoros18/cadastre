<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransmissionConservatoire extends Model
{
    use HasFactory;

    protected $fillable =[
        'nouveau_dossier_id',
        'date_transmission',
        'motif',
        'statut',
        'date_reception',
    ];
}
