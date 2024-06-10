<?php

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UploadController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('produtos', ApiController::class);
    Route::post('upload', [UploadController::class, 'upload']);
});

Route::post('/login', function (Request $request) {
    $credentials = $request->only(['email', 'password']);
    if(Auth::attempt($credentials) === false) {
        return response()->json('Unauthorized', 401);
    }

    $user = Auth::user();
    $token = $user->createToken('token');

    return response()->json($token->plainTextToken);
});

