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
            ->orderBy('cut_at', 'desc')
            ->take(1)
            ->get()
            ->pluck('cut_at');

        $cut = $service[0];

        $last_cut = fdate($cut, 'U', 'Y-m-d');

        $now = Date::now()->format('U');
        $days = ($now - $last_cut)/86400;

        return view('welcome', compact('days', 'cut'));
    }
}
