<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    protected $fillable = [
        'name', 'type', 'km', 'moto', 'car', 'ton3', 'ton5', 'ton10',
        'observation'
    ];
}
