<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Resources\Auth\UserAuthResource;

class UserAuthController extends Controller
{
    public function register(RegisterRequest $request): UserAuthResource
    {
        $request = $request->validated();

        $request['password'] = bcrypt($request['password']);

        $user = User::create($request);

        $token = $user->createToken('API Token')->accessToken;

        return UserAuthResource::make($token);
    }

    public function login(LoginRequest $request): UserAuthResource|string
    {
        $data = $request->validated();

        if (!auth()->attempt($data)) {
            return response(['error_message' => 'Incorrect Details. Please try again']);
        }

        $token = auth()->user()->createToken('API Token')->accessToken;

        return UserAuthResource::make($token);
    }
}
