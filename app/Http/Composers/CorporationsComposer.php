<?php

namespace App\Http\Composers;

use Illuminate\View\View;
use App\Unit;
use App\Driver;
use App\Client;

class CorporationsComposer
{

    function compose(View $view)
    {
        $view->units = Unit::pluck('description', 'id')->toArray();
        $view->drivers = Driver::pluck('name', 'id')->toArray();
        $view->clients = Client::pluck('name', 'id')->toArray();
        $view->ser = 'corp';
    }
}
