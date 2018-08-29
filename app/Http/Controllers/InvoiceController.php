<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Invoice;
use App\InsurerService;
use App\Insurer;

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

    function pay(Invoice $invoice)
    {
        return view('invoices.pay', compact('invoice'));
    }

    function store(Request $request)
    {
        $this->validate($request, [
            'folio' => 'required',
            'retention' => 'required',
            // 'iva' => 'required',
            'amount' => 'required',
            'services' => 'required',
            'date' => 'required',
        ]);

        $invoice = Invoice::create($request->except('services'));

        foreach ($request->services as $service_id) {
            $service = InsurerService::find($service_id);
            $service->update([
                'bill' => $invoice->id,
                'status' => 'facturado'
            ]);
        }
        return redirect(route('insurer.details', ['insurerService' => $request->insurer_id]));
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
