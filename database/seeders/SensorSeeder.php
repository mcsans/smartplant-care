<?php

namespace Database\Seeders;

use App\Models\Sensor;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class SensorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();

        $sensors = [
            [
                'code' => 'light-intensity',
                'name' => 'Light Intensity',
                'value' => 100,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'code' => 'temperature',
                'name' => 'Temperature',
                'value' => 100,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'code' => 'humidity',
                'name' => 'Humidity',
                'value' => 100,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'code' => 'soil-moisture',
                'name' => 'Soil Moisture',
                'value' => 100,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];

        Sensor::insert($sensors);
    }
}
