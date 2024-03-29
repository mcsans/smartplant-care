<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'deleted_at' => $this->deleted_at,
            'name' => $this->name,
            'email' => $this->email,
            'phone_number' => $this->phone_number,
            'place_birth' => $this->place_birth,
            'date_birth' => $this->date_birth,
            'gender' => $this->gender,
            'address' => $this->address,
        ];
    }
}
