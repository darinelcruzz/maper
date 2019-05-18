<?php

namespace App\Http\Controllers;

use App\Gas;
use Illuminate\Http\Request;

class GasController extends Controller
{

    function create()
    {
        $pendings = Gas::where('status', 'pendiente')->get();
        $payed = Gas::where('status', 'pagado')->get();

        return view('gases.create', compact('pendings', 'payed'));
    }

    function store(Request $request)
    {
        $request->validate([
            'date' => 'required',
            'ticket' => 'required',
            'product' => 'required',
            'total' => 'required',
        ]);

        Gas::create($request->all());
        return redirect(route('gas.create'));
    }

    function verify(Gas $gas)
    {
        Gas::find($gas->id)->update([
            'status' => 'pagado'
        ]);

        return redirect(route('gas.create'));
    }

    function report()
    {
        $pendings = Gas::where('status', 'pendiente')->get()->groupBy('type');

        return view('gases.report', compact('pendings'));
    }
}
