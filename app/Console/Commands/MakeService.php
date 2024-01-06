<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class MakeService extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:service {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $serviceName = $this->argument('name');
        $names = explode('/', $serviceName);
        $classname = end($names).'Service';

        if (count($names) > 1) {
            array_pop($names);
            $namespace = 'App\\Http\\Services\\Features\\' . implode('\\', $names);
        } else {
            $namespace = 'App\\Http\\Services\\Features';
        }

        $stubPath = resource_path('stubs/service.stub');
        $filePath = "{$namespace}/{$classname}.php";

        if (File::exists($filePath)) {
            $this->error("Service Already Exists.");
            return false;
        }

        $serviceContent = file_get_contents($stubPath);
        $serviceContent = str_replace(['{{namespace}}', '{{classname}}'], [$namespace, $classname], $serviceContent);

        $this->createDirectories($filePath);

        file_put_contents($filePath, $serviceContent);

        $this->info('Service Created Successfully.');
    }

    protected function createDirectories($filePath)
    {
        $directory = dirname($filePath);

        if (!is_dir($directory)) {
            mkdir($directory, 0755, true);
        }
    }
}
