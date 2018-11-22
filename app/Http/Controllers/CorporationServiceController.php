<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CorporationsRequest;
use Jenssegers\Date\Date;
use App\{Service, Price};

class CorporationServiceController extends Controller
{
    function create()
    {
        $prices = Price::all();
        return view('services.corporations.create', compact('prices'));
    }

    function store(CorporationsRequest $request)
    {
        $service = Service::create($request->except(['routes']));

        return redirect(route('admin.cash'));
    }

    function edit(Service $service)
    {
        $prices = Price::all();
        return view('services.corporations.edit', compact('service', 'prices'));
    }

    function update(CorporationsRequest $request, Service $service)
    {
        $service->update($request->all());
        return redirect(route('admin.cash'))->with('redirected', session('date'));
    }

    function pay(Service $service)
    {
        if ($service->status != 'liberado') {
            $entry = new Date(strtotime($service->date_service));
            $today = Date::now();
            $interval = $service->getDays('date_service', $today);

            if(Date::now()->format('His') < $entry->format('His')) {
                $penalty = $interval + 2;
            } else {
                $penalty = $interval + 1;
            }

            if($service->category == 'Moto'){
                $cost = Price::find(1)->moto * $penalty;
            } elseif ($service->category == 'Coche') {
                $cost = Price::find(1)->car * $penalty;
            } elseif($service->category == 'Camion'){
                $cost = Price::find(1)->ton3 * $penalty;
            }else{
                $cost = Price::find(1)->ton10 * $penalty;
            }
            $out = date('Y-m-d\TH:i');
        }else{
            $cost = $service->pension;
            $end = new Date(strtotime($service->date_out));
            $penalty = $service->getDays('date_service', $end) + 1;
            $out = $service->date_out;
        }

        return view('services.corporations.pay', compact('service', 'cost', 'penalty', 'out'));
    }

    function change(CorporationsRequest $request, Service $service)
    {
        $service->update($request->all());

        if ($service->folio == NULL) {
            $lastFree = Service::orderByDesc('folio')->first();
            $service->update(['folio' => $lastFree->folio+1]);
        }

        return redirect(route('admin.cash'))->with('redirected', session('date'));

    }

    function details(Service $service)
    {
        return view('services.corporations.details', compact('service'));
    }

    function printLetter(Service $service)
    {
        return view('services.corporations.letter', compact('service'));
    }

    function printTicket(Service $service)
    {
        return view('services.corporations.ticket', compact('service'));
    }

    function destroy($id)
    {
        Service::destroy($id);

        return back();
    }
}
