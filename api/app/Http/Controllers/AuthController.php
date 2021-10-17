<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\PasswordResetRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\UpdatePasswordRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Models\User;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;

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


    /**
     * Update user password
     * @param UpdatePasswordRequest $request
     */
    public function updatePassword(UpdatePasswordRequest $request)
    {
        \auth()->user()->update([
            'password' => $request->password
        ]);
        return [
            'message' => 'password updated'
        ];
    }


    public function forgotPassword(Request $request)
    {
        $request->validate([
           'email' => ['required', 'email', 'exists:users']
        ]);

        $status = Password::sendResetLink([
            'email' => $request->email
        ]);

        if ($status !== Password::RESET_LINK_SENT){
            return \response()->json([
                'message' => 'Could not sent password reset email, please try again'
            ], Response::HTTP_FORBIDDEN);
        }

        return [
            'message' => 'Password reset link sent'
        ];
    }


    /**
     * Reset password using token
     * @param PasswordResetRequest $request
     * @return \Illuminate\Http\JsonResponse|string[]
     */
    public function resetPassword(PasswordResetRequest $request)
    {
        $status = Password::reset($request->only('email', 'token', 'password'), function ($user) use($request){
            $user->update([
                'password' => $request->password
            ]);
        } );

        if ($status !== Password::PASSWORD_RESET){
            return response()->json([
                'message' => 'Could not reset your password, please try again.'
            ], Response::HTTP_FORBIDDEN);
        }

        return [
            'message' => 'Password updated successfully'
        ];
    }
}
