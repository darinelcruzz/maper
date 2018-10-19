<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Jenssegers\Date\Date;
use App\Client;
use App\Service;

class ClientController extends Controller
{
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

    function show()
    {
        $clients = Client::all();
        return view('clients.show', compact('clients'));
    }

    function edit($id)
    {
        $client = Client::find($id);
        return view('clients.edit', compact('client'));
    }

    function change(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'city' => 'required',
            'phone' => 'required',
            'days' => 'required',
        ]);

        Client::find($request->id)->update($request->all());

        return $this->show();
    }

    function details(Client $client)
    {
        $today = Date::now();
        $this->expire($client->days);
        return view('clients.details', compact('client', 'today'));
    }

    function expire($days)
    {
        $services = Service::where('status', 'credito')->get();
        foreach ($services as $service) {
            $today = Date::now();
            $interval = $service->getDays('date_out', $today);
            if ($interval > $days) {
                Service::find($service->id)->update(['status' => 'vencida']);
            }
        }
    }

    function destroy($id)
    {
        Client::destroy($id);

        return back();
    }
}
