<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Unit;

class UnitController extends Controller
{
    public function create()
    {
        return view('units.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'number' => 'required|unique:units',
        ]);

        $unit = Unit::create($request->all());
        return redirect(route('unit.show'));
    }

    public function show()
    {
        $units = Unit::all();
        return view('units.show', compact('units'));
    }

    public function edit($id)
    {
        $unit = Unit::find($id);
        return view('units.edit', compact('unit'));
    }

    public function change(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        Unit::find($request->id)->update($request->all());

        return $this->show();
    }

    function details(Unit $unit)
    {
        return view('units.details', compact('unit'));
    }

    function deleteSnit($id)
    {
        Unit::destroy($id);

        return back();
    }
}
