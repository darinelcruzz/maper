<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Jenssegers\Date\Date;
use JavaScript;
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
        $clients = Client::pluck('name', 'id')->toArray();
        $ser = 'corp';
        return view('services.corporations.create', compact('units', 'drivers', 'clients', 'ser'));
    }

    public function store(Request $request)
    {
        $this->required($request);
        $service = Service::create($request->all());
        return redirect(route('service.show'));

    }

    public function edit($id)
    {
        $service = Service::find($id);
        $units = Unit::pluck('description', 'id')->toArray();
        $drivers = Driver::pluck('name', 'id')->toArray();
        $clients = Client::pluck('name', 'id')->toArray();
        $ser = 'corp';
        return view('services.corporations.edit', compact('service', 'units', 'drivers', 'clients', 'ser'));
    }

    public function change(Request $request)
    {
        $this->required($request);

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
        $ser = 'corp';

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

        if($service->category == 'Moto'){
            $cost = Price::find(1)->moto * $mul;
        }
        elseif ($service->category == 'Coche') {
            $cost = Price::find(1)->car * $mul;
        }
        else{
            $cost = Price::find(1)->ton3 * $mul;
        }

        return view('services.corporations.pay', compact('service', 'ser', 'cost'));
    }

    function deleteService($id)
    {
        Service::destroy($id);

        return back();
    }

    function required($request)
    {
        if($request->view == 'edit' || $request->view == 'create'){
            return $this->validate($request, [
                'description' => 'required',
                'amount' => 'required',
                'maneuver' => 'required',
                'service' => 'required',
                'brand' => 'required',
                'type' => 'required',
                'category' => 'required',
                'load' => 'required',
                'plate' => 'required',
                'color' => 'required',
                'inventory' => 'required',
                'key' => 'required',
                'model' => 'required',
                'origin' => 'required',
                'destination' => 'required',
                'driver' => 'required',
                'unit' => 'required',
                'date_return' => 'required',
                'lot' => 'required',
            ]);
        }
        elseif ($request->view == 'pay') {
            $this->validate($request, [
                'releaser' => 'required',
                'amount' => 'required',
                'discount' => 'required',
                'pay' => 'required',
            ]);
        }
        elseif($request->view == 'editPayed'){
            return $this->validate($request, [
                'description' => 'required',
                'amount' => 'required',
                'maneuver' => 'required',
                'brand' => 'required',
                'type' => 'required',
                'category' => 'required',
                'load' => 'required',
                'plate' => 'required',
                'color' => 'required',
                'key' => 'required',
                'model' => 'required',
                'origin' => 'required',
                'destination' => 'required',
                'driver' => 'required',
                'unit' => 'required',
                'date_return' => 'required',
                'lot' => 'required',
                'releaser' => 'required',
                'amount' => 'required',
                'discount' => 'required',
                'pay' => 'required',
            ]);
        }
    }
}
