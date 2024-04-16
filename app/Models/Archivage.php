<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Archivage extends Model
{
    use HasFactory;

    protected $fillable =[
        'numero_dossier',
        'date_reception',
        'observation',
        'numero_tirroir',
    ];
}
