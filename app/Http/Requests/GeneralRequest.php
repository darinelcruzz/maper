<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GeneralRequest extends FormRequest
{
    function authorize()
    {
        return true;
    }

    function rules()
    {
        return [
            'description' => 'sometimes|required',
            'maneuver' => 'sometimes|required',
            'brand' => 'sometimes|required',
            'type' => 'sometimes|required',
            'category' => 'sometimes|required',
            'load' => 'sometimes|required',
            'plate' => 'sometimes|required',
            'color' => 'sometimes|required',
            'origin' => 'sometimes|required',
            'destination' => 'sometimes|required',
            'driver_id' => 'sometimes|required',
            'unit_id' => 'sometimes|required',
            'amount' => 'sometimes|required',
            'pay' => 'sometimes|required',
            'client_id' => 'sometimes|required',
            'others' => 'sometimes|required',
            'reason' => 'sometimes|required',
            'key' => 'sometimes|required'
        ];
    }
}
