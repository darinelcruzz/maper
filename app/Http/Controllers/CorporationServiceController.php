<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CorporationsRequest;
use Jenssegers\Date\Date;
use App\{Service, Price, ExtraDriver, Client};

class CorporationServiceController extends Controller
{
    function create()
    {
        return view('services.corporations.create');
    }

    function store(CorporationsRequest $request)
    {
        $service = Service::create($request->except(['routes']));

        return redirect(route('admin.cash'));
    }

    function edit(Service $service)
    {
        return view('services.corporations.edit', compact('service'));
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
            $penalty = $service->getDays('date_service', $today);

            if($service->category == 'Moto'){
                $cost = Price::find(1)->moto * $penalty;
            } elseif ($service->category == 'Coche') {
                $cost = Price::find(1)->car * $penalty;
            } elseif($service->category == 'Camioneta'){
                $cost = Price::find(1)->ton3 * $penalty;
            } elseif($service->category == 'Tractor'){
                $cost = Price::find(1)->ton3 * $penalty;
            } elseif($service->category == 'Camion'){
                $cost = Price::find(1)->ton5 * $penalty;
            }else{
                $cost = Price::find(1)->ton10 * $penalty;
            }
            $out = date('Y-m-d\TH:i');
        } else {
            $cost = $service->pension;
            $end = new Date(strtotime($service->date_out));
            $penalty = $service->getDays('date_service', $end) + 1;
            $out = $service->date_out;
        }

        $clients = Client::where('status', 1)->pluck('name', 'id')->toArray();

        return view('services.corporations.pay', compact('service', 'cost', 'penalty', 'out', 'clients'));
    }

    function change(CorporationsRequest $request, Service $service)
    {
        // dd($request->all());
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

    function dead(Service $service)
    {
        return view('services.corporations.cancel', compact('service'));
    }

    function cancel(CorporationsRequest $request, Service $service)
    {
        $service->update($request->all());
        $extras = ExtraDriver::where('service_id', $service->id)->get();
        foreach ($extras as $extra) {
            $extra->update(['extra' => 0]);
        }

        return redirect(route('admin.cash'))->with('redirected', session('date'));
    }

    function destroy($id)
    {
        Service::destroy($id);

        return back();
    }
}
