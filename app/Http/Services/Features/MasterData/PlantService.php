<?php

namespace App\Http\Services\Features\MasterData;

use App\Http\Repositories\Contracts\MasterData\PlantContract;
use App\Http\Resources\MasterData\Plant\PlantResource;

class PlantService
{
    protected $repository;

    public function __construct(PlantContract $plantRepository)
    {
        $this->repository = $plantRepository;
    }

    protected function payload($request)
    {
        $payloads = [
            'plant_category_id' => $request['plant_category_id'],
            'name' => $request['name'],
            'scientific_name' => $request['scientific_name'],
            'habitat' => $request['habitat'],
            'benefits' => $request['benefits'],
            'nutritional_value' => $request['nutritional_value'],
            'pests_and_diseases' => $request['pests_and_diseases'],
            'cultivation_techniques' => $request['cultivation_techniques'],
        ];

        return $payloads;
    }

    public function indexService()
    {
        $examples = $this->repository->all();

        return PlantResource::collection($examples);
    }

    public function findService($id)
    {
        $example = $this->repository->find($id);

        return new PlantResource($example);
    }

    public function storeService(array $request)
    {
        $inputData = $this->payload($request);

        $example = $this->repository->store($inputData);

        return new PlantResource($example);
    }

    public function updateService(array $request, $id)
    {
        $inputData = $this->payload($request);

        $this->repository->update($inputData, $id);

        return $this->findService($id);
    }

    public function deleteService($id)
    {
        $this->repository->delete($id);
    }
}
