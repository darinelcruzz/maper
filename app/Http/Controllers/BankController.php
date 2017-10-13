<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Jenssegers\Date\Date;
use App\Bank;
use App\Service;

class BankController extends Controller
{
    public function create()
    {
        $banks = Bank::all();
        $services = Service::where('pay','!=', 'Efectivo')->Where('pay_credit','!=', 'Efectivo')->orWhere('pay','!=', 'credito')->get();
        $date = Date::now()->format('Y-m-d');

        return view('banks.create', compact('banks', 'date', 'services'));
    }

    public function store(Request $request)
    {
        $this->validate($request, []);

        $expense = Bank::create($request->all());
        return redirect(route('expense.create'));
    }

    public function edit(Bank $expense)
    {
        $banks = Bank::all();
        return view('banks.edit', compact('expense', 'banks'));
    }

    public function change(Request $request)
    {
        $this->validate($request, []);

        Bank::find($request->id)->update($request->all());

        return $this->create();
    }

    public function format(Request $request)
    {
        $banks = Bank::whereBetween('date', [$request->date_start . ' 00:00:00', $request->date_end . ' 23:59:59'])->get();
        $start = new Date(strtotime($request->date_start));
        $end = new Date(strtotime($request->date_end));
        $range = $start->format('D, d/M/Y') . ' - ' . $end->format('D, d/M/Y');
        // $total = $banks->sum('amount');
        return view('banks.format', compact('banks', 'range'));
    }
}
