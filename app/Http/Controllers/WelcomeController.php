<?php

namespace App\Http\Controllers;

use App\{Service};
use Illuminate\Http\Request;
use Jenssegers\Date\Date;

class WelcomeController extends Controller
{
    function index()
    {
        $service = Service::where('cut_at', '!=', 'null')
            ->latest()
            ->get()
            ->first();

        $cut = $service;

        $days = (time() - strtotime($service->cut_at))/86400;

        return view('welcome', compact('days', 'cut'));
    }
}
