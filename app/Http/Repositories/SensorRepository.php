<?php

namespace App\Http\Repositories;

use App\Http\Repositories\Contracts\SensorContract;
use App\Models\Sensor;

class SensorRepository extends BaseRepository implements SensorContract
{
    protected $sensor;

    public function __construct(Sensor $sensor)
    {
        parent::__construct($sensor);
        $this->sensor = $sensor;
    }

    public function updateBatch()
    {
        $sensors = $this->all();
        $request = request();

        foreach ($sensors as $sensor) {
            if (isset($request[$sensor->code]) || ($request[$sensor->code]) != null) {
                $sensor->value = $request[$sensor->code];
                $sensor->save();
            }
        }
    }
}
