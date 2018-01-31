<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Insurer;

class InsurerController extends Controller
{
    function index()
    {
        $insurers = Insurer::all();
        return view('insurers.index', compact('insurers'));
    }

    function create()
    {
        return view('insurers.create');
    }

    function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'business_name' => 'required',
            'rfc' => 'required',
            'address' => 'required',
            'phone' => 'required'
        ]);

        Insurer::create($request->all());

        return redirect(route('insurer.index'));
    }
}
