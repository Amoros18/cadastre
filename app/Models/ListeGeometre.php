<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListeGeometre extends Model
{
    use HasFactory;
    protected $fillable =[
        'nom',
        'statut',
    ];
}
