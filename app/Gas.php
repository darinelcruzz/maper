<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gas extends Model
{
    protected $fillable = [
        'ticket', 'product', 'total', 'invoice', 'status', 'observations', 'date'
    ];
}
