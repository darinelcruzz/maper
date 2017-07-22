<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Provider;

class ProviderController extends Controller
{
    public function create()
	{
		return view('providers.create');
	}

	public function store(Request $request)
    {
    	$this->validate($request, [
    		'name' => 'required',
    		'city' => 'required',
    		'phone' => 'required',

    	]);

    	$provider = Provider::create($request->all());

    	return redirect(route('provider.show'));
    }

    public function show()
    {
        $ruta = 'provider.edit';
        $providers = Provider::get([
            'id', 'name', 'rfc', 'city', 'phone', 'email', 'contact'
        ]);

        return view('providers.show', compact('providers', 'ruta'));
    }

    public function edit($id)
    {
        $provider = Provider::find($id);
        return view('providers.edit', compact('provider'));
	}

    public function change(Request $request)
    {
        $this->validate($request, [
    		'name' => 'required',
    		'city' => 'required',
    		'phone' => 'required',
    	]);

        Provider::find($request->id)->update($request->all());

        return $this->show();
    }
}
