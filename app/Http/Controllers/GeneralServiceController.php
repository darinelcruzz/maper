<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Jenssegers\Date\Date;
use App\Http\Requests\ServiceRequest;
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
        $ser = 'gen';
        return view('services.generals.edit', compact('service', 'units', 'drivers', 'clients', 'ser'));
    }

    public function change(Request $request)
    {
        $this->required($request);

        Service::find($request->id)->update($request->all());
        Service::find($request->id)->update([
            'status' => $request->pay == 'Credito' ? 'credito' : $request->status
        ]);

        return redirect(route('service.show'));
    }

    function details(Service $service)
    {
        return view('services.generals.details', compact('service'));
    }

    function pay(Service $service)
    {
        $cost = 0;
        $ser = 'gen';
        return view('services.generals.pay', compact('service', 'ser', 'cost'));
    }

    function cancel(Service $service)
    {
        return view('services.generals.cancel', compact('service'));
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
                'brand' => 'required',
                'type' => 'required',
                'category' => 'required',
                'load' => 'required',
                'plate' => 'required',
                'color' => 'required',
                'client' => 'required',
                'origin' => 'required',
                'destination' => 'required',
                'driver' => 'required',
                'unit' => 'required',
                'date_return' => 'required',
            ]);
        }
        elseif ($request->view == 'pay') {
            $this->validate($request, [
                'amount' => 'required',
                'maneuver' => 'required',
                'others' => 'required',
                'pay' => 'required',
            ]);
        }
        elseif($request->view == 'editPayed'){
            return $this->validate($request, [
                'description' => 'required',
                'amount' => 'required',
                'brand' => 'required',
                'type' => 'required',
                'category' => 'required',
                'load' => 'required',
                'plate' => 'required',
                'color' => 'required',
                'client' => 'required',
                'origin' => 'required',
                'destination' => 'required',
                'driver' => 'required',
                'unit' => 'required',
                'date_return' => 'required',
                'amount' => 'required',
                'maneuver' => 'required',
                'others' => 'required',
                'pay' => 'required',
            ]);
        }
        elseif($request->view == 'cancel'){
            return $this->validate($request, [
                'reason' => 'required',

            ]);
        }
    }
}
