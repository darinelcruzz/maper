<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IkeServiceController extends Controller
{

    public function index()
    {
        return 'lista de todas los servicios';
    }

    public function create()
    {
        return 'formulario para crear';
    }

    public function store(Request $request)
    {

    }

    public function show($id)
    {
        return 'detalles de un servicio en particular';
    }

    public function edit($id)
    {
        return 'formulario para edición';
    }

    public function update(Request $request, $id)
    {

    }

    public function destroy($id)
    {
        
    }
}
