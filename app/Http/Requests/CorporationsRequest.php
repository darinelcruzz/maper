<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CorporationsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'service' => 'sometimes|required',
            'description' => 'sometimes|required',
            'maneuver' => 'sometimes|required',
            'brand' => 'sometimes|required',
            'type' => 'sometimes|required',
            'category' => 'sometimes|required',
            'load' => 'sometimes|required',
            'plate' => 'sometimes|required',
            'color' => 'sometimes|required',
            'key' => 'sometimes|required',
            'model' => 'sometimes|required',
            'origin' => 'sometimes|required',
            'destination' => 'sometimes|required',
            'driver_id' => 'sometimes|required',
            'unit_id' => 'sometimes|required',
            'date_return' => 'sometimes|required',
            'lot' => 'sometimes|required',
            'releaser' => 'sometimes|required',
            'amount' => 'sometimes|required',
            'discount' => 'sometimes|required',
            'pay' => 'sometimes|required',
        ];
    }
}
