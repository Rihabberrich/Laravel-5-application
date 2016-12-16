<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Serre extends Model
{
    protected $fillable = [
        'name', 'nbr', 'type', 'c', 'w', 'l', 'h', 'e', 'd', 'ctz', 'tc', 'zone_id','hvouv','stouv','srf','ssd','y','envirenement'
    ];
}
