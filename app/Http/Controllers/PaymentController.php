<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Payment;
use App\Service;

class PaymentController extends Controller
{
    public function create()
    {
        //$payments = Payment::find($id);

        return view('payments.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, []);
        $payment = Payment::create($request->all());
        return redirect(route('payments.show'));
    }

    public function show()
    {
        $payments = Payment::all();
        return view('payments.show', compact('payments'));
    }







    public function edit($id)
    {
        $client = Client::find($id);
        return view('clients.edit', compact('client'));
    }

    public function change(Request $request)
    {
        $this->validate($request, []);

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
