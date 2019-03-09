<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Jenssegers\Date\Date;
use App\{Service, InsurerService, Driver, Discount, Invoice, Payment, ExtraDriver};

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
        $services = Service::whereNull('cut_at')->where('extra_driver', '>', 0)->get();
        $insurerServices = InsurerService::whereNull('cut_at')->where('extra_driver', '>', 0)->get();
        $extras = ExtraDriver::whereNull('cut_at')->get();
        $dates = Service::where('cut_at', '!=', NULL)->orderBy('cut_at', 'desc')->get()->groupBy('cut_at')->take(5)->keys()->toArray();
        $date = Date::now()->format('Y-m-d');
        $drivers = Driver::pluck('name', 'id')->toArray();
        $discounts = Discount::whereNull('cut_at')->get();
        return view('cash.reports.search', compact('date', 'services', 'extras', 'insurerServices', 'dates', 'drivers', 'discounts'));
    }

    function cut()
    {
        $services = Service::all();
        $insurer_services = InsurerService::all();
        $extras = ExtraDriver::whereNull('cut_at')->get();
        $discounts = Discount::whereNull('cut_at')->get();
        $payments = Payment::whereNull('cut_at')->get();
        $invoices = Invoice::whereNull('cut_at')->where('date_pay', '!=', null)->get();
        $date = fdate(date('Y-m-d'), 'd-M-y', 'Y-m-d');

        foreach ($services as $service) {
            if ($service->cut_at == NULL) {
                $service->update(['cut_at' => date('Y-m-d\TH:i')]);
            }if ($service->cut2_at == NULL && !empty($service->date_out)) {
                $service->update(['cut2_at' => date('Y-m-d\TH:i')]);
            }
        }

        foreach ($insurer_services as $service) {
            if ($service->cut_at == NULL) {
                $service->update(['cut_at' => date('Y-m-d\TH:i')]);
            }if ($service->cut2_at == NULL && !empty($service->date_pay)) {
                $service->update(['cut2_at' => date('Y-m-d\TH:i')]);
            }
        }

        foreach ($extras as $extra) {
            $extra->update(['cut_at' => date('Y-m-d\TH:i')]);
        }

        foreach ($discounts as $discount) {
            $discount->update(['cut_at' => date('Y-m-d\TH:i')]);
        }

        foreach ($payments as $payment) {
            $payment->update(['cut_at' => date('Y-m-d\TH:i')]);
        }

        foreach ($invoices as $invoice) {
            $invoice->update(['cut_at' => date('Y-m-d\TH:i')]);
        }

        return redirect(route('admin.search'));
    }

    function reportBalance(Request $request)
    {
        $variables = $this->getMethodsToReport();

        $drivers = Driver::all();
        $discounts = Discount::where('cut_at', null)->get();
        $totalExtras = [];
        $paySalary = $request->salary;

        foreach ($drivers as $driver) {
            $extraHours = [];
            //general
            $services = Service::whereNull('cut_at')->where('driver_id', $driver->id)->get();
            foreach ($services as $service) {
                array_push($extraHours, $service->extra_driver);
            }

            $services = Service::whereNull('cut_at')->where('helper', $driver->id)->get();
            foreach ($services as $service) {
                array_push($extraHours, $service->extra_helper);
            }
            //abonos
            $services = ExtraDriver::whereNull('cut_at')->where('type', 1)->where('driver_id', $driver->id)->get();
            foreach ($services as $service) {
                array_push($extraHours, $service->extra);
            }

            $services = ExtraDriver::whereNull('cut_at')->where('type', 0)->where('driver_id', $driver->id)->get();
            foreach ($services as $service) {
                array_push($extraHours, $service->extra);
            }
            //aseguradoras
            $services = InsurerService::whereNull('cut_at')->where('driver_id', $driver->id)->get();
            foreach ($services as $service) {
                array_push($extraHours, $service->extra_driver);
            }

            $services = InsurerService::whereNull('cut_at')->where('helper', $driver->id)->get();
            foreach ($services as $service) {
                array_push($extraHours, $service->extra_helper);
            }

            $totalExtras[$driver->id] = array_sum($extraHours);
        }

        return view('cash.reports.reportBalance', compact('totalExtras', 'drivers', 'discounts', 'paySalary'))->with($variables);
    }

    function reportServices(Request $request)
    {
        $start = $request->start == 0 ? Date::now()->format('Y-m-d') : $request->start;
        $fdate= 'Corte al ' . fdate($start, 'D, d/M/Y', 'Y-m-d');

        $services = Service::whereNull('cut_at')->whereNull('date_out')->get();
        $services2 = Service::whereNull('cut2_at')->where('date_out', '!=', null)->get();
        $insurerServices = InsurerService::whereNull('cut_at')->whereNull('date_pay')->get();
        $insurerServices2 = InsurerService::whereNull('cut2_at')->where('date_pay', '!=', null)->get();
        $invoices = Invoice::whereNull('cut_at')->where('date_pay', '!=', null)->get();
        $payments = Payment::whereNull('cut_at')->get();

        return view('cash.reports.reportServices', compact('fdate', 'services', 'services2', 'insurerServices', 'insurerServices2', 'invoices', 'payments'));
    }

    function getMethods($start, $end = NULL)
    {
        $services = Service::untilDate($start, 'date_service', $end);
        $payed = Service::untilDate($start, 'date_out', $end);
        $insurerServ = InsurerService::untilDate($start, 'date_assignment', $end);
        $invoicesPayed = Invoice::untilDate($start, 'date_pay', $end);
        $payments = Payment::untilDate($start, 'created_at', $end);
        $total = $payed->sum('total') + $invoicesPayed->sum('amount') + $payments->sum('amount');

        $methods = ['efectivo' => 'Efectivo', 'debito' => 'T. Debito', 'tcredito' => 'T. Credito', 'cheque' => 'Cheque', 'transferencia' => 'Transferencia', 'credito' => 'Credito'];

        foreach ($methods as $key => $value) {
            $$key = Service::payType($start, $value,'date_out', 'pay', $end)->sum('total')
            + Service::whereNull('date_out')->payType($start, $value, 'date_service', 'pay', $end)->sum('total')
            + InsurerService::payType($start, $value, 'date_assignment', 'pay', $end)->sum('total')
            + Invoice::payType($start, $value, 'date_pay', 'method', $end)->sum('amount')
            + Payment::payType($start, $value, 'created_at', 'method', $end)->sum('amount');
        }

        return [
            'efectivo' => $efectivo,
            'debito' => $debito,
            'tcredito' => $tcredito,
            'cheque' => $cheque,
            'transferencia' => $transferencia,
            'credito' => $credito,
            'payed' => $payed,
            'total' => $total,
            'services' => $services,
            'insurerServ' => $insurerServ,
            'invoicesPayed' => $invoicesPayed,
            'payments' => $payments,
        ];
    }

    function getMethodsToReport()
    {
        $methods = ['efectivo' => 'Efectivo', 'debito' => 'T. Debito', 'tcredito' => 'T. Credito', 'cheque' => 'Cheque', 'transferencia' => 'Transferencia', 'credito' => 'Credito'];
        $results = [];

        foreach ($methods as $key => $value) {
            $results[$key] = Service::whereNull('cut_at')->whereNull('date_out')->where('pay', $value)->get()->sum('total')
            + Service::whereNull('cut2_at')->where('date_out', '!=', null)->where('pay', $value)->get()->sum('total')
            + InsurerService::whereNull('cut_at')->whereNull('date_pay')->where('pay', $value)->get()->sum('total')
            + InsurerService::whereNull('cut2_at')->where('date_pay', '!=', null)->where('pay', $value)->get()->sum('total')
            + Invoice::whereNull('cut_at')->where('method', $value)->get()->sum('amount')
            + Payment::whereNull('cut_at')->where('method', $value)->get()->sum('amount');
        }

        return $results;
    }
}
