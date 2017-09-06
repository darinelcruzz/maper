<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\Service;

class ClientController extends Controller
{
    public function create()
    {
        return view('clients.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:clients',
            'city' => 'required',
            'phone' => 'required',
        ]);

        $client = Client::create($request->all());
        return redirect(route('client.show'));
    }

    public function show()
    {
        $clients = Client::all();
        return view('clients.show', compact('clients'));
    }

    public function edit($id)
    {
        $client = Client::find($id);
        return view('clients.edit', compact('client'));
    }

    public function change(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'city' => 'required',
            'phone' => 'required',
        ]);

        Client::find($request->id)->update($request->all());

        return $this->show();
    }

    public function details(Client $client)
    {
        $payed = Service::servicesByClient($client->id, 'liquidado', 'pagado');
        $pending = Service::servicesByClient($client->id, 'credito');
        $expired = Service::servicesByClient($client->id, 'vencida');

        $totalPay = $this->getTotal($payed);
        $totalPen = $this->getTotal($pending);

        $pendings = count($pending) + count($expired);

        return view('clients.details', compact('client', 'payed', 'pending', 'expired', 'pendings','totalPay', 'totalPen'));
    }

    public function getTotal($services)
    {
        $total = 0;

        foreach ($services as $service) {
            $total += $service->total;
        }

        return $total;
    }

    function deleteClient($id)
    {
        Client::destroy($id);

        return back();
    }
}
