<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CorporationsRequest;
use Jenssegers\Date\Date;
use App\Service;
use App\Price;

class CorporationServiceController extends Controller
{
    public function create()
    {
        $prices = Price::all();
        return view('services.corporations.create', compact('prices'));
    }

    public function store(CorporationsRequest $request)
    {
        $service = Service::create($request->except(['routes']));

        return redirect(route('service.show'));
    }

    public function edit(Service $service)
    {
        $prices = Price::all();
        return view('services.corporations.edit', compact('service', 'prices'));
    }

    public function update(CorporationsRequest $request)
    {
        Service::find($request->id)->update($request->all());

        return redirect(route('service.show'));
    }

    function details(Service $service)
    {
        return view('services.corporations.details', compact('service'));
    }

    function printLetter(Service $service)
    {
        $today = Date::now();
        $date = $today->format('d \d\e F \d\e\l Y');
        return view('services.corporations.letter', compact('service', 'date'));
    }

    function pay(Service $service)
    {
        $entry = new Date(strtotime($service->date_service));

        $interval = $service->getDays('date_service');

        if(Date::now()->format('His') < $entry->format('His')) {
            $penalty = $interval + 2;
        } else {
            $penalty = $interval + 1;
        }

        if($service->category == 'Moto'){
            $cost = Price::find(1)->moto * $penalty;
        } elseif ($service->category == 'Coche') {
            $cost = Price::find(1)->car * $penalty;
        } else{
            $cost = Price::find(1)->ton3 * $penalty;
        }

        return view('services.corporations.pay', compact('service', 'cost'));
    }

    function destroy($id)
    {
        Service::destroy($id);

        return back();
    }
}
