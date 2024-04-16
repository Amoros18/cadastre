<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RejetControlle extends Model
{
    use HasFactory;

    protected $fillable =[
        'numero_dossier',
        'motif',
        'date_rejet',
        'etat',
    ];

}
