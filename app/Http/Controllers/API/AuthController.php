<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthLoginRequest;
use App\Http\Requests\AuthRegistrationRequest;
use App\Http\Resources\AuthResource;
use App\Http\Services\Traits\ResultResponse;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class AuthController extends Controller
{
    use ResultResponse;

    public function registration(AuthRegistrationRequest $request)
    {
        $inputData = $request->validated();

        try {
            $user = User::create([
                'name' => $inputData['name'],
                'email' => $inputData['email'],
                'password' => Hash::make($inputData['password']),
            ]);

            $role = Role::findByName('NORMAL_USER', 'api');
            $user->assignRole($role);

            event(new Registered($user));

            return $this->resultResponse('success', 'User Registration Successfully', 200);
        } catch (\Throwable $th) {
            return $this->specificApiResponse('failed', $th->getMessage(), 400);
        }
    }

    public function login(AuthLoginRequest $request)
    {
        $credentials = $request->only(['email', 'password']);

        if (Auth::attempt($credentials)) {
            if (auth()->user()->email_verified_at) {
                return new AuthResource(auth()->user());
            } else {
                return $this->resultResponse('failed', 'Email is not verified', 401);
            }
        }

        return $this->resultResponse('failed', 'Email or PIN is Wrong', 400);
    }

    public function logout()
    {
        if (Auth::check()) {
            Auth::user()->tokens()->delete();
        }

        return $this->resultResponse('success', 'Email Successfully Logout', 200);
    }
}
