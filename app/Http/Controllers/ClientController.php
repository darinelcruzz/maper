<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Jenssegers\Date\Date;
use App\{Client, Service, Invoice, Payment};

class ClientController extends Controller
{
    function index()
    {
        $clients = Client::query()
            ->where('status', 1)
            ->with('invoices', 'services', 'services.payments')
            ->get();

        // dd($clients);

        return view('clients.index', compact('clients'));
    }

    function create()
    {
        return view('clients.create');
    }

    function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:clients',
            'city' => 'sometimes|required',
            'phone' => 'required',
            'days' => 'sometimes|required',
        ]);

        $client = Client::create($request->all());

        if ($request->city == NULL) {
            return back();
        }
        return redirect(route('client.index'));
    }

    function edit(Client $client)
    {
        return view('clients.edit', compact('client'));
    }

    function update(Request $request, Client $client)
    {
        $this->validate($request, [
            'name' => 'required',
            'city' => 'required',
            'phone' => 'required',
            'days' => 'required',
        ]);

        $client->update($request->all());

        return redirect(route('client.index'));
    }

    function details(Client $client)
    {
        $today = Date::now();
        return view('clients.details', compact('client', 'today'));
    }

    function report(Client $client, $type, $status)
    {
        $today = Date::now();

        $types = ['servicios' => 'services', 'facturas' => 'invoices'];
        $kinds = ['pagados' => 'paid', 'pagadas' => 'paid', 'pendientes' => 'pending'];

        $function = $kinds[$status] . "_" . $types[$type];

        return view('clients.report', compact('client', 'today', 'function', 'type', 'status'));
    }

    function destroy(Client $client)
    {
        $client->update(['status' => 0]);
        return back();
    }
}
