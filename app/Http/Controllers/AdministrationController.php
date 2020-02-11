<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Jenssegers\Date\Date;
use App\{Service, InsurerService, Driver, Discount, Invoice, Payment, ExtraDriver};

class AdministrationController extends Controller
{

    function searchReleased()
    {
        return view('services.corporations.search');
    }

    function showReleased(Request $request)
    {
        $released = Service::fromDateToDate($request->start, $request->end, 'Liberado', 'status', 'date_out');

        return view('services.corporations.released', compact('released'));
    }

    function cash(Request $request)
    {
        if (session('redirected')) {
            $date = session('redirected');
        } else {
            $date = $request->date == 0 ? Date::now()->format('Y-m-d') : $request->date;
            $fdate= fdate($date, 'D, d/M/Y', 'Y-m-d');
            session()->put('date', $date);
        }

        $variables = $this->getMethods($date);

        return view('cash.balance', compact('date', 'fdate'))->with($variables);
    }

    function search()
    {
        //Pago de extras
        $services = Service::where('status', '!=', 'cancelado')->whereNull('cut_at')->where('extra_driver', '>', 0)->get();
        $insurerServices = InsurerService::where('status', '!=', 'cancelado')->whereNull('cut_at')->where('extra_driver', '>', 0)->get();
        $extras = ExtraDriver::where('extra', '>', 0)->whereNull('cut_at')->get();

        $dates = Service::where('cut_at', '!=', NULL)->orderBy('cut_at', 'desc')->get()->groupBy('cut_at')->take(5)->keys()->toArray();

        $drivers = Driver::pluck('name', 'id')->toArray();
        $discounts = Discount::whereNull('cut_at')->where('type', 0)->get();
        $bonuses = Discount::whereNull('cut_at')->where('type', 1)->get();

        return view('cash.reports.search', compact('date', 'services', 'extras', 'insurerServices', 'dates', 'drivers', 'discounts', 'bonuses'));
    }

    function cut()
    {
        $date = date('Y-m-d');
        Service::whereNull('cut_at')->update(['cut_at' => $date]);
        Service::whereNull('cut2_at')->where('date_out', '!=', null)->update(['cut2_at' => $date]);
        Service::where('status', 'cancelado')->update(['cut_at' => $date, 'cut2_at' => $date]);

        InsurerService::whereNull('cut_at')->update(['cut_at' => $date]);
        InsurerService::whereNull('cut2_at')->where('date_pay', '!=', null)->update(['cut2_at' => $date]);
        InsurerService::where('status', 'cancelado')->update(['cut_at' => $date, 'cut2_at' => $date]);

        ExtraDriver::whereNull('cut_at')->update(['cut_at' => $date]);

        Discount::whereNull('cut_at')->update(['cut_at' => $date]);

        Payment::whereNull('cut_at')->update(['cut_at' => $date]);

        Invoice::whereNull('cut_at')->where('date_pay', '!=', null)->update(['cut_at' => $date]);

        return redirect(route('admin.search'));
    }

    function reportBalance(Request $request)
    {
        $variables = $this->getMethodsToReport();

        $drivers = Driver::all();
        $discounts = Discount::whereNull('cut_at')->where('type', 0)->get();
        $bonuses = Discount::whereNull('cut_at')->where('type', 1)->get();
        $totalExtras = [];
        $paySalary = $request->salary;

        foreach ($drivers as $driver) {
            $extraHours = [];
            //general por operador
            $services = Service::where('status', '!=', 'cancelado')->whereNull('cut_at')->where('driver_id', $driver->id)->get();
            foreach ($services as $service) {
                array_push($extraHours, $service->extra_driver);
            }
            //general por apoyo
            $services = Service::where('status', '!=', 'cancelado')->whereNull('cut_at')->where('helper', $driver->id)->get();
            foreach ($services as $service) {
                array_push($extraHours, $service->extra_helper);
            }
            //abonos por operador
            $services = ExtraDriver::whereNull('cut_at')->where('type', 1)->where('driver_id', $driver->id)->get();
            foreach ($services as $service) {
                array_push($extraHours, $service->extra);
            }
            //abonos por apoyo
            $services = ExtraDriver::whereNull('cut_at')->where('type', 0)->where('driver_id', $driver->id)->get();
            foreach ($services as $service) {
                array_push($extraHours, $service->extra);
            }
            //aseguradoras por operador
            $services = InsurerService::where('status', '!=', 'cancelado')->whereNull('cut_at')->where('driver_id', $driver->id)->get();
            foreach ($services as $service) {
                array_push($extraHours, $service->extra_driver);
            }
            //aseguradoras por apoyo
            $services = InsurerService::where('status', '!=', 'cancelado')->whereNull('cut_at')->where('helper', $driver->id)->get();
            foreach ($services as $service) {
                array_push($extraHours, $service->extra_helper);
            }

            $totalExtras[$driver->id] = array_sum($extraHours);
        }

        return view('cash.reports.reportBalance', compact('totalExtras', 'drivers', 'discounts', 'bonuses', 'paySalary'))->with($variables);
    }

    function reportServices(Request $request)
    {
        $start = $request->start == 0 ? Date::now()->format('Y-m-d') : $request->start;
        $fdate= 'Corte al ' . fdate($start, 'D, d/M/Y', 'Y-m-d');

        $services = Service::where('status', '!=', 'cancelado')->whereNull('cut_at')->whereNull('date_out')->where('pay', '!=','abonos')->get();
        $services2 = Service::whereNull('cut2_at')->where('date_out', '!=', null)->where('pay', '!=', 'abonos')->get();
        $insurerServices = InsurerService::where('status', '!=', 'cancelado')->whereNull('cut_at')->whereNull('date_pay')->get();
        $insurerServices2 = InsurerService::whereNull('cut2_at')->where('date_pay', '!=', null)->get();
        $invoices = Invoice::whereNull('cut_at')->where('date_pay', '!=', null)->get();
        $payments = Payment::whereNull('cut_at')->get();

        return view('cash.reports.reportServices', compact('fdate', 'services', 'services2', 'insurerServices', 'insurerServices2', 'invoices', 'payments'));
    }

    function pastServices()
    {
        $cut_dates = Service::whereNotNull('cut_at')->orderBy('cut_at', 'desc')->pluck('id', 'cut_at')->take(10);

        return view('cash.reports.past', compact('cut_dates'));
    }

    function reportPastServices(Request $request)
    {
        $fdate= 'Corte del ' . fdate($request->start, 'D, d/M/Y', 'Y-m-d');
        $services = Service::where([
                ['cut2_at', '!=', $request->start],
                ['cut_at', '=', $request->start],
                ['status', '!=', 'cancelado'],
                ['pay', '!=','abonos']
            ])->orWhere([
                ['cut2_at', '=', null],
                ['cut_at', '=', $request->start],
                ['status', '!=', 'cancelado'],
                ['pay', '!=','abonos']
            ])->get();
        $services2 = Service::where('cut2_at', $request->start)->where('pay', '!=', 'abonos')->get();
        $insurerServices = InsurerService::where([
                ['cut2_at', '!=', $request->start],
                ['cut_at', '=', $request->start],
                ['status', '!=', 'cancelado']
            ])->orWhere([
                ['cut2_at', '=', null],
                ['cut_at', '=', $request->start],
                ['status', '!=', 'cancelado']
            ])->get();
        $insurerServices2 = InsurerService::where('cut2_at', $request->start)->get();
        $invoices = Invoice::where('cut_at', $request->start)->get();
        $payments = Payment::where('cut_at', $request->start)->get();

        return view('cash.reports.reportServices', compact('fdate', 'services', 'services2', 'insurerServices', 'insurerServices2', 'invoices', 'payments'));
    }

    function getMethods($start, $end = NULL)
    {
        $services = Service::where('status', '!=', 'cancelado')->untilDate($start, 'date_service', $end);
        $payed = Service::untilDate($start, 'date_out', $end)->where('pay', '!=', 'Abonos');
        $insurerServ = InsurerService::where('status', '!=', 'cancelado')->untilDate($start, 'date_assignment', $end);
        $invoicesPayed = Invoice::untilDate($start, 'date_pay', $end);
        $payments = Payment::untilDate($start, 'created_at', $end);
        $total = $payed->sum('total') + $invoicesPayed->sum('amount') + $payments->sum('amount');

        $methods = ['efectivo' => 'Efectivo', 'debito' => 'T. Debito', 'tcredito' => 'T. Credito', 'cheque' => 'Cheque', 'transferencia' => 'Transferencia', 'credito' => 'Credito'];

        foreach ($methods as $key => $value) {
            $$key = Service::payType($start, $value,'date_out', 'pay', $end)->sum('total')
            + Service::where('status', '!=', 'cancelado')->whereNull('date_out')->payType($start, $value, 'date_service', 'pay', $end)->sum('total')
            + InsurerService::where('status', '!=', 'cancelado')->payType($start, $value, 'date_assignment', 'pay', $end)->sum('total')
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
            $results[$key] = Service::where('status', '!=', 'cancelado')->whereNull('cut_at')->whereNull('date_out')->where('pay', $value)->get()->sum('total')
            + Service::whereNull('cut2_at')->where('date_out', '!=', null)->where('pay', $value)->get()->sum('total')
            + InsurerService::where('status', '!=', 'cancelado')->whereNull('cut_at')->whereNull('date_pay')->where('pay', $value)->get()->sum('total')
            + InsurerService::whereNull('cut2_at')->where('date_pay', '!=', null)->where('pay', $value)->get()->sum('total')
            + Invoice::whereNull('cut_at')->where('method', $value)->get()->sum('amount')
            + Payment::whereNull('cut_at')->where('method', $value)->get()->sum('amount');
        }

        return $results;
    }
}
