<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Price;

class PriceController extends Controller
{
    public function create()
    {
        return view('prices.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, []);

        $price = Price::create($request->all());
        return redirect(route('price.show'));
    }

    public function show()
    {
        $prices = Price::all();
        return view('prices.show', compact('prices'));
    }

    public function edit($id)
    {
        $price = Price::find($id);
        return view('prices.edit', compact('price'));
    }

    public function change(Request $request)
    {
        $this->validate($request, []);

        Price::find($request->id)->update($request->all());

        return $this->show();
    }

    function details(Unit $unit)
    {
        return view('prices.details', compact('unit'));
    }

    function deleteSnit($id)
    {
        Price::destroy($id);

        return back();
    }
}
