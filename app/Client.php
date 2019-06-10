<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Date\Date;

class Client extends Model
{
    protected $fillable = [
    	'name', 'rfc', 'address', 'cp', 'city', 'phone', 'email',
        'contact', 'cellphone', 'days', 'social'
    ];

    function getShortNameAttribute()
    {
        if (strlen($this->name) > 20) {
            return substr($this->name, 0, 20) . "...";
        }

        return $this->name;
    }

    function services()
    {
        return $this->hasMany(Service::class, 'client_id');
    }

    function invoices()
    {
        return $this->hasMany(Invoice::class);
    }

    function getPaidServicesAttribute()
    {
        return $this->services
            ->where('status', 'pagado')
            ->where('bill', null);
    }

    function getExpiredServicesAttribute()
    {
        return $this->services->where('status', 'vencida');
    }

    function getPendingServicesAttribute()
    {
        return $this->services->where('status', 'credito');
    }

    function getLimboServicesAttribute()
    {
        return $this->services->where('status', 'pendiente');
    }

    function getPaymentServicesAttribute()
    {
        return $this->services->where('status', 'abonos');
    }

    function getSoldoutServicesAttribute()
    {
        return $this->services->where('status', 'liquidado');
    }

    function getPendingAttribute()
    {
        return count($this->pending_services) + count($this->expired_services) + count($this->payment_services);
    }

    function getUnpaidInvoicesAttribute()
    {
        return $this->invoices->where('status', '!=', 'pagada');
    }

    function getPaidInvoicesAttribute()
    {
        return $this->invoices->where('status', 'pagada');
    }

    function serviceTotal($status, $formatted = false) {
        $sattribute = $status . "_services";
        $total = 0;

        foreach ($this->$sattribute as $service) {
            $total += $service->debt;
        }

        if ($formatted) {
            return '$ ' . number_format($total, 2, '.', ',');
        }

        return $total;
    }

}
