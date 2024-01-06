<?php

namespace App\Http\Requests\API\MasterData\Plant;

use App\Http\Requests\API\BaseRequestValidation;

class StorePlantValidation extends BaseRequestValidation
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'plant_category_id' => 'required|exists:plant_categories,id',
            'name' => 'required|string',
            'scientific_name' => 'required|string',
            'habitat' => 'required|string',
            'benefits' => 'required|string',
            'nutritional_value' => 'required|string',
            'pests_and_diseases' => 'required|string',
            'cultivation_techniques' => 'required|string',
        ];
    }
}
