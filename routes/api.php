<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\OAuth\AuthorizationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::middleware('auth:api')->get('/user', [AuthorizationController::class, 'getUser'])->name('getUser');

Route::prefix('auth')->group(function () {
    Route::post('login', [AuthController::class, 'authentication'])->name('authentication');
    // Route::match(['GET', 'POST'], 'register', [AuthController::class, 'register'])->name('register');
    Route::get('me', [AuthController::class, 'me'])->middleware('auth:api');
    // Route::get('logout', [AuthController::class, 'logout']);
});
