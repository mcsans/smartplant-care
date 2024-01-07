<?php

namespace App\Http\Requests\API\Sensor;

use App\Http\Requests\API\BaseRequestValidation;

class StoreSensorRequest extends BaseRequestValidation
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|unique:sensors,name',
            'value' => 'required',
            'description' => 'string',
        ];
    }
}
