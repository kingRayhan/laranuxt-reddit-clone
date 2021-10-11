<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Models\User;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    /**
     * Register a new user
     * @param RegisterRequest $request
     * @return array
     */
    public function register(RegisterRequest $request)
    {
        $user = User::create($request->only('username', 'email', 'password'));

        return [
            'message' => 'User registered successfully',
            'data' => $user
        ];
    }


    /**
     * Login user
     * @param LoginRequest $request
     */
    public function login(LoginRequest $request)
    {
        if (!auth()->attempt($request->only('email', 'password'))) {
            throw new AuthenticationException('Invalid credential');
        }

        return [
            'message' => 'login successful',
            'token' => auth()->user()->createToken('access-token')->plainTextToken
        ];
    }

    /**
     * Logout user
     * @return string[]
     */
    public function logout()
    {
        auth()->user()->currentAccessToken()->delete();

        return [
            'message' => 'Successfully logout'
        ];
    }


    /**
     * Update currently logged in user
     * @param UpdateProfileRequest $request
     */
    public function updateProfile(UpdateProfileRequest $request)
    {
        auth()->user()->update($request->only('username', 'email'));

        return [
          'message' => 'profile updated'
        ];
    }
}
