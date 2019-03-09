<?php

namespace App\Http\Controllers;

use App\{Discount, Driver};
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    function index()
    {
        $drivers = Driver::pluck('name', 'id')->toArray();
        $discounts = Discount::all();
        return view('resources.drivers.discounts', compact('drivers', 'discounts'));
    }

    function store(Request $request)
    {
        $this->validate($request, [
            'reason' => 'required',
            'amount' => 'required',
            'discounted_at' => 'required',
            'driver_id' => 'required'
        ]);

        Discount::create($request->all());

        return redirect(route('admin.search'));
    }
}
