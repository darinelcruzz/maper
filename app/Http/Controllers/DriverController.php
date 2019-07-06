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

    function format()
    {
        $services = Service::whereNull('cut_at')->where('extra_driver', '>', 0)->get();
        $insurerServices = InsurerService::whereNull('cut_at')->where('extra_driver', '>', 0)->get();
        $extras = ExtraDriver::whereNull('cut_at')->get();

        return view('resources.drivers.extrasReport', compact('services', 'extras', 'insurerServices'));
    }

    function destroy($id)
    {
        Driver::destroy($id);

        return back();
    }
}
