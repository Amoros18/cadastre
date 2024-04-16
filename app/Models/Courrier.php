<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courrier extends Model
{
    use HasFactory;

    protected $fillable=[
        'date_arrive',
        'date_correspondance',
        'numero_correspondance',
        'expediteur',
        'objet',
        'numero_reponse',
        'image',
    ];
}
