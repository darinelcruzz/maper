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
        $this->validate($request, [
            'folio' => 'required',
            'retention' => 'required',
            'amount' => 'required',
            'iva' => 'required',
            'services' => 'required',
            'date' => 'required',
        ]);

        $invoice = Invoice::create($request->except('services', 'type'));

        if ($request->type == 'insurer') {
            foreach ($request->services as $service_id) {
                $service = InsurerService::find($service_id);
                $service->update([
                    'bill' => $invoice->id,
                    'status' => 'facturado'
                ]);
            }
            return redirect(route('insurer.details', ['insurerService' => $request->insurer_id]));
        }else {
            foreach ($request->services as $service_id) {
                $service = Service::find($service_id);
                $service->update([
                    'bill' => $invoice->id,
                    'status' => 'facturado'
                ]);
            }
            return redirect(route('client.details', ['Service' => $request->client_id]));
        }
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

        return redirect(route('service.show'));
    }

    function destroy(Invoice $invoice)
    {
        //
    }
}
