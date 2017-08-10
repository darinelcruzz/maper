<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Jenssegers\Date\Date;
use App\Service;
use App\Unit;
use App\Driver;
use App\Price;

class CorporationServiceController extends Controller
{
    public function create()
    {
        $units = Unit::pluck('description', 'id')->toArray();
        $drivers = Driver::pluck('name', 'id')->toArray();
        $prices = Price::pluck('name', 'id')->toArray();
        return view('services.corporations.create', compact('units', 'drivers', 'prices'));
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
        $entry2 = $entry->format('His');
        $today = Date::now();
        $today2 = $today->format('His');
        $interval = $entry->diff($today);
        $interval = $interval->format('%a');

        if($today2 < $entry2)
        {
            $mul= $interval + 2;
        }
        else {
            $mul = $interval + 1;
        }

        $cost = Price::find($service->category)->amount * $mul;


        return view('services.corporations.pay', compact('service', 'cost'));
    }

    function deleteService($id)
    {
        Service::destroy($id);

        return back();
    }
}
