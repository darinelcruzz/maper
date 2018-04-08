<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Jenssegers\Date\Date;
use App\Expense;

class ExpenseController extends Controller
{
    public function create()
    {
        $expenses = Expense::where('method','e')->get();
        $date = Date::now()->format('Y-m-d');

        return view('expenses.create', compact('expenses', 'date'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'description' => 'required',
            'amount' => 'required',
            'bill' => 'required',
        ]);

        $expense = Expense::create($request->all());
        return redirect(route('expense.create'));
    }

    public function edit(Expense $expense)
    {
        $expenses = Expense::where('method','e')->get();
        return view('expenses.edit', compact('expense', 'expenses'));
    }

    public function change(Request $request)
    {
        $this->validate($request, []);

        Expense::find($request->id)->update($request->all());

        return $this->create();
    }

    public function format(Request $request)
    {
        $expenses = Expense::whereBetween('date', [$request->date_start . ' 00:00:00', $request->date_end . ' 23:59:59'])->get();
        $formerA = Expense::where('date', '<', [$request->date_start . ' 00:00:00'])
                            ->where('type', 'abono')->sum('amount');
        $formerC = Expense::where('date', '<', [$request->date_start . ' 00:00:00'])
                            ->where('type', 'cargo')->sum('amount');
        $former = $formerA - $formerC;
        $start = new Date(strtotime($request->date_start));
        $end = new Date(strtotime($request->date_end));
        $range = $start->format('D, d/M/Y') . ' - ' . $end->format('D, d/M/Y');

        return view('expenses.format', compact('expenses', 'range', 'former'));
    }

}
