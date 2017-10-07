<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Jenssegers\Date\Date;
use App\Service;

class AdministrationController extends Controller
{
    public function cash(Request $request)
    {
        $date = $request->date == 0 ? Date::now()->format('Y-m-d') : $request->date;

        $all = Service::untilDate($date);
        $creditAll = Service::untilDate($date, 'date_credit');

        $methods = ['Efectivo', 'T. Debito', 'T. Credito', 'Cheque', 'Transferencia', 'Credito'];
        $methodsA = [];
        $methodsB = [];

        foreach ($methods as $method) {
            $methodsA[$method] = $this->getTotal(Service::payType($date, $method,'date_out', 'pay'));
            $methodsB[$method] = $this->getTotal(Service::payType($date, $method, 'date_credit', 'pay_credit'));
        }

        $total = $this->getTotal($all) + $this->getTotal($creditAll);

        return view('cash.balance', compact('date', 'all', 'creditAll', 'methodsA', 'methodsB', 'total'));
    }

    public function getTotal($services)
    {
        $total = 0;

        foreach ($services as $service) {
            $total += $service->total;
        }

        return $total;
    }
}
