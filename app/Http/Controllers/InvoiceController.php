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
        $services = Service::where('client_id', $client->id)->where('status', 'vencida')->orWhere('status', 'credito')->get();
        return view('invoices.make', compact('services', 'client'));
    }

    function pay(Invoice $invoice)
    {
        return view('invoices.pay', compact('invoice'));
    }

    function store(Request $request)
    {
        // puse la validación en otra función hasta abajo
        $this->validateRequest();

        // VICTOR!! este if es para evitar duplicados
        if (Invoice::where('folio', $request->folio)->first() == null) {
            
            $invoice = Invoice::create($request->except('services', 'type'));

            // si a un FIND le pasas un arreglo con ids -> devuelve esos ids de ese modelo
            foreach (InsurerService::find($request->services) as $service) {
                $service->update([
                    'bill' => $invoice->id,
                    'status' => 'facturado'
                ]);
            }
        }

        return redirect(route('insurer.details', $request->insurer_id));
    }

    // en vez de usar tanto if mejor dos funciones distintas para facturas aseguradoras y facturas cliente no?
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
        $services = InsurerService::where('bill', $invoice->id)->get();
        return view('invoices.details', compact('invoice', 'services'));
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

    function destroy(Invoice $invoice)
    {
        //
    }

    function validateRequest()
    {
        return request()->validate([
            'folio' => 'required',
            'retention' => 'required',
            'subtotal' => 'required',
            'iva' => 'required',
            'services' => 'required',
            'date' => 'required',
        ]);
    }
}
