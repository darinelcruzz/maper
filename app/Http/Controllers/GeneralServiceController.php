<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Jenssegers\Date\Date;
use App\Http\Requests\{GeneralRequest, ServiceRequest};
use App\{Service, Price, Payment};

class GeneralServiceController extends Controller
{
    function create()
    {
        $prices = Price::all();
        return view('services.generals.create', compact('prices'));
    }

    function store(GeneralRequest $request)
    {
        $service = Service::create($request->except(['routes']));
        if(isset($_POST['pagado']))
        {
            return redirect(route('service.general.pay', ['id' => $service->id]));
        }
        else if(isset($_POST['credito']))
        {
            Service::find($service->id)->update([
                'status' => 'credito',
                'pay' => 'Credito',
            ]);
            return redirect(route('admin.cash'));
        }

    }

    function edit(Service $service)
    {
        $prices = Price::all();
        return view('services.generals.edit', compact('service', 'prices'));
    }

    function change(GeneralRequest $request, Service $service)
    {
        $service->update($request->all());
        
        if ($request->payment > 0) {
            Payment::create([
                'service_id' => $service->id,
                'amount' => $request->payment,
                'method' => $request->pay,
            ]);
        } else {
            $service->update(['status' => 'pagado']);
        }

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

    function update(Service $service)
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
