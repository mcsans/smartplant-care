<?php

namespace App\Http\Requests\API;

use App\Helpers\ApiResponseTrait;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class BaseRequestValidation extends FormRequest
{
    use ApiResponseTrait;

    protected $regex = '/^[a-zA-Z0-9\s_-]*$/';

    protected $regexDocument = '#^[a-zA-Z0-9\s_/-]*$#';

    protected $regexPassword = '/^(?=.*[A-Z])(?=.*[!@#$%^&*])[A-Za-z\d!@#$%^&*]+$/';

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    protected function failedValidation(Validator $validator)
    {
        $response = $this->specificApiResponse(
            'failed',
            $validator->errors()->first(),
            400
        );

        throw new ValidationException($validator, $response);
    }
}
