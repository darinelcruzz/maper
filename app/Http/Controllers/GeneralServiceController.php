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
        if(isset($_POST['pagado']))
        {
            return redirect(route('service.general.pay', ['id' => $service->id]));
        }
        else if(isset($_POST['credito']))
        {
            Service::find($service->id)->update([
                'status' => 'credito'
            ]);
            return redirect(route('admin.cash'));
        }

    }

    public function edit(Service $service)
    {
        $prices = Price::all();
        return view('services.generals.edit', compact('service', 'prices'));
    }

    public function change(GeneralRequest $request)
    {
        Service::find($request->id)->update($request->all());
        Service::find($request->id)->update([
            'status' => $request->pay == 'Credito' ? 'credito' : $request->status
        ]);

        return redirect(route('admin.cash'));
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
