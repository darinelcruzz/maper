<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\GeneralRequest;
use Jenssegers\Date\Date;
use App\{Service, Price, Payment, ExtraDriver};

class GeneralServiceController extends Controller
{
    function create()
    {
        return view('services.generals.create');
    }

    function store(GeneralRequest $request)
    {
        $service = Service::create($request->except(['routes']));

        if (request()->has('pagado')) {

            return redirect(route('service.general.pay', $service));

        } elseif (request()->has('credito')) {

            $service->update([
                'status' => 'credito',
                'pay' => 'Credito',
            ]);

            return redirect(route('admin.cash'));
        }

    }

    function edit(Service $service)
    {
        return view('services.generals.edit', compact('service'));
    }

    function update(GeneralRequest $request, Service $service)
    {
        // dd($request->all());
        $service->update($request->except('routes'));
        return redirect(route('admin.cash'))->with('redirected', session('date'));
    }

    function pay(Service $service)
    {
        $cost = 0;

        $out = $service->status != 'pagado' ? date('Y-m-d\TH:i') : $service->date_out;

        return view('services.generals.pay', compact('service','cost', 'out'));
    }

    function change(GeneralRequest $request, Service $service)
    {
        // dd($request->all());
        if ($request->payment > 0) {

            $service->update(['status' => 'abonos', 'pay' => 'Abonos']);

            $service->payments()->create(['amount' => request('payment'), 'method' => request('pay')]);

        } else {

            $service->update($request->all() + ['status' => 'pagado']);

        }

        return redirect(route('admin.cash'))->with('redirected', session('date'));
    }

    function details(Service $service)
    {
        return view('services.generals.details', compact('service'));
    }

    function updateStatus(Service $service, $status)
    {
        $service->update([
            'status' => $status
        ]);

        return back();
    }

    function payments(Service $service)
    {
        return view('services.generals.payments', compact('service'));
    }

    function payment(GeneralRequest $request, Service $service)
    {
        $service->payments()->create(['amount' => request('payment'), 'method' => request('pay')]);

        if ($service->debt == 0) {
            $service->update(['status' => 'liquidado', 'date_out' => date('Y-m-d\TH:i')]);
        }

        return redirect(route('admin.cash'))->with('redirected', session('date'));
    }

    function editAmount(Service $service)
    {
        return view('services.generals.edit_amount', compact('service'));
    }

    function updateAmount(Request $request, Service $service)
    {
        $service->update($request->all());

        return redirect(route('admin.cash'))->with('redirected', session('date'));
    }

    function dead(Service $service)
    {
        return view('services.generals.cancel', compact('service'));
    }

    function cancel(GeneralRequest $request, Service $service)
    {
        $service->update($request->all());
        $extras = ExtraDriver::where('service_id', $service->id)->get();
        foreach ($extras as $extra) {
            $extra->update(['extra' => 0]);
        }

        return redirect(route('admin.cash'))->with('redirected', session('date'));
    }

    function destroy(Service $service)
    {
        $service->destroy();

        return back();
    }
}
