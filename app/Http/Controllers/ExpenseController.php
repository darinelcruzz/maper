<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Jenssegers\Date\Date;
use App\Expense;

class ExpenseController extends Controller
{
    public function create()
    {
        $expenses = Expense::all();
        $date = Date::now()->format('Y-m-d');

        return view('expenses.create', compact('expenses', 'date'));
    }

    public function store(Request $request)
    {
        $this->validate($request, []);

        $expense = Expense::create($request->all());
        return redirect(route('expense.create'));
    }

    public function edit($id)
    {
        $expense = Expense::find($id);
        $expenses = Expense::all();
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
        $all = Expense::whereBetween('date', [$request->date_start . ' 00:00:00', $request->date_end . ' 23:59:59'])->get();
        $start = new Date(strtotime($request->date_start));
        $end = new Date(strtotime($request->date_end));
        $range = $start->format('D, d/M/Y') . ' - ' . $end->format('D, d/M/Y');

        $total = $this->getTotal($all);
        return view('expenses.format', compact('all', 'range', 'total'));
    }

    public function getTotal($expenses)
    {
        $total = 0;

        foreach ($expenses as $expense) {
            $total += $expense->amount;
        }

        return $total;
    }

}
