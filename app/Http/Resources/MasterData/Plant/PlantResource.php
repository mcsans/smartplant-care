<?php

namespace App\Http\Resources\MasterData\Plant;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PlantResource extends JsonResource
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
            'scientific_name' => $this->scientific_name,
            'habitat' => $this->habitat,
            'benefits' => $this->benefits,
            'nutritional_value' => $this->nutritional_value,
            'pests_and_diseases' => $this->pests_and_diseases,
            'cultivation_techniques' => $this->cultivation_techniques,
            'category' => $this->category,
        ];
    }
}
