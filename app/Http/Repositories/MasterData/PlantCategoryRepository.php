<?php

namespace App\Http\Repositories\MasterData;

use App\Http\Repositories\BaseRepository;
use App\Http\Repositories\Contracts\MasterData\PlantCategoryContract;
use App\Models\MasterData\PlantCategory;

class PlantCategoryRepository extends BaseRepository implements PlantCategoryContract
{
    protected $plantCategory;

    public function __construct(PlantCategory $plantCategory)
    {
        parent::__construct($plantCategory);
        $this->plantCategory = $plantCategory;
    }
}
