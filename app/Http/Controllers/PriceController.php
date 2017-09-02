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
        $others = Price::where('type', 'otros')->get();
        $localG = Price::where('type', 'localS')->get();
        $localC = Price::where('type', 'localC')->get();
        $route1 = Price::where('type', 'Ruta 1')->get();
        $route2 = Price::where('type', 'Ruta 2')->get();
        $route3 = Price::where('type', 'Ruta 3')->get();
        $route4 = Price::where('type', 'Ruta 4')->get();
        $route5 = Price::where('type', 'Ruta 5')->get();

        return view('prices.show', compact('others', 'localG', 'localC', 'route1', 'route2', 'route3', 'route4', 'route5'));
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
