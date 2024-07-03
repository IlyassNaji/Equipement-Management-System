<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class equipement extends Model
{
    use HasFactory;
    protected $primaryKey ='id_equipement';
    protected $fillable = [
        'id_equipement',
        'nom',
        'description',
        'categorie',
        'état',
        'marque',
        'modele',
        'numero_serie',
        'date_achat',
        'description',
        'image',
        'num_bureau',
        'valable',
        'user_id',
    ];
   
}
