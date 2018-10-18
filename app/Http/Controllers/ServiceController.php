<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Jenssegers\Date\Date;
use App\InsurerService;
use App\Service;
use App\Unit;
use App\Driver;

class ServiceController extends Controller
{

    function show()
    {
        $general = Service::where('status', 'pendiente')->get();
        $corps = Service::where('service', '!=', 'General')
                        ->where('status', 'corralon')->get();
        $release = Service::where('service', '!=', 'General')
                        ->where('status', 'liberado')->get();
        $paid = Service::where('service', 'General')
                        ->where('status', 'pagado')
                        ->orWhere('status', 'liquidado')->get();
        $credit = Service::where('service', 'General')
                        ->where('status', 'credito')
                        ->orWhere('status', 'vencida')->get();
        $creditI = InsurerService::where('status', '!=', 'Pagado')->get();
        $cancel = Service::where('service', 'General')
                        ->where('status', 'cancelado')->get();

        return view('services.show', compact('general', 'corps', 'release', 'paid', 'credit', 'cancel', 'creditI'));
    }

    function editHour(Service $service)
    {
        return view('services.edit_hour', compact('service'));
    }

    function updateHour(Request $request)
    {
        $service = Service::find($request->id);

        $service->update($request->all());

        return redirect(route('admin.cash'))->with('redirected', session('date'));
    }

}
