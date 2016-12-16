<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chauffage extends Model
{
    protected  $fillable=[
        'valeur',
        'heure',
        'date',
        'serre_id'
    ];
}
