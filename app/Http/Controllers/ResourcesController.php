<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Driver;
use App\Unit;

class ResourcesController extends Controller
{
    public function show()
    {
        $drivers = Driver::all();
        $units = Unit::all();
        return view('resources.show', compact('drivers', 'units'));
    }
}
