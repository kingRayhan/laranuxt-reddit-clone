<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(RegisterRequest $request)
    {
        $user = User::create( $request->only('username', 'email', 'password'));

        return [
            'message' => 'User registered successfully',
            'data' => $user
        ];
    }

    public function login()
    {

    }


    public function logout()
    {

    }
}
