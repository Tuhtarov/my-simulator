<?php

use App\Http\Controllers\Api\PetsController;
use App\Http\Controllers\Api\PetTypesController;
use Illuminate\Support\Facades\Route;

Route::apiResource('pets', PetsController::class);
Route::apiResource('petTypes', PetTypesController::class);

Route::prefix('pets')->group(function () {
    Route::post('/activate/{id}', [PetsController::class, 'activate'])
        ->whereNumber('id');

    Route::post('/deactivate/{id}', [PetsController::class, 'deactivate'])
        ->whereNumber('id');
});

//Route::prefix('petTypes')->group(function () {
//});
