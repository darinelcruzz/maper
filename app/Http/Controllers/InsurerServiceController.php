<?php

namespace App\Http\Controllers;

use App\InsurerService;
use App\Driver;
use App\Unit;
use App\Insurer;
use App\ExtraDriver;
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
        $drivers = Driver::where('type', 'operador')->pluck('name', 'id')->toArray();
        $units = Unit::pluck('description', 'id')->toArray();
        $insurers = Insurer::pluck('name', 'id')->toArray();
        return view('services.insurers.create', compact('drivers', 'units', 'insurers'));
    }

    function store(Request $request)
    {
        $this->validate($request, [
            'insurer_id' => 'required',
            'date_assignment' => 'required',
            'driver_id' => 'required',
            'unit_id' => 'required',
            'brand' => 'required',
            'origin' => 'required',
            'destination' => 'required',
            'user' => 'required',
            'amount' => 'required',
            'folio' => 'required'
        ]);

        InsurerService::create($request->all());

        return redirect(route('admin.cash'));
    }

    function show(InsurerService $insurerService)
    {
        return view('services.insurers.show', compact('insurerService'));
    }

    function details(InsurerService $insurerService)
    {
        return view('services.insurers.details', compact('insurerService'));
    }

    function edit(InsurerService $insurerService)
    {
        $drivers = Driver::where('type', 'operador')->pluck('name', 'id')->toArray();
        $units = Unit::pluck('description', 'id')->toArray();
        $insurers = Insurer::pluck('name', 'id')->toArray();
        return view('services.insurers.edit', compact('drivers', 'units', 'insurers', 'insurerService'));
    }

    function update(Request $request)
    {
        $this->validate($request, [
            'insurer_id' => 'required',
            'date_assignment' => 'required',
            'driver_id' => 'required',
            'unit_id' => 'required',
            'brand' => 'required',
            'origin' => 'required',
            'destination' => 'required',
            'user' => 'required',
            'amount' => 'required',
            'folio' => 'required'
        ]);

        InsurerService::find($request->id)->update($request->all());

        return redirect(route('admin.cash'))->with('redirected', session('date'));
    }

    function updateStatus(InsurerService $insurerService, $status)
    {
        $insurerService->update([
            'status' => $status
        ]);

        return back();
    }

    function editHour(InsurerService $insurerService)
    {
        $drivers = Driver::pluck('name', 'id')->toArray();
        $extras = ExtraDriver::where('insurer_service_id', $insurerService->id)->get();

        return view('services.insurers.edit_hour', compact('insurerService', 'drivers', 'extras'));
    }

    function updateHour(Request $request)
    {
        // dd($request->all());
        $service = InsurerService::find($request->id);

        $service->update($request->except('extras'));

        if (request('extras')) {
            foreach ($request->extras as $extra) {
                $extra_driver = ExtraDriver::find($extra['id']);
                $extra_driver->update(['extra' => $extra['amount']]);
            }
        }

        return redirect(route('admin.cash'))->with('redirected', session('date'));
    }

    function editAmount(InsurerService $insurerService)
    {
        return view('services.insurers.edit_amount', compact('insurerService'));
    }

    function updateAmount(Request $request)
    {
        $service = InsurerService::find($request->id);

        $service->update($request->all());

        return redirect(route('admin.cash'))->with('redirected', session('date'));
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

    function dead(InsurerService $insurerService)
    {
        return view('services.insurers.cancel', compact('insurerService'));
    }

    function cancel(Request $request, InsurerService $insurerService)
    {
        $insurerService->update($request->all());
        $extras = ExtraDriver::where('insurer_service_id', $insurerService->id)->get();
        foreach ($extras as $extra) {
            $extra->update(['extra' => 0]);
        }

        return redirect(route('admin.cash'))->with('redirected', session('date'));
    }

    function destroy(InsurerService $insurerService)
    {

    }
}
