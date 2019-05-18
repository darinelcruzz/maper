<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Jenssegers\Date\Date;
use App\Expense;
use App\Service;
use App\Invoice;

class BankController extends Controller
{
    function create()
    {
        $movements = Expense::where('method','b')->get();
        $expenses = Expense::where('method','b')->where('type', 'cargo')->get();
        $ingreses = Expense::where('method','b')->where('type', 'abono')->get();
        $invoices = Invoice::where('status', 'pagada')->get();
        $date = Date::now()->format('Y-m-d');

        return view('banks.create', compact('date', 'invoices', '$movements', 'ingreses', 'expenses'));
    }

    function store(Request $request)
    {
        $this->validate($request, []);

        $expense = Expense::create($request->all());
        return redirect(route('bank.create'));
    }

    function edit(Expense $expense)
    {
        return view('banks.edit', compact('expense'));
    }

    function change(Request $request, Expense $expense)
    {
        $expense->update($request->all());

        return redirect(route('bank.create'));
    }

    function update(Request $request)
    {
        $this->validate($request, []);
        Service::find($request->id)->update($request->all());

        return $this->create();
    }

    function format(Request $request)
    {
        $banks = Expense::whereBetween('date', [$request->date_start . ' 00:00:00', $request->date_end . ' 23:59:59'])->get();
        $start = new Date(strtotime($request->date_start));
        $end = new Date(strtotime($request->date_end));
        $range = $start->format('D, d/M/Y') . ' - ' . $end->format('D, d/M/Y');
        return view('banks.format', compact('banks', 'range'));
    }
}
