<?php

namespace App\Http\Repositories\MasterData;

use App\Http\Repositories\BaseRepository;
use App\Http\Repositories\Contracts\MasterData\PlantContract;
use App\Models\MasterData\Plant;

class PlantRepository extends BaseRepository implements PlantContract
{
    protected $plant;

    public function __construct(Plant $plant)
    {
        parent::__construct($plant);
        $this->plant = $plant;
    }
}
