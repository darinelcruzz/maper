<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Jenssegers\Date\Date;
use App\Service;
use App\InsurerService;
use App\Driver;
use App\Discount;

class AdministrationController extends Controller
{
    function cash(Request $request)
    {
        $date = $request->date == 0 ? Date::now()->format('Y-m-d') : $request->date;
        $fdate= fdate($date, 'D, d/M/Y', 'Y-m-d');

        $services = Service::untilDate($date, 'date_service');
        $payed = Service::untilDate($date);
        $credit = Service::untilDate($date, 'date_credit');
        $insurerServ = InsurerService::untilDate($date, 'date_assignment');

        $methods = ['Efectivo', 'T. Debito', 'T. Credito', 'Cheque', 'Transferencia', 'Credito'];
        $methodsA = [];
        $methodsB = [];
        $methodsC = [];
        $methodsD = [];
        $methodsE = [];

        foreach ($methods as $method) {
            $methodsA[$method] = Service::payType($date, $method,'date_out', 'pay')->sum('total');
            $methodsB[$method] = Service::payType($date, $method, 'date_credit', 'pay_credit')->sum('total');
            $methodsC[$method] = Service::payType($date, $method, 'date_service', 'pay')->sum('total');
            $methodsD[$method] = InsurerService::payType($date, $method, 'date_assignment', 'pay')->sum('total');
            $methodsE[$method] = InsurerService::payType($date, $method, 'date_pay', 'pay')->sum('total');
        }

        $total = $payed->sum('total') + $credit->sum('total');

        return view('cash.balance', compact('date', 'fdate', 'payed', 'services', 'credit', 'insurerServ', 'methodsA', 'methodsB', 'methodsC', 'methodsD', 'total'));
    }

    function search()
    {
        $date = Date::now()->format('Y-m-d');
        return view('cash.reports.search', compact('date'));
    }

    function reportBalance(Request $request)
    {
        $start = $request->start == 0 ? Date::now()->format('Y-m-d') : $request->start;
        $end = $request->end == 0 ? Date::now()->format('Y-m-d') : $request->end;
        $fdate= fdate($start, 'D, d/M/Y', 'Y-m-d') . ' al ' . fdate($end, 'D, d/M/Y', 'Y-m-d');

        $services = Service::untilDate($start, 'date_service', $end);
        $payed = Service::untilDate($start, 'date_out', $end);
        $credit = Service::untilDate($start, 'date_credit', $end);
        $insurerServ = InsurerService::untilDate($start, 'date_assignment', $end);

        $methods = ['Efectivo', 'T. Debito', 'T. Credito', 'Cheque', 'Transferencia', 'Credito'];
        $methodsA = [];
        $methodsB = [];
        $methodsC = [];
        $methodsD = [];
        $methodsE = [];

        foreach ($methods as $method) {
            $methodsA[$method] = Service::payType($start, $method, 'date_out', 'pay', $end)->sum('total');
            $methodsB[$method] = Service::payType($start, $method, 'date_credit', 'pay_credit', $end)->sum('total');
            $methodsC[$method] = Service::payType($start, $method, 'date_service', 'pay', $end)->sum('total');
            $methodsD[$method] = InsurerService::payType($start, $method, 'date_assignment', 'pay', $end)->sum('total');
            $methodsE[$method] = InsurerService::payType($start, $method, 'date_pay', 'pay', $end)->sum('total');
        }

        $drivers = Driver::all();
        $discounts = Discount::whereBetween('discounted_at', [$start, $end])->get();
        $totalExtras = [];

        $pay_days = daycount('saturday', strtotime($start), strtotime($end), 0) - 1;
        foreach ($drivers as $driver) {
            $extraHours = [];

            $services = Service::fromDateToDate($start, $end, $driver, 'driver_id');

            foreach ($services as $service) {
                array_push($extraHours, $service->extra_driver);
            }

            $services = Service::fromDateToDate($start, $end, $driver, 'helper');
            foreach ($services as $service) {
                array_push($extraHours, $service->extra_helper);
            }

            $totalExtras[$driver->id] = array_sum($extraHours);
        }

        $total = $payed->sum('total') + $credit->sum('total');
        return view('cash.reports.reportBalance', compact('fdate', 'methodsA', 'methodsB', 'methodsC', 'methodsD', 'total', 'totalExtras', 'drivers', 'discounts', 'pay_days'));
    }

    function reportServices(Request $request)
    {
        $start = $request->start == 0 ? Date::now()->format('Y-m-d') : $request->start;
        $end = $request->end == 0 ? Date::now()->format('Y-m-d') : $request->end;
        $fdate= fdate($start, 'D, d/M/Y', 'Y-m-d') . ' al ' . fdate($end, 'D, d/M/Y', 'Y-m-d');

        $services = Service::untilDate($start, 'date_service', $end);
        $payed = Service::untilDate($start, 'date_out', $end);
        $credit = Service::untilDate($start, 'date_credit', $end);
        $insurerServ = InsurerService::untilDate($start, 'date_assignment', $end);

        $methods = ['Efectivo', 'T. Debito', 'T. Credito', 'Cheque', 'Transferencia', 'Credito'];
        $methodsA = [];
        $methodsB = [];
        $methodsC = [];
        $methodsD = [];
        $methodsE = [];

        foreach ($methods as $method) {
            $methodsA[$method] = Service::payType($start, $method,'date_out', 'pay', $end)->sum('total');
            $methodsB[$method] = Service::payType($start, $method, 'date_credit', 'pay_credit', $end)->sum('total');
            $methodsC[$method] = Service::payType($start, $method, 'date_service', 'pay', $end)->sum('total');
            $methodsD[$method] = InsurerService::payType($start, $method, 'date_assignment', 'pay', $end)->sum('total');
            $methodsE[$method] = InsurerService::payType($start, $method, 'date_pay', 'pay', $end)->sum('total');
        }

        $total = $payed->sum('total') + $credit->sum('total');
        return view('cash.reports.reportServices', compact('fdate', 'payed', 'services', 'credit', 'insurerServ', 'methodsA', 'methodsB', 'methodsC', 'methodsD', 'total'));
    }
}
