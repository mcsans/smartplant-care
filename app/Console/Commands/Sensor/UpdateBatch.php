<?php

namespace App\Console\Commands\Sensor;

use App\Models\Sensor;
use Illuminate\Console\Command;

class UpdateBatch extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sensor:update-batch';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update Batch Sensor Every 5 Second';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $sensors = Sensor::all();

        foreach ($sensors as $sensor) {
            $sensor->value = rand(1, 100);
            $sensor->save();
        }

        $this->components->info('Successfully Update Batch Sensor Data');
    }
}
