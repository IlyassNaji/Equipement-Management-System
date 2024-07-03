<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Staudenmeir\EloquentHasManyDeep\HasRelationships;

class maintenance extends Model
{
    use HasFactory;
    protected $primaryKey ='id_maintenance';
   
    protected $fillable = [
        'id_maintenance',
        'cout_maintenance',
        'date_maintenance',
        'type_maintenance',
        'description',
        'status',
        'id_equipement',
        'user_id'
    ];
}
