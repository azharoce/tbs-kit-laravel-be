<?php

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

// Route::post('register', [App\Http\Controllers\AuthController::class, 'register']);
Route::get('product', [App\Http\Controllers\ProductController::class, 'sendSlack']);

Route::get('dashboard', [App\Http\Controllers\DashboardController::class, 'dashboard']);


Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('register', [App\Http\Controllers\AuthController::class, 'register']);
    Route::post('login', [App\Http\Controllers\AuthController::class, 'login']);
    Route::post('logout', [App\Http\Controllers\AuthController::class, 'logout']);
    Route::post('refresh', [App\Http\Controllers\AuthController::class, 'refresh']);
    Route::post('me', [App\Http\Controllers\AuthController::class, 'me']);
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'role'
], function ($router) {
    Route::get('data', [App\Http\Controllers\RoleController::class, 'index']);
    Route::post('create', [App\Http\Controllers\RoleController::class, 'store']);
});

Route::any('{any}', function () {
    return response()->json([
        'status' => 'error',
        'message' => 'Resource not found'
    ], 404);
})->where('any', '.*');
