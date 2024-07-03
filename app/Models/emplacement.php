<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class emplacement extends Model
{
    use HasFactory;
    protected $primaryKey = 'num_bureau';
    protected $keyType = 'string';

    protected $fillable = [
        'num_bureau',
        'num_etage',
        'nom_batiment'  
    ];
   
}
