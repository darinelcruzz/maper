<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Jenssegers\Date\Date;
use App\Expense;
use App\Service;

class BankController extends Controller
{
    public function create()
    {
        $expenses = Expense::where('method','b')->get();
        $services = Service::where('bill', '!=','n/a')->where('pay', '!=','Efectivo')->get();
        $date = Date::now()->format('Y-m-d');

        return view('banks.create', compact('date', 'services', 'expenses'));
    }

    public function store(Request $request)
    {
        $this->validate($request, []);

        $expense = Expense::create($request->all());
        return redirect(route('bank.create'));
    }

    public function edit(Expense $expense)
    {
        $expenses =Expense::where('method','b')->get();
        return view('banks.edit', compact('expense', 'expenses'));
    }

    public function change(Request $request)
    {
        $this->validate($request, []);
        Expense::find($request->id)->update($request->all());

        return $this->create();
    }

    public function update(Request $request)
    {
        $this->validate($request, []);
        Service::find($request->id)->update($request->all());

        return $this->create();
    }

    public function format(Request $request)
    {
        $banks = Expense::whereBetween('date', [$request->date_start . ' 00:00:00', $request->date_end . ' 23:59:59'])->get();
        $start = new Date(strtotime($request->date_start));
        $end = new Date(strtotime($request->date_end));
        $range = $start->format('D, d/M/Y') . ' - ' . $end->format('D, d/M/Y');
        // $total = $banks->sum('amount');
        return view('banks.format', compact('banks', 'range'));
    }
}
