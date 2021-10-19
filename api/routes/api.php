<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::group(['prefix' => 'auth'], function (){
    Route::get('user', [AuthController::class, 'user'])->middleware(['auth:sanctum']);
    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
    Route::put('update-profile', [AuthController::class, 'updateProfile'])->middleware('auth:sanctum');
    Route::put('update-password', [AuthController::class, 'updatePassword'])->middleware('auth:sanctum');
    Route::post('forgot-password', [AuthController::class, 'forgotPassword']);
    Route::post('reset-password', [AuthController::class, 'resetPassword']);

    Route::get('verify-email', [AuthController::class, 'verifyEmail'])
        ->middleware('signed')
        ->name('verification.verify');


    Route::post('resend-verification-email', [AuthController::class, 'resendVerificationEmail'])
        ->middleware('auth:sanctum');
});



Route::get('test', function (){
   return "Heyyy";
})->middleware('auth:sanctum', 'verified');

