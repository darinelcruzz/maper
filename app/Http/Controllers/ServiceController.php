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
        $general = Service::where('service', 'Público general')->get();
        $corps = Service::where('service', '!=', 'Público general')
                        ->where('status', 'corralon')->get();
        $release = Service::where('service', '!=', 'Público general')
                        ->where('status', 'liberado')->get();

        return view('services.show', compact('general', 'corps', 'release'));
    }

}
