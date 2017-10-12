<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Unit;
use App\Driver;

class UnitController extends Controller
{
    public function create()
    {
        return view('resources.units.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'number' => 'required|unique:units',
        ]);

        $unit = Unit::create($request->all());
        return redirect(route('resources.show'));
    }

    public function show()
    {
        $drivers = Driver::all();
        $units = Unit::all();
        return view('resources.units.show', compact('units', 'drivers'));
    }

    public function edit($id)
    {
        $unit = Unit::find($id);
        return view('resources.units.edit', compact('unit'));
    }

    public function change(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        Unit::find($request->id)->update($request->all());

        return redirect(route('resources.show'));
    }

    function details(Unit $unit)
    {
        return view('resources.units.details', compact('unit'));
    }

    function deleteSnit($id)
    {
        Unit::destroy($id);

        return back();
    }
}
