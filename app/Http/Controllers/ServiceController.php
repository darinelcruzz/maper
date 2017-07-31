<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Jenssegers\Date\Date;
use App\Service;
use App\Unit;

class ServiceController extends Controller
{
    public function create()
    {
        $units = Unit::pluck('description', 'id')->toArray();
        return view('services.create', compact('units'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [

        ]);

        $service = Service::create($request->all());
        return redirect(route('service.show'));
    }

    public function show()
    {
        $public = Service::service('Publico en general');
        return view('services.show', compact('public'));
    }

    public function edit($id)
    {
        $service = Service::find($id);
        return view('services.edit', compact('service'));
    }

    public function change(Request $request)
    {
        $this->validate($request, [

        ]);

        Service::find($request->id)->update($request->all());

        return $this->show();
    }

    function details(Service $service)
    {
        return view('services.details', compact('service'));
    }

    function deleteService($id)
    {
        Service::destroy($id);

        return back();
    }
}
