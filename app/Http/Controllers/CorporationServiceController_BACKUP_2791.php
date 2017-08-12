<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Jenssegers\Date\Date;
use App\Service;
use App\Unit;
use App\Driver;
use App\Price;
<<<<<<< HEAD
use App\Client;
=======
>>>>>>> 50452b4937255ec20cf644f324e3a82f016537ee

class CorporationServiceController extends Controller
{
    public function create()
    {
        $units = Unit::pluck('description', 'id')->toArray();
        $drivers = Driver::pluck('name', 'id')->toArray();
        $prices = Price::pluck('name', 'id')->toArray();
<<<<<<< HEAD
        $clients = Client::pluck('name', 'id')->toArray();
        $ser = 'corp';
        return view('services.corporations.create', compact('units', 'drivers', 'prices', 'clients', 'ser'));
=======
        return view('services.corporations.create', compact('units', 'drivers', 'prices'));
>>>>>>> 50452b4937255ec20cf644f324e3a82f016537ee
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
        return view('services.corporations.edit', compact('service', 'units', 'drivers', 'prices'));
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

    function pay(Service $service)
    {
        $entry = new Date(strtotime($service->date_service));
        $entryHour = $entry->format('His');
        //$entryDate = $entry->format('Ymd');
        $today = Date::now();
        $todayHour = $today->format('His');
        //$todayDate = $today->format('Ymd');
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
