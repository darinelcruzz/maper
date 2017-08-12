<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Driver;

class DriverController extends Controller
{
    public function create()
    {
        return view('drivers.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:drivers',
        ]);

        $driver = Driver::create($request->all());
        return redirect(route('driver.show'));
    }

    public function show()
    {
        $drivers = Driver::all();
        return view('drivers.show', compact('drivers'));
    }

    public function edit($id)
    {
        $driver = Driver::find($id);
        return view('drivers.edit', compact('driver'));
    }

    public function change(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        Driver::find($request->id)->update($request->all());

        return $this->show();
    }

    function deleteSnit($id)
    {
        Driver::destroy($id);

        return back();
    }
}
