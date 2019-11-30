<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Jenssegers\Date\Date;
use App\Insurer;
use App\Invoice;

class InsurerController extends Controller
{
    function index()
    {
        $insurers = Insurer::all();
        return view('insurers.index', compact('insurers'));
    }

    function create()
    {
        return view('insurers.create');
    }

    function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'business_name' => 'required',
            'rfc' => 'required',
            'address' => 'required',
            'phone' => 'required'
        ]);

        Insurer::create($request->all());

        return redirect(route('insurer.index'));
    }

    function edit(Insurer $insurer)
    {
        return view('insurers.edit', compact('insurer'));
    }

    function update(Request $request, Insurer $insurer)
    {
        $this->validate($request, [
            'name' => 'required',
            'business_name' => 'required',
            'rfc' => 'required',
            'address' => 'required',
            'phone' => 'required'
        ]);

        $insurer->update($request->all());

        return redirect(route('insurer.index'));
    }

    function details(Insurer $insurer)
    {
        $pendings = Invoice::where('insurer_id', $insurer->id)
                            ->where('status', 'pendiente')->get();
        $paids = Invoice::where('insurer_id', $insurer->id)
                            ->where('status', 'pagada')->get();
        return view('insurers.details', compact('insurer', 'pendings', 'paids'));
    }

    function report(Insurer $insurer, $type, $status)
    {
        $today = Date::now();

        $types = ['servicios' => 'services', 'facturas' => 'invoices'];
        $kinds = ['credito' => 'credit', 'ingresados' => 'inserted', 'disputa' => 'disputed', 'aprobados' => 'approved', 'pagados' => 'paid', 'pagadas' => 'paid', 'pendientes' => 'pending'];

        $function = $kinds[$status] . "_" . $types[$type];

        return view('insurers.report', compact('insurer', 'today', 'function', 'type', 'status', 'kinds'));
    }
}
