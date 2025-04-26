<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Jenssegers\Date\Date;
use App\{Service, InsurerService, Driver, Discount, Invoice, Payment, ExtraDriver};

class ReportController extends Controller
{
    function pastServices()
    {
        $cut_dates = Service::whereNotNull('cut_at')->orderBy('cut_at', 'desc')->pluck('id', 'cut_at')->take(10);

        return view('cash.reports.past', compact('cut_dates'));
    }

    function reportPastServices(Request $request)
    {
        $fdate= 'Corte del ' . fdate($request->start, 'D, d/M/Y', 'Y-m-d');
        $services = Service::where([
                ['cut_at', '=', $request->start],
                ['cut2_at', '!=', $request->start],
                ['status', '!=', 'cancelado'],
            ])->orWhere([
                ['cut_at', '=', $request->start],
                ['cut2_at', '=', null],
                ['status', '!=', 'cancelado'],
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

    function reportPastBalance(Request $request)
    {
        $fdate= fdate($request->start, 'D, d \d\e F Y', 'Y-m-d');
        $variables = $this->getMethodsToReport($request->start);

        $drivers = Driver::where('status', 1)->get();
        $discounts = Discount::where('cut_at', $request->start)->where('type', 0)->get();
        $bonuses = Discount::where('cut_at', $request->start)->where('type', 1)->get();
        $totalExtras = [];
        $paySalary = 1;

        foreach ($drivers as $driver) {
            $extraHours = [];
            //general por operador
            $services = Service::where('status', '!=', 'cancelado')->where('cut_at', $request->start)->where('driver_id', $driver->id)->get();
            foreach ($services as $service) {
                array_push($extraHours, $service->extra_driver);
            }
            //general por apoyo
            $services = Service::where('status', '!=', 'cancelado')->where('cut_at', $request->start)->where('helper', $driver->id)->get();
            foreach ($services as $service) {
                array_push($extraHours, $service->extra_helper);
            }
            //abonos por operador
            $services = ExtraDriver::where('cut_at', $request->start)->where('type', 1)->where('driver_id', $driver->id)->get();
            foreach ($services as $service) {
                array_push($extraHours, $service->extra);
            }
            //abonos por apoyo
            $services = ExtraDriver::where('cut_at', $request->start)->where('type', 0)->where('driver_id', $driver->id)->get();
            foreach ($services as $service) {
                array_push($extraHours, $service->extra);
            }
            //aseguradoras por operador
            $services = InsurerService::where('status', '!=', 'cancelado')->where('cut_at', $request->start)->where('driver_id', $driver->id)->get();
            foreach ($services as $service) {
                array_push($extraHours, $service->extra_driver);
            }
            //aseguradoras por apoyo
            $services = InsurerService::where('status', '!=', 'cancelado')->where('cut_at', $request->start)->where('helper', $driver->id)->get();
            foreach ($services as $service) {
                array_push($extraHours, $service->extra_helper);
            }

            $totalExtras[$driver->id] = array_sum($extraHours);
        }

        return view('cash.reports.reportBalance', compact('fdate', 'totalExtras', 'drivers', 'discounts', 'bonuses', 'paySalary'))->with($variables);
    }

    function getMethodsToReport($date)
    {
        $methods = ['efectivo' => 'Efectivo', 'debito' => 'T. Debito', 'tcredito' => 'T. Credito', 'cheque' => 'Cheque', 'transferencia' => 'Transferencia', 'credito' => 'Credito'];
        $results = [];

        foreach ($methods as $key => $value) {

            $results[$key] = Service::where('status', '!=', 'cancelado')->where('cut2_at', $date)->where('pay', $value)->get()->sum('total')
            + InsurerService::where('status', '!=', 'cancelado')->where('cut2_at', $date)->where('pay', $value)->get()->sum('total')
            + Invoice::where('cut_at', $date)->where('method', $value)->get()->sum('amount')
            + Payment::where('cut_at', $date)->where('method', $value)->get()->sum('amount');

            if ($key == 'credito') {
                $results[$key] = Service::where([
                        ['cut_at', '=', $date],
                        ['cut2_at', '!=', $date],
                        ['status', '!=', 'cancelado']
                    ])->orWhere([
                        ['cut_at', '=', $date],
                        ['cut2_at', '=', null],
                        ['status', '!=', 'cancelado']
                    ])->get()->sum('total')
                + InsurerService::where([
                        ['cut2_at', '!=', $date],
                        ['cut_at', '=', $date],
                        ['status', '!=', 'cancelado']
                    ])->orWhere([
                        ['cut2_at', '=', null],
                        ['cut_at', '=', $date],
                        ['status', '!=', 'cancelado']
                    ])->get()->sum('total');
            }
        }
        // dd($results['credito']);
        return $results;
    }

}
