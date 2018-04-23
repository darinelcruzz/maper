<?php

namespace App\Http\Controllers;

use App\InsurerService;
use App\Driver;
use App\Unit;
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
        $units = Unit::pluck('name', 'id')->toArray();
        $insurers = Insurer::pluck('name', 'id')->toArray();
        return view('services.insurers.create', compact('drivers', 'units', 'insurers'));
    }

    function store(Request $request)
    {
        $this->validate($request, [
            'insurer_id' => 'required',
            'date_service' => 'required',
            'driver_id' => 'required',
            'unit_id' => 'required',
            'brand' => 'required',
            'origin' => 'required',
            'destination' => 'required',
            'client' => 'required',
            'amount' => 'required',
            'folio' => 'required'
        ]);

        InsurerService::create($request->all());

        return redirect(route('service.show'));
    }

    function show(InsurerService $insurerService)
    {
        return view('services.insurers.show', compact('insurerService'));
    }

    function edit(InsurerService $insurerService)
    {
        $drivers = Driver::pluck('name', 'id')->toArray();
        $insurers = Insurer::pluck('name', 'id')->toArray();

        return view('services.insurers.edit', compact('drivers', 'insurers', 'insurerService'));
    }

    function update(Request $request)
    {
        InsurerService::find($request->id)->update($request->all());

        return back();
    }

    function updateStatus(InsurerService $insurerService, $status)
    {
        $insurerService->update([
            'status' => $status
        ]);

        return back();
    }

    function pay(Request $request)
    {
        $service = InsurerService::find($request->id);
        $service->update([
            'method' => $request->method,
            'payment_date' => date('Y-m-d'),
            'status' => 'pagado'
        ]);

        return back();
    }

    function bill(Request $request)
    {
        $service = InsurerService::find($request->id);
        $service->update([
            'bill' => $request->bill
        ]);

        return back();
    }

    function destroy(InsurerService $insurerService)
    {

    }
}
