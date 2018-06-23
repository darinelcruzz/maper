<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = [
        'folio', 'insurer_id', 'client_id', 'retention', 'iva', 'amount',
        'date', 'date_pay', 'method', 'status'
    ];

    function insureServices()
    {
        return $this->hasMany(InsurerService::class, 'bill');
    }

    function insurer()
    {
        return $this->belongsTo(Insurer::class);
    }
}
