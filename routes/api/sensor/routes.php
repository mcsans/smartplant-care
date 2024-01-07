<?php

use App\Http\Controllers\API\SensorController;
use Illuminate\Support\Facades\Route;

/**
 * Master Data API Routes
 * this route below is used for grouping master data API Endpoints
 */

/**
 * Master Data - Sensor API Routes
 * prefix: api/sensor
 */
Route::prefix('sensor')->middleware('auth:api')->group(function () {
    Route::get('/', [SensorController::class, 'index'])
        ->withoutMiddleware('auth:api')
        ->name('api.sensor.index');

    Route::get('/{id}', [SensorController::class, 'show'])
        ->withoutMiddleware('auth:api')
        ->name('api.sensor.show');

    Route::put('/update-batch', [SensorController::class, 'updateBatch'])
        ->middleware('permission:api.sensor.update.batch')
        ->name('api.sensor.update.batch');

    Route::put('/{id}', [SensorController::class, 'update'])
        ->middleware('permission:api.sensor.update')
        ->name('api.sensor.update');

    Route::delete('/{id}', [SensorController::class, 'destroy'])
        ->middleware('permission:api.sensor.destroy')
        ->name('api.sensor.destroy');

    Route::post('/', [SensorController::class, 'store'])
        ->middleware('permission:api.sensor.store')
        ->name('api.sensor.store');
});
