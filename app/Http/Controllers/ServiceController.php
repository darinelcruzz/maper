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
        $public = Service::service('=','Publico general');
        $corps = Service::service('!=', 'publico general');
        return view('services.show', compact('public', 'corps'));
    }

}
