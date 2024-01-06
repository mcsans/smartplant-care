<?php

namespace App\Models\MasterData;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plant extends Model
{
    use HasFactory;

    protected $fillable = [
        'plant_category_id',
        'name',
        'scientific_name',
        'habitat',
        'benefits',
        'nutritional_value',
        'pests_and_diseases',
        'cultivation_techniques',
    ];

    public function category()
    {
        return $this->belongsTo(PlantCategory::class, 'plant_category_id');
    }
}
