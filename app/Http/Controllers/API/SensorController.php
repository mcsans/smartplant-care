<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\Sensor\StoreSensorRequest;
use App\Http\Requests\API\Sensor\UpdateSensorRequest;
use App\Http\Services\Features\SensorService;

class SensorController extends Controller
{
    protected $service;

    public function __construct(SensorService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        try {
            $sensors = $this->service->indexService();

            return $this->paginatedApiResponse(
                'success',
                'Successfully Retrieved Sensor Data',
                200,
                $sensors
            );
        } catch (\Throwable $th) {
            return $this->specificApiResponse('failed', $th->getMessage(), 400);
        }
    }

    public function show($id)
    {
        try {
            $sensor = $this->service->findService($id);

            return $this->specificApiResponse(
                'success',
                'Successfully Retrieved Specific Sensor Data',
                200,
                $sensor
            );
        } catch (\Throwable $th) {
            return $this->specificApiResponse('failed', $th->getMessage(), 400);
        }
    }

    public function store(StoreSensorRequest $request)
    {
        $inputData = $request->validated();

        try {
            $sensor = $this->service->storeService($inputData);

            return $this->specificApiResponse(
                'success',
                'Successfully Stored Sensor Data',
                201,
                $sensor
            );
        } catch (\Throwable $th) {
            return $this->specificApiResponse('failed', $th->getMessage(), 400);
        }
    }

    public function update(UpdateSensorRequest $request, $id)
    {
        $inputData = $request->validated();

        try {
            $sensor = $this->service->updateService($inputData, $id);

            return $this->specificApiResponse(
                'success',
                'Successfully Updated Sensor Data',
                200,
                $sensor
            );
        } catch (\Throwable $th) {
            return $this->specificApiResponse('failed', $th->getMessage(), 400);
        }
    }

    public function updateBatch()
    {
        try {
            $this->service->updateBatchService();

            return $this->specificApiResponse('success', 'Successfully Update Batch Sensor Data', 200);
        } catch (\Throwable $th) {
            return $this->specificApiResponse('failed', $th->getMessage(), 400);
        }
    }

    public function destroy($id)
    {
        try {
            $this->service->deleteService($id);

            return $this->specificApiResponse('success', 'Sensor Successfully Deleted', 200);
        } catch (\Throwable $th) {
            return $this->specificApiResponse('failed', $th->getMessage(), 400);
        }
    }
}
