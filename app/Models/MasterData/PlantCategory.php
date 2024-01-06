<?php

namespace App\Models\MasterData;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlantCategory extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function plants()
    {
        return $this->hasMany(Plant::class);
    }
}
