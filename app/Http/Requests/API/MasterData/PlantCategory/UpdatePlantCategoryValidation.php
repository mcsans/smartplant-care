<?php

namespace App\Http\Requests\API\MasterData\PlantCategory;

use App\Http\Requests\API\BaseRequestValidation;

class UpdatePlantCategoryValidation extends BaseRequestValidation
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|unique:plant_categories,name,'.request()->route('id'),
        ];
    }
}
