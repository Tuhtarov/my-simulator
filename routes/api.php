<?php

use App\Http\Controllers\Api\ImageController;
use App\Http\Controllers\Api\PetsController;
use App\Http\Controllers\Api\PetTypesController;
use Illuminate\Support\Facades\Route;

Route::prefix('image')->group(function () {
    Route::post('/upload', [ImageController::class, 'upload']);

    Route::get('/', [ImageController::class, 'index']);
});

Route::prefix('pets')->group(function () {
    Route::get('/actives', [PetsController::class, 'actives']);

    Route::post('/activate/{id}', [PetsController::class, 'activate'])
        ->whereNumber('id');

    Route::post('/deactivate/{id}', [PetsController::class, 'deactivate'])
        ->whereNumber('id');

    Route::post('/getOld/{id}', [PetsController::class, 'getOld'])
        ->whereNumber('id');
});

Route::apiResource('pets', PetsController::class);
Route::apiResource('petTypes', PetTypesController::class);
