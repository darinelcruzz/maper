<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Jenssegers\Date\Date;
use App\{Service, InsurerService, Driver, Discount, Invoice};

class AdministrationController extends Controller
{
    function cash(Request $request)
    {
        if (session('redirected')) {
            $date = session('redirected');
        }else {
            $date = $request->date == 0 ? Date::now()->format('Y-m-d') : $request->date;
            $fdate= fdate($date, 'D, d/M/Y', 'Y-m-d');
            session()->put('date', $date);
        }
        $variables = $this->getMethods($date);

        return view('cash.balance', compact('date', 'fdate'))->with($variables);
    }

    function search()
    {
        $date = Date::now()->format('Y-m-d');
        return view('cash.reports.search', compact('date'));
    }

    function cut()
    {
        $services = Service::where('cut_at', NULL)->where('status', 'pagado')->orWhere('status', 'liberado')->get();
        $insurer_services = InsurerService::where('cut_at', NULL)->where('status', 'pagado')->get();

        foreach ($services as $service) {
            $service->update([
                'cut_at' => date('Y-m-d')
            ]);
        }

        foreach ($insurer_services as $service) {
            $service->update([
                'cut_at' => date('Y-m-d')
            ]);
        }

        return redirect(route('admin.search'));
    }

    function reportBalance(Request $request)
    {
        $end = date('Y-m-d');
        $start = date('Y-m-d', time() - 5 * 24 * 60 * 60);
        $fdate= fdate($start, 'D, d/M/Y', 'Y-m-d') . ' al ' . fdate($end, 'D, d/M/Y', 'Y-m-d');

        $variables = $this->getMethods($start, $end);

        $drivers = Driver::all();
        $discounts = Discount::whereBetween('discounted_at', [$start, $end])->get();
        $totalExtras = [];

        // $pay_days = daycount('saturday', strtotime($start), strtotime($end), 0) - 1;
        foreach ($drivers as $driver) {
            $extraHours = [];
            //general
            $services = Service::where('cut_at', null)->where('driver_id', $driver->id)->get();
            foreach ($services as $service) {
                array_push($extraHours, $service->extra_driver);
            }

            $services = Service::where('cut_at', null)->where('helper', $driver->id)->get();
            foreach ($services as $service) {
                array_push($extraHours, $service->extra_helper);
            }
            //aseguradoras
            $services = InsurerService::where('cut_at', null)->where('driver_id', $driver->id)->get();
            foreach ($services as $service) {
                array_push($extraHours, $service->extra_driver);
            }

            $services = InsurerService::where('cut_at', null)->where('helper', $driver->id)->get();
            foreach ($services as $service) {
                array_push($extraHours, $service->extra_helper);
            }

            $totalExtras[$driver->id] = array_sum($extraHours);
        }

        return view('cash.reports.reportBalance', compact('fdate', 'totalExtras', 'drivers', 'discounts'))->with($variables);
    }

    function reportServices(Request $request)
    {
        $start = $request->start == 0 ? Date::now()->format('Y-m-d') : $request->start;
        $end = $request->end == 0 ? Date::now()->format('Y-m-d') : $request->end;
        $fdate= fdate($start, 'D, d/M/Y', 'Y-m-d') . ' al ' . fdate($end, 'D, d/M/Y', 'Y-m-d');

        $variables = $this->getMethods($start, $end);

        return view('cash.reports.reportServices', compact('fdate'))->with($variables);
    }

    function getMethods($start, $end = NULL)
    {
        $services = Service::untilDate($start, 'date_service', $end);
        $payed = Service::untilDate($start, 'date_out', $end);
        $credit = Service::untilDate($start, 'date_credit', $end);
        $insurerServ = InsurerService::untilDate($start, 'date_assignment', $end);
        $invoicesPayed = Invoice::untilDate($start, 'date_pay', $end);
        $total = $payed->sum('total') + $credit->sum('total') + $invoicesPayed->sum('amount');

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
            $methodsE[$method] = Invoice::payType($start, $method, 'date_pay', 'method', $end)->sum('amount');
        }

        return [
            'methodsA' => $methodsA,
            'methodsB' => $methodsB,
            'methodsC' => $methodsC,
            'methodsD' => $methodsD,
            'methodsE' => $methodsE,
            'credit' => $credit,
            'payed' => $payed,
            'total' => $total,
            'services' => $services,
            'insurerServ' => $insurerServ,
            'invoicesPayed' => $invoicesPayed,
        ];
    }
}
