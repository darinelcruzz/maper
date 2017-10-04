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
            'driver_hour' => 'required',
            'helper_hour' => 'required',
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
            'driver_hour' => 'required',
            'helper_hour' => 'required',
        ]);

        Driver::find($request->id)->update($request->all());

        return redirect(route('resources.show'));
    }

    function date()
    {
        $date = Date::now()->format('Y-m-d');
        return view('resources.drivers.date', compact('date'));
    }

    function format(Request $request)
    {
        $start = new Date(strtotime($request->start));
        $end = new Date(strtotime($request->end));

        $services = Service::fromDateToDate($start, $end, 1);
        $extraHours = [];
        foreach ($services as $service) {
            array_push($extraHours, $service->extraHours);
        }

        $range = $start->format('D, d/M/Y') . ' - ' . $end->format('D, d/M/Y');
        return view('resources.drivers.format', compact('extraHours', 'range'));
    }

    function destroy($id)
    {
        Driver::destroy($id);

        return back();
    }
}
