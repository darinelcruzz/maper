<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Date\Date;

class Insurer extends Model
{
    protected $fillable = ['name', 'business_name', 'rfc', 'address', 'phone', 'observations', 'reception'];

    function services()
    {
        return $this->hasMany(InsurerService::class, 'insurer_id');
    }

    function getCreditServicesAttribute()
    {
        return $this->services->where('status', 'credito');
    }

    function getInsertedServicesAttribute()
    {
        return $this->services->where('status', 'ingresado');
    }

    function getDisputedServicesAttribute()
    {
        return $this->services->where('status', 'disputa');
    }

    function getApprovedServicesAttribute()
    {
        return $this->services->where('status', 'aprobado');
    }

    function getInvoicedServicesAttribute()
    {
        return $this->services->where('status', 'facturado');
    }

    function getPaidServicesAttribute()
    {
        return $this->services->where('status', 'pagado');
    }

    function getPendingAttribute()
    {
        return count($this->credit_services) + count($this->inserted_services) + count($this->disputed_services) + count($this->approved_services) + count($this->invoiced_services);
    }

    function serviceTotal($status, $formatted = false) {
        $sattribute = $status . "_services";
        $total = 0;

        foreach ($this->$sattribute as $service) {
            $total += $service->total;
        }

        if ($formatted) {
            return '$ ' . number_format($total, 2, '.', ',');
        }

        return $total;
    }

    function getTotalSumAttribute()
    {
        return $this->serviceTotal('credit') + $this->serviceTotal('inserted') + $this->serviceTotal('disputed') + $this->serviceTotal('approved') + $this->serviceTotal('invoiced');
    }

    function serviceNumber($status) {
        $sattribute = $status . "_services";
        $total = 0;
        foreach ($this->$sattribute as $service) {
            $total++;
        }
        return $total;
    }
}
