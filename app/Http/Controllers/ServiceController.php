<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Jenssegers\Date\Date;
use App\InsurerService;
use App\Service;
use App\Unit;
use App\Driver;
use App\ExtraDriver;

class ServiceController extends Controller
{

    function show()
    {
        $general = Service::where('service', 'General')
            ->whereNotIn('status', ['pagado', 'liquidado'])
            ->with('driver:id,name', 'client:id,name')
            ->get()
            ->groupBy('status');

        $paid = Service::where('service', 'General')
            ->whereIn('status', ['pagado', 'liquidado'])
            ->with('driver:id,name', 'client:id,name')
            ->latest()
            ->get()
            ->take(100);

        $corporations = Service::where('service', '!=', 'General')
            ->whereIn('status', ['corralon', 'liberado'])
            ->with('driver:id,name', 'helperr:id,name')
            ->get()
            ->groupBy('status');

        $insurer_services = InsurerService::where('status', '!=', 'Pagado')
            ->with('insurer:id,name', 'driver:id,name')
            ->get();

        return view('services.show', compact('corporations', 'general', 'paid', 'insurer_services'));
    }

    function editHour(Service $service)
    {
        $drivers = Driver::pluck('name', 'id')->toArray();
        $extras = ExtraDriver::where('service_id', $service->id)->get();

        return view('services.edit_hour', compact('service', 'drivers', 'extras'));
    }

    function updateHour(Request $request)
    {
        $service = Service::find($request->id);

        $service->update($request->all());

        return redirect(route('admin.cash'))->with('redirected', session('date'));
    }

}
