<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Jenssegers\Date\Date;
use App\Service;
use App\InsurerService;

class AdministrationController extends Controller
{
    function cash(Request $request)
    {
        $date = $request->date == 0 ? Date::now()->format('Y-m-d') : $request->date;

        $services = Service::untilDate($date, 'date_service');
        $payed = Service::untilDate($date);
        $credit = Service::untilDate($date, 'date_credit');
        $insurerServ = InsurerService::untilDate($date, 'date_assignment');

        $methods = ['Efectivo', 'T. Debito', 'T. Credito', 'Cheque', 'Transferencia', 'Credito'];
        $methodsA = [];
        $methodsB = [];
        $methodsC = [];
        $methodsD = [];

        foreach ($methods as $method) {
            $methodsA[$method] = Service::payType($date, $method,'date_out', 'pay')->sum('total');
            $methodsB[$method] = Service::payType($date, $method, 'date_credit', 'pay_credit')->sum('total');
            $methodsC[$method] = Service::payType($date, $method, 'date_service', 'pay')->sum('total');
            $methodsD[$method] = InsurerService::payType($date, $method, 'date_assignment', 'pay')->sum('total');
        }

        $total = $payed->sum('total') + $credit->sum('total');

        return view('cash.balance', compact('date', 'payed', 'services', 'credit', 'insurerServ', 'methodsA', 'methodsB', 'methodsC', 'methodsD', 'total'));
    }
}
