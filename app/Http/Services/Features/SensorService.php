<?php

namespace App\Http\Services\Features;

use App\Http\Repositories\Contracts\SensorContract;
use App\Http\Resources\Sensor\SensorResource;

class SensorService
{
    protected $repository;

    public function __construct(SensorContract $sensorRepository)
    {
        $this->repository = $sensorRepository;
    }

    protected function payload($request)
    {
        $payloads = [
            'name' => $request['name'],
            'value' => $request['value'],
        ];

        if (isset($request['description'])) {
            $payloads['description'] = $request['description'];
        }

        return $payloads;
    }

    public function indexService()
    {
        $sensors = $this->repository->all();

        return SensorResource::collection($sensors);
    }

    public function findService($id)
    {
        $sensor = $this->repository->find($id);

        return new SensorResource($sensor);
    }

    public function storeService(array $request)
    {
        $inputData = $this->payload($request);

        $sensor = $this->repository->store($inputData);

        return new SensorResource($sensor);
    }

    public function updateService(array $request, $id)
    {
        $inputData = $this->payload($request);

        $this->repository->update($inputData, $id);

        return $this->findService($id);
    }

    public function updateBatchService()
    {
        $this->repository->updateBatch();
    }

    public function deleteService($id)
    {
        $this->repository->delete($id);
    }
}
