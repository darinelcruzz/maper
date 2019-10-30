<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Invoice;
use App\InsurerService;
use App\Insurer;
use App\Service;
use App\Client;

class InvoiceController extends Controller
{
    function index()
    {
        $invoices = Invoice::all();
        return view('invoices.index', compact('invoices'));
    }

    function create(Insurer $insurer)
    {
        $services = InsurerService::where('insurer_id', $insurer->id)->where('status', 'aprobado')->get();
        return view('invoices.create', compact('services', 'insurer'));
    }

    function make(Client $client)
    {
        $services = Service::where('client_id', $client->id)->Where('status', 'credito')->get();
        return view('invoices.make', compact('services', 'client'));
    }

    function store(Request $request)
    {
        $this->validateRequest();

        if (Invoice::where('folio', $request->folio)->first() == null) {

            $invoice = Invoice::create($request->except('services', 'type'));

            foreach (InsurerService::find($request->services) as $service) {
                $service->update([
                    'bill' => $invoice->id,
                    'status' => 'facturado'
                ]);
            }
        }

        return redirect(route('insurer.details', $request->insurer_id));
    }

    function persist(Request $request)
    {
        $this->validateRequest();

        if (Invoice::where('folio', $request->folio)->first() == null) {

            $invoice = Invoice::create($request->except('services', 'type'));

            foreach (Service::find($request->services) as $service) {
                $service->update([
                    'bill' => $invoice->id,
                    'status' => 'facturado'
                ]);
            }
        }

        return redirect(route('client.details', $request->client_id));
    }

    function show(Invoice $invoice)
    {
        if ($invoice->client) {
            $services = $invoice->services;
            $model = 'client';
        } else {
            $services = $invoice->insurerServices;
            $model = 'insurer';
        }

        return view('invoices.details', compact('invoice', 'services', 'model'));
    }

    function edit(Invoice $invoice)
    {
        //
    }

    function update(Request $request)
    {
        $invoice = Invoice::find($request->id);
        foreach ($invoice->insureServices as $service) {
            $service->update(['status' => 'pagado']);
        }
        $invoice->update($request->all());

        return redirect(route('insurer.details', $invoice->insurer_id));
    }

    function pay(Invoice $invoice)
    {
        return view('invoices.pay', compact('invoice'));
    }

    function confirm(Request $request, Invoice $invoice)
    {
        $relationship = $invoice->client ? 'services': 'insurerServices';

        foreach ($invoice->{$relationship} as $service) {
            $service->update(['status' => 'pagado']);
        }

        $invoice->update($request->all());

        if ($invoice->insurer) {
            return redirect(route('insurer.details', $invoice->insurer_id));
        }

        return redirect(route('client.details', $invoice->client_id));
    }

    function validateRequest()
    {
        return request()->validate([
            'folio' => 'required|unique:invoices',
            'retention' => 'required',
            'subtotal' => 'required',
            'iva' => 'required',
            'services' => 'required',
            'date' => 'required',
        ]);
    }
}
