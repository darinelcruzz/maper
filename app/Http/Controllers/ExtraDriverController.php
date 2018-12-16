<?php

namespace App\Http\Controllers;

use App\ExtraDriver;
use Illuminate\Http\Request;

class ExtraDriverController extends Controller
{

    function store(Request $request)
    {
        // dd($request->all());
        $validated = $this->validate($request, [
            'driver_id' => 'required',
            'type' => 'required',
            'extra' => 'required',
            'service_id' => 'sometimes|required',
            'insurer_service_id' => 'sometimes|required',
        ]);

        $extra = ExtraDriver::create($validated);

        return redirect(route('admin.cash'))->with('redirected', session('date'));
    }

    function show(ExtraDriver $extraDriver)
    {
        //
    }

    function edit(ExtraDriver $extraDriver)
    {
        //
    }

    function update(Request $request, ExtraDriver $extraDriver)
    {
        //
    }

    function destroy(ExtraDriver $extraDriver)
    {
        //
    }
}
