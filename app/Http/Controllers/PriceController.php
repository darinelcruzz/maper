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

        $price = Price::create($request->except(['service']));
        return redirect(route('price.show'));
    }

    public function show()
    {
        $prices = Price::all();
        $types = ['otros', 'localG', 'localC', 'Ruta 1', 'Ruta 2', 'Ruta 3', 'Ruta 4', 'Ruta 5'];
        $header = ['Km', 'Nombre', 'Moto', 'Coche', '3 Ton', '5 Ton', '10 Ton'];
        $body = ['km', 'name', 'moto', 'car', 'ton3', 'ton5', 'ton10'];

        return view('prices.show', compact('prices', 'types', 'body', 'header'));
    }

    public function edit(Price $price)
    {
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

    function destroy($id)
    {
        Price::destroy($id);

        return back();
    }
}
