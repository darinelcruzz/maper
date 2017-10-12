<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GeneralRequest extends FormRequest
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
            'description' => 'sometimes|required',
            'amount' => 'sometimes|required',
            'brand' => 'sometimes|required',
            'type' => 'sometimes|required',
            'category' => 'sometimes|required',
            'load' => 'sometimes|required',
            'plate' => 'sometimes|required',
            'color' => 'sometimes|required',
            'client' => 'sometimes|required',
            'origin' => 'sometimes|required',
            'destination' => 'sometimes|required',
            'driver' => 'sometimes|required',
            'unit' => 'sometimes|required',
            'date_return' => 'sometimes|required',
            'amount' => 'sometimes|required',
            'maneuver' => 'sometimes|required',
            'others' => 'sometimes|required',
            'pay' => 'sometimes|required',
            'reason' => 'sometimes|required'
        ];
    }
}
