<?php

namespace App\Http\Controllers;

use App\Http\Helpers\Response;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(LoginRequest $request): \Illuminate\Http\JsonResponse
    {
        $credentials = $request->validated();

        try {
            $user = User::where('email', $credentials['identity'])->where('password')->first();

            if (!$user) {
                return Response::error('Invalid Credentials',[],400);
            }

            if (!$user || !Hash::check($credentials['password'], $user->password)) {
                return Response::error('Invalid credentials', [], 400);
            }

            $token = $user->createToken('auth_token')->plainTextToken;

            return Response::success('User logged in successfully!', [
                'access_token' => $token,
                'token_type' => 'Bearer',
                'user' => new UserResource($user)
            ]);
        } catch (\Exception $e) {
            return Response::error('Something went wrong', [], 500);
        }
    }

    public function register(RegisterRequest $request): \Illuminate\Http\JsonResponse
    {
        $valid = $request->validated();

        try {
            $user = User::create($valid);

            $token = $user->createToken('auth_token')->plainTextToken;

            return Response::success('User Created Successfully!',[
                'access_token' => $token,
                'token_type' => 'Bearer',
                'user' => new UserResource($user)
            ]);

        }catch (\Exception $e) {
            return Response::error($e->getMessage(), [], 500);
        }
    }
}
