<?php

namespace App\Http\Composers;

use Illuminate\View\View;
use App\{Unit, Driver, Client, Price};

class GeneralComposer
{

    function compose(View $view)
    {
        $view->units = Unit::pluck('description', 'id')->toArray();
        $view->drivers = Driver::where('type', 'operador')->where('status', 1)->pluck('name', 'id')->toArray();
        $view->clients = Client::where('status', 1)->pluck('name', 'id')->toArray();
        $view->prices = Price::all();
        $view->ser = 'gen';
    }
}
