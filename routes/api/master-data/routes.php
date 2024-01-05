<?php

use App\Http\Controllers\API\MasterData\PlantCategoryController;
use Illuminate\Support\Facades\Route;

/**
 * Master Data API Routes
 * this route below is used for grouping master data API Endpoints
 */

/**
 * Master Data - Plant Category API Routes
 * prefix: api/master-data/plant-category
 */
Route::prefix('plant-category')->group(function () {
    Route::get('/', [PlantCategoryController::class, 'index'])
        // ->withoutMiddleware('auth:api')
        ->name('api.plant-category.index');

    Route::get('/{id}', [PlantCategoryController::class, 'show'])
        // ->withoutMiddleware('auth:api')
        ->name('api.plant-category.show');

    Route::put('/{id}', [PlantCategoryController::class, 'update'])
        // ->middleware('permission:api.plant-category.update')
        ->name('api.plant-category.update');

    Route::delete('/{id}', [PlantCategoryController::class, 'destroy'])
        // ->middleware('permission:api.plant-category.destroy')
        ->name('api.plant-category.destroy');

    Route::post('/', [PlantCategoryController::class, 'store'])
        // ->middleware('permission:api.plant-category.store')
        ->name('api.plant-category.store');
});
