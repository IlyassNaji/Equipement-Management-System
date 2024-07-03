<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class besoin extends Model
{
    use HasFactory;
    protected $primaryKey ='id_besoin';
    protected $fillable = [
        'id_besoin',
        'type_besoin',
        'status',
        'date_besoin',
        'description',
        'user_id',
        'id_equipement'
    ];
}
