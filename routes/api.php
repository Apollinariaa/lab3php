<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HouseController;
use App\Http\Controllers\StreetController;

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

Route::group(['prefix' => 'v1'], function() {
    Route::get('/house', [HouseController::class, 'get']);
    Route::get('/house/{house_id}', [HouseController::class, 'get_by_id']);
    Route::delete('/house/{house_id}', [HouseController::class, 'delete']);
    Route::patch('/house', [HouseController::class, 'update']);

    Route::get('/street', [StreetController::class, 'get']);
    Route::delete('/street/{street_id}', [StreetController::class, 'delete_by_id']);
    Route::patch('/street', [StreetController::class, 'update']);
    Route::get('/street/{street_id}', [StreetController::class, 'get_by_id']);
});
