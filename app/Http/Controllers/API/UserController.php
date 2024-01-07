<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\User\StoreUserRequest;
use App\Http\Requests\API\User\UpdateUserRequest;
use App\Http\Services\Features\UserService;

class UserController extends Controller
{
    protected $service;

    public function __construct(UserService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        try {
            $users = $this->service->indexService();

            return $this->paginatedApiResponse(
                'success',
                'Successfully Retrieved User Data',
                200,
                $users
            );
        } catch (\Throwable $th) {
            return $this->specificApiResponse('failed', $th->getMessage(), 400);
        }
    }

    public function show($id)
    {
        try {
            $user = $this->service->findService($id);

            return $this->specificApiResponse(
                'success',
                'Successfully Retrieved Specific User Data',
                200,
                $user
            );
        } catch (\Throwable $th) {
            return $this->specificApiResponse('failed', $th->getMessage(), 400);
        }
    }

    public function store(StoreUserRequest $request)
    {
        $inputData = $request->validated();

        try {
            $user = $this->service->storeService($inputData);

            return $this->specificApiResponse(
                'success',
                'Successfully Stored User Data',
                201,
                $user
            );
        } catch (\Throwable $th) {
            return $this->specificApiResponse('failed', $th->getMessage(), 400);
        }
    }

    public function update(UpdateUserRequest $request, $id)
    {
        $inputData = $request->validated();

        try {
            $user = $this->service->updateService($inputData, $id);

            return $this->specificApiResponse(
                'success',
                'Successfully Updated User Data',
                200,
                $user
            );
        } catch (\Throwable $th) {
            return $this->specificApiResponse('failed', $th->getMessage(), 400);
        }
    }

    public function updateBatch()
    {
        try {
            $this->service->updateBatchService();

            return $this->specificApiResponse('success', 'Successfully Update Batch User Data', 200);
        } catch (\Throwable $th) {
            return $this->specificApiResponse('failed', $th->getMessage(), 400);
        }
    }

    public function destroy($id)
    {
        try {
            $this->service->deleteService($id);

            return $this->specificApiResponse('success', 'User Successfully Deleted', 200);
        } catch (\Throwable $th) {
            return $this->specificApiResponse('failed', $th->getMessage(), 400);
        }
    }
}
