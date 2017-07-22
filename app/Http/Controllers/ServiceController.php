<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;

class ServiceController extends Controller
{
    public function create()
    {
        return view('services.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:services',
            'city' => 'required',
            'phone' => 'required',
        ]);

        $service = Service::create($request->all());
        return redirect(route('service.show'));
    }

    public function show()
    {
        $services = service::all();
        return view('services.show', compact('services'));
    }

    public function edit($id)
    {
        $service = Service::find($id);
        return view('services.edit', compact('service'));
    }

    public function change(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'city' => 'required',
            'phone' => 'required',
        ]);

        Service::find($request->id)->update($request->all());

        return $this->show();
    }

    function deleteService($id)
    {
        Service::destroy($id);

        return back();
    }
}
