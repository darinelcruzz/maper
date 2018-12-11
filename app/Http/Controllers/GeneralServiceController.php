<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\GeneralRequest;
use Jenssegers\Date\Date;
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

    function update(GeneralRequest $request, Service $service)
    {
        $service->update($request->all());
        return redirect(route('admin.cash'))->with('redirected', session('date'));
    }

    function pay(Service $service)
    {
        $cost = 0;

        if ($service->status != 'pagado') {
            $out = date('Y-m-d\TH:i');
        }else{
            $out = $service->date_out;
        }

        return view('services.generals.pay', compact('service','cost', 'out'));
    }

    function change(GeneralRequest $request, Service $service)
    {
        if ($request->payment > 0) {
            $service->update(['status' => 'abonos',
                                'pay' => 'Abonos']);
            Payment::create([
                'service_id' => $service->id,
                'amount' => $request->payment,
                'method' => $request->pay,
            ]);
        }
        else {
            $service->update($request->all());
            $service->update(['status' => 'pagado']);
        }

        return redirect(route('admin.cash'))->with('redirected', session('date'));
    }

    function details(Service $service)
    {
        return view('services.generals.details', compact('service'));
    }

    function dead(Service $service)
    {
        return view('services.generals.cancel', compact('service'));
    }

    function cancel(GeneralRequest $request, Service $service)
    {
        $service->update($request->all());

        return redirect(route('admin.cash'))->with('redirected', session('date'));
    }

    function destroy(Service $service)
    {
        $service->destroy();

        return back();
    }
}
