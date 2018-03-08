<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Jenssegers\Date\Date;
use App\Driver;
use App\Service;

class DriverController extends Controller
{
    function create()
    {
        return view('resources.drivers.create');
    }

    function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:drivers',
        ]);

        $driver = Driver::create($request->all());

        return redirect(route('resources.show'));
    }

    function edit(Driver $driver)
    {
        return view('resources.drivers.edit', compact('driver'));
    }

    function change(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        Driver::find($request->id)->update($request->all());

        return redirect(route('resources.show'));
    }

    function date()
    {
        $date = Date::now()->format('Y-m-d');

        $services = Service::payed();
        $outTime = [];

        foreach ($services as $service) {
            if (!$service->inSchedule) {
                array_push($outTime, $service);
            }
        }
        return view('resources.drivers.date', compact('date', 'outTime'));
    }

    function format(Request $request)
    {
        $start = new Date(strtotime($request->start));
        $end = new Date(strtotime($request->end));

        $drivers = Driver::all();
        $totalExtras = [];

        foreach ($drivers as $driver) {
            $servicesID = [];

            $services = Service::fromDateToDate($start, $end, $driver, 'driver_id');
            foreach ($services as $service) {
                if (!$service->inSchedule) {
                    array_push($servicesID, $service);
                }
            }
            $services = Service::fromDateToDate($start, $end, $driver, 'helper');
            foreach ($services as $service) {
                if (!$service->inSchedule) {
                    array_push($servicesID, $service);
                }
            }

            $totalExtras["$driver->name"] = $servicesID;
        }

        $range = $start->format('D, d/M/Y') . ' - ' . $end->format('D, d/M/Y');
        return view('resources.drivers.format', compact('totalExtras', 'range', 'services'));
    }

    function destroy($id)
    {
        Driver::destroy($id);

        return back();
    }
}
