<?php

namespace App\Http\Controllers\API\MasterData;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\MasterData\Plant\StorePlantValidation;
use App\Http\Requests\API\MasterData\Plant\UpdatePlantValidation;
use App\Http\Services\Features\MasterData\PlantService;

class PlantController extends Controller
{
    protected $service;

    public function __construct(PlantService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        try {
            $plants = $this->service->indexService();

            return $this->paginatedApiResponse(
                'success',
                'Successfully Retrieved Plant Data',
                200,
                $plants
            );
        } catch (\Throwable $th) {
            return $this->specificApiResponse('failed', $th->getMessage(), 400);
        }
    }

    public function show($id)
    {
        try {
            $plant = $this->service->findService($id);

            return $this->specificApiResponse(
                'success',
                'Successfully Retrieved Specific Plant Data',
                200,
                $plant
            );
        } catch (\Throwable $th) {
            return $this->specificApiResponse('failed', $th->getMessage(), 400);
        }
    }

    public function store(StorePlantValidation $request)
    {
        $inputData = $request->validated();

        try {
            $plant = $this->service->storeService($inputData);

            return $this->specificApiResponse(
                'success',
                'Successfully Stored Plant Data',
                201,
                $plant
            );
        } catch (\Throwable $th) {
            return $this->specificApiResponse('failed', $th->getMessage(), 400);
        }
    }

    public function update(UpdatePlantValidation $request, $id)
    {
        $inputData = $request->validated();

        try {
            $plant = $this->service->updateService($inputData, $id);

            return $this->specificApiResponse(
                'success',
                'Successfully Updated Plant Data',
                200,
                $plant
            );
        } catch (\Throwable $th) {
            return $this->specificApiResponse('failed', $th->getMessage(), 400);
        }
    }

    public function destroy($id)
    {
        try {
            $this->service->deleteService($id);

            return $this->specificApiResponse('success', 'Plant Successfully Deleted', 200);
        } catch (\Throwable $th) {
            return $this->specificApiResponse('failed', $th->getMessage(), 400);
        }
    }
}
