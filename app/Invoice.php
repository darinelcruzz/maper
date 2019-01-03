<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = [
        'folio', 'insurer_id', 'client_id', 'retention', 'iva', 'amount',
        'date', 'date_pay', 'method', 'status', 'cut_at'
    ];

    function insureServices()
    {
        return $this->hasMany(InsurerService::class, 'bill');
    }

    function insurer()
    {
        return $this->belongsTo(Insurer::class);
    }

    function client()
    {
        return $this->belongsTo(Client::class);
    }

    function scopeUntilDate($query, $start, $column = 'date_out', $end = NULL)
    {
        if ($end == NULL) {
            return $query->whereBetween($column, [$start . ' 00:00:00', $start . ' 23:59:59'])->get();
        }
        return $query->whereBetween($column, [$start . ' 00:00:00', $end . ' 23:59:59'])->get();

    }

    function scopePayType($query, $start, $type, $dateCol, $payCol, $end=NULL)
    {
        if ($end == NULL) {
            return $query->whereBetween($dateCol, [$start . ' 00:00:00', $start . ' 23:59:59'])
                            ->where($payCol, $type)->get();
        }
        return $query->whereBetween($dateCol, [$start . ' 00:00:00', $end . ' 23:59:59'])
                            ->where($payCol, $type)->get();
    }

    function getStatusLabelAttribute()
    {
        $colors = ['pagada' => 'success', 'credito' => 'primary', 'pendiente' => 'warning', 'vencida' => 'danger'];
        $color = array_key_exists($this->status, $colors) ? $colors[$this->status] : 'default';
        return "<label class='label label-$color'>" . strtoupper($this->status) . "</label>";
    }
}
