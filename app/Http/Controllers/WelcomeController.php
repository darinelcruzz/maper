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
            ->orderBy('id', 'desc')
            ->first();

        // dd($service);

        $cut = $service->cut_at ?? date('Y-m-d');
        $days = (time() - strtotime($cut))/86400;

        return view('welcome', compact('cut', 'days'));
    }
}
