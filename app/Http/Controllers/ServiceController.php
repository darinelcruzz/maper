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
        $creditI = InsurerService::all();
        $cancel = Service::where('service', 'General')
                        ->where('status', 'cancelado')->get();

        return view('services.show', compact('general', 'corps', 'release', 'paid', 'credit', 'cancel', 'creditI'));
    }

    function changeExtras(Request $request)
    {
        Service::find($request->id)->update($request->all());

        return redirect(route('resources.driver.date'));
    }

}
