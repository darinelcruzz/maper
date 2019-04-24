<?php

namespace App\Http\Controllers;

use App\{Discount, Driver};
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    function index()
    {
        $drivers = Driver::pluck('name', 'id')->toArray();
        $discounts = Discount::whereNull('cut_at')->where('type', 0)->get();
        return view('resources.drivers.discounts', compact('drivers', 'discounts'));
    }

    function payments()
    {
        $drivers = Driver::pluck('name', 'id')->toArray();
        $payments = Discount::whereNull('cut_at')->where('type', 1)->get();
        return view('resources.drivers.payments', compact('drivers', 'payments'));
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
