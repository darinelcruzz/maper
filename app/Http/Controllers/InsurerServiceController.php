<?php

namespace App\Http\Controllers;

use App\InsurerService;
use App\Driver;
use App\Insurer;
use Illuminate\Http\Request;

class InsurerServiceController extends Controller
{
    function index()
    {
        $services = InsurerService::all();
        return view('services.insurers.index', compact('services'));
    }

    function create()
    {
        $drivers = Driver::pluck('name', 'id')->toArray();
        $insurers = Insurer::pluck('name', 'id')->toArray();
        return view('services.insurers.create', compact('drivers', 'insurers'));
    }

    function store(Request $request)
    {
        $this->validate($request, [
            'insurer_id' => 'required',
            'date' => 'required',
            'driver_id' => 'required',
            'vehicule' => 'required',
            'location' => 'required',
            'destiny' => 'required',
            'client' => 'required',
            'amount' => 'required',
            'contact' => 'required'
        ]);

        InsurerService::create($request->all());

        return redirect(route('service.insurer.index'));
    }

    function show(InsurerService $insurerService)
    {

    }

    function edit(InsurerService $insurerService)
    {

    }

    function update(Request $request, InsurerService $insurerService)
    {

    }

    function destroy(InsurerService $insurerService)
    {

    }
}
