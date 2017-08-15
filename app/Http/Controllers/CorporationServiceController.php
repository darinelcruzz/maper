<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Jenssegers\Date\Date;
use App\Service;
use App\Unit;
use App\Driver;
use App\Price;
use App\Client;

class CorporationServiceController extends Controller
{
    public function create()
    {
        $units = Unit::pluck('description', 'id')->toArray();
        $drivers = Driver::pluck('name', 'id')->toArray();
        $prices = Price::pluck('name', 'id')->toArray();
        $clients = Client::pluck('name', 'id')->toArray();
        $ser = 'corp';
        return view('services.corporations.create', compact('units', 'drivers', 'prices', 'clients', 'ser'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'service' => 'required',
            'lot' => 'required',
            'key' => 'required',
        ]);

        $service = Service::create($request->all());
        return redirect(route('service.show'));

    }

    public function edit($id)
    {
        $service = Service::find($id);
        $units = Unit::pluck('description', 'id')->toArray();
        $drivers = Driver::pluck('name', 'id')->toArray();
        $prices = Price::pluck('name', 'id')->toArray();
        $clients = Client::pluck('name', 'id')->toArray();
        $ser = 'corp';
        return view('services.corporations.edit', compact('service', 'units', 'drivers', 'prices', 'clients', 'ser'));
    }

    public function change(Request $request)
    {
        $this->validate($request, []);

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
        $entryHour = $entry->format('His');
        $today = Date::now();
        $todayHour = $today->format('His');
        $interval = $entry->diff($today);
        $interval = $interval->format('%a');

        if($todayHour < $entryHour)
        {
            $mul= $interval + 2;
        }
        else {
            $mul = $interval + 1;
        }

        $cost = Price::find($service->category)->pension * $mul;


        return view('services.corporations.pay', compact('service', 'cost'));
    }

    function deleteService($id)
    {
        Service::destroy($id);

        return back();
    }
}
