<?php

namespace App\Http\Composers;

use Illuminate\View\View;
use App\{Unit, Driver, Client, Price};

class CorporationsComposer
{

    function compose(View $view)
    {
        $view->units = Unit::pluck('description', 'id')->toArray();
        $view->drivers = Driver::where('type', 'operador')->pluck('name', 'id')->toArray();
        $view->clients = Client::pluck('name', 'id')->toArray();
        $view->prices = Price::all();
        $view->ser = 'corp';
    }
}
