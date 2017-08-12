<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Jenssegers\Date\Date;
use App\Service;
use App\Unit;
use App\Driver;
use App\Price;

class PublicServiceController extends Controller
{
    public function create()
    {
        $units = Unit::pluck('description', 'id')->toArray();
        $drivers = Driver::pluck('name', 'id')->toArray();
        $prices = Price::pluck('name', 'id')->toArray();
        return view('services.public.create', compact('units', 'drivers', 'prices'));
    }

    public function store(Request $request)
    {
        $this->validate($request, []);

        $service = Service::create($request->all());
        return redirect(route('service.show'));

    }

    public function edit($id)
    {
        $service = Service::find($id);
        $units = Unit::pluck('description', 'id')->toArray();
        $drivers = Driver::pluck('name', 'id')->toArray();
        $prices = Price::pluck('name', 'id')->toArray();
        return view('services.public.edit', compact('service', 'units', 'drivers', 'prices'));
    }

    public function change(Request $request)
    {
        $this->validate($request, []);

        Service::find($request->id)->update($request->all());

        return redirect(route('service.show'));
    }

    function details(Service $service)
    {
        return view('services.public.details', compact('service'));
    }

    function pay(Service $service)
    {
        return view('services.public.pay', compact('service'));
    }

    function deleteService($id)
    {
        Service::destroy($id);

        return back();
    }
}
