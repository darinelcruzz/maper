<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Jenssegers\Date\Date;
use App\Client;
use App\Service;

class ClientController extends Controller
{
    function index()
    {
        $clients = Client::all();
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
        return redirect(route('client.show'));
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
    function report(Client $client, $status)
    {
        $today = Date::now();
        if ($status == 'pendientes') {
            $type = 'pending_services';
            $status = 'Pendientes';
        }elseif ($status == 'sinfac') {
            $type = 'pending_services';
            $tatus = 'Sin factura';
        }
        return view('clients.report', compact('client', 'today', 'type', 'status'));
    }

    function destroy(Client $client)
    {
        $client->delete();

        return back();
    }
}
