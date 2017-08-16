<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Jenssegers\Date\Date;
use App\Service;
use App\Unit;
use App\Driver;
use App\Price;
use App\Client;

class GeneralServiceController extends Controller
{
    public function create()
    {
        $units = Unit::pluck('description', 'id')->toArray();
        $drivers = Driver::pluck('name', 'id')->toArray();
        $clients = Client::pluck('name', 'id')->toArray();
        $ser = 'gen';
        return view('services.generals.create', compact('units', 'drivers', 'clients', 'ser'));
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
        $clients = Client::pluck('name', 'id')->toArray();
        $ser = 'gen';
        return view('services.generals.edit', compact('service', 'units', 'drivers', 'clients', 'ser'));
    }

    public function change(Request $request)
    {
        $this->validate($request, []);

        Service::find($request->id)->update($request->all());

        return redirect(route('service.show'));
    }

    function details(Service $service)
    {
        return view('services.generals.details', compact('service'));
    }

    function pay(Service $service)
    {
        return view('services.generals.pay', compact('service'));
    }

    function deleteService($id)
    {
        Service::destroy($id);

        return back();
    }
}
