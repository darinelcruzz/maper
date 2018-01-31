<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Insurer extends Model
{
    protected $fillable = ['name', 'business_name', 'rfc', 'address', 'phone'];
}
