<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Jenssegers\Date\Date;
use App\Service;

class AdministrationController extends Controller
{
    public function show()
    {
        $date =  Date::now()->format('Y-m-d');

        return view('cash.balance', compact('date'));
    }
}
