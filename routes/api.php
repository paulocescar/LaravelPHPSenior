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

Route::get('/clients', [App\Http\Controllers\ClientsController::class, 'get']);
Route::get('/clients/{id}', [App\Http\Controllers\ClientsController::class, 'getById']);
Route::post('/clients', [App\Http\Controllers\ClientsController::class, 'store']);
Route::put('/clients/{id}', [App\Http\Controllers\ClientsController::class, 'updateById']);
Route::delete('/clients/{id}', [App\Http\Controllers\ClientsController::class, 'deleteById']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
