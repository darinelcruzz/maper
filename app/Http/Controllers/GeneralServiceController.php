<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Jenssegers\Date\Date;
use App\Http\Requests\GeneralRequest;
use App\Http\Requests\ServiceRequest;
use App\Service;
use App\Price;

class GeneralServiceController extends Controller
{
    public function create()
    {
        $prices = Price::all();
        return view('services.generals.create', compact('prices'));
    }

    public function store(GeneralRequest $request)
    {
        $service = Service::create($request->except(['routes']));
        return redirect(route('service.show'));

    }

    public function edit(Service $service)
    {
        return view('services.generals.edit', compact('service'));
    }

    public function change(GeneralRequest $request)
    {
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
        return view('services.generals.pay', compact('service','cost'));
    }

    function cancel(Service $service)
    {
        return view('services.generals.cancel', compact('service'));
    }

    function destroy(Service $service)
    {
        $service->destroy();

        return back();
    }
}
