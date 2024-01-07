<?php

namespace App\Http\Requests\API\User;

use App\Http\Requests\API\BaseRequestValidation;

class StoreUserRequest extends BaseRequestValidation
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'phone_number' => 'string|unique:users,phone_number|regex:'.$this->regexPhoneNumber,
            'place_birth' => 'string',
            'date_birth' => 'string',
            'gender' => 'string|in:'.$this->genderIn(),
            'address' => 'string',
        ];
    }

    public function messages()
    {
        return [
            'phone_number.regex' => 'Phone number format must 62...',
            'gender.in' => 'Only can input '.$this->genderIn(),
        ];
    }
}
