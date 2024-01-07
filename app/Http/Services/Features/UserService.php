<?php

namespace App\Http\Services\Features;

use App\Http\Repositories\Contracts\UserContract;
use App\Http\Resources\User\UserResource;
use Illuminate\Support\Facades\Hash;

class UserService
{
    protected $repository;

    public function __construct(UserContract $userRepository)
    {
        $this->repository = $userRepository;
    }

    protected function payload($request)
    {
        $payloads = [
            'name' => $request['name'],
            'email' => $request['email'],
        ];

        if (isset($request['phone_number'])) {
            $payloads['phone_number'] = $request['phone_number'];
        }

        if (isset($request['place_birth'])) {
            $payloads['place_birth'] = $request['place_birth'];
        }

        if (isset($request['date_birth'])) {
            $payloads['date_birth'] = $request['date_birth'];
        }

        if (isset($request['gender'])) {
            $payloads['gender'] = $request['gender'];
        }

        if (isset($request['address'])) {
            $payloads['address'] = $request['address'];
        }

        return $payloads;
    }

    public function indexService()
    {
        $users = $this->repository->all();

        return UserResource::collection($users);
    }

    public function findService($id)
    {
        $user = $this->repository->find($id);

        return new UserResource($user);
    }

    public function storeService(array $request)
    {
        $inputData = $this->payload($request);

        $inputData['password'] = Hash::make('12345678');

        $user = $this->repository->store($inputData);

        return new UserResource($user);
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
