<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Jenssegers\Date\Date;
use App\Service;
use App\Unit;

class CorporationServiceController extends Controller
{
    public function create()
    {
        $units = Unit::pluck('description', 'id')->toArray();
        return view('services.corporations.create', compact('units'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'service' => 'required',
        ]);

        $service = Service::create($request->all());
        return redirect(route('service.show'));

    }

    public function edit($id)
    {
        $service = Service::find($id);
        $units = Unit::pluck('description', 'id')->toArray();
        return view('services.corporation.edit', compact('service', 'units'));
    }

    public function change(Request $request)
    {
        $this->validate($request, []);

        Service::find($request->id)->update($request->all());

        return $this->show();
    }

    function details(Service $service)
    {
        return view('services.corporation.details', compact('service'));
    }

    function deleteService($id)
    {
        Service::destroy($id);

        return back();
    }
}
