<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Jenssegers\Date\Date;
use App\{Driver, Service, Discount, InsurerService, ExtraDriver};

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

    function extras()
    {
        $services = Service::whereNull('cut_at')->where('extra_driver', '>', 0)->get();
        $insurerServices = InsurerService::whereNull('cut_at')->where('extra_driver', '>', 0)->get();
        $extras = ExtraDriver::whereNull('cut_at')->get();

        return view('resources.drivers.extras', compact('services', 'extras', 'insurerServices'));
    }

    function format(Request $request)
    {
        $start = $request->start;
        $end = $request->end;

        $drivers = Driver::all();
        $discounts = Discount::whereBetween('discounted_at', [$start, $end])->get();
        $totalExtras = [];

        $pay_days = daycount('saturday', strtotime($start), strtotime($end), 0);

        foreach ($drivers as $driver) {
            $servicesID = [];

            $services = Service::fromDateToDate($start, $end, $driver, 'driver_id');
            foreach ($services as $service) {
                array_push($servicesID, $service);
            }
            $services = Service::fromDateToDate($start, $end, $driver, 'helper');
            foreach ($services as $service) {
                array_push($servicesID, $service);
            }

            $services = InsurerService::fromDateToDate($start, $end, $driver, 'driver_id');
            foreach ($services as $service) {
                array_push($servicesID, $service);
            }
            $services = InsurerService::fromDateToDate($start, $end, $driver, 'helper');
            foreach ($services as $service) {
                array_push($servicesID, $service);
            }

            $totalExtras[$driver->id] = $servicesID;
        }

        return view('resources.drivers.format', compact('totalExtras', 'drivers', 'start', 'end', 'discounts', 'pay_days'));
    }

    function destroy($id)
    {
        Driver::destroy($id);

        return back();
    }
}
