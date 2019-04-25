<?php

namespace App\Http\Controllers;

use App\{Discount, Driver};
use Illuminate\Http\Request;

class DiscountController extends Controller
{

    function create()
    {
        $drivers = Driver::pluck('name', 'id')->toArray();
        $discounts = Discount::whereNull('cut_at')->where('type', 0)->get();
        $bonuses = Discount::whereNull('cut_at')->where('type', 1)->get();
        return view('resources.drivers.discounts.create', compact('drivers', 'discounts', 'bonuses'));
    }

    function store(Request $request)
    {
        $this->validate($request, [
            'reason' => 'required',
            'amount' => 'required',
            'discounted_at' => 'required',
            'driver_id' => 'required',
            'type' => 'required',
        ]);

        Discount::create($request->all());

        return redirect(route('discount.create'));
    }

    function edit(Discount $discount)
    {
        $drivers = Driver::pluck('name', 'id')->toArray();
        return view('resources.drivers.discounts.edit', compact('drivers', 'discount'));
    }

    function update(Request $request)
    {
        $this->validate($request, [
            'reason' => 'required',
            'amount' => 'required',
            'discounted_at' => 'required',
            'driver_id' => 'required',
            'type' => 'required',
        ]);

        Discount::find($request->id)->update($request->all());

        return redirect(route('discount.create'));
    }
}
