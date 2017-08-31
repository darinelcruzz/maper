<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Payment;

class PaymentController extends Controller
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
        $services = Service::servicesByClient($client->id);
        return view('clients.details', compact('client', 'services'));
    }

    function deleteClient($id)
    {
        Client::destroy($id);

        return back();
    }
}