<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Jenssegers\Date\Date;
use App\Service;
use App\Unit;

class ServiceController extends Controller
{

    public function show()
    {
        $general = Service::where('status', 'pendiente')->get();
        $corps = Service::where('service', '!=', 'General')
                        ->where('status', 'corralon')->get();
        $release = Service::where('service', '!=', 'General')
                        ->where('status', 'liberado')->get();
        $paid = Service::where('service', 'General')
                        ->where('status', 'pagado')->get();

        return view('services.show', compact('general', 'corps', 'release', 'paid'));
    }

}
