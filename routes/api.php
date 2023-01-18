<?php

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
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::prefix('clients')->group(function () {
        Route::get('/', [App\Http\Controllers\ClientsController::class, 'get']);
        Route::post('', [App\Http\Controllers\ClientsController::class, 'store']);
        Route::get('/{id}', [App\Http\Controllers\ClientsController::class, 'getById']);
        Route::put('/{id}', [App\Http\Controllers\ClientsController::class, 'updateById']);
        Route::delete('/{id}', [App\Http\Controllers\ClientsController::class, 'deleteById']);
    });

    Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
        return $request->user();
    });

});