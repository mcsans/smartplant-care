<?php

use App\Http\Controllers\API\UserController;
use App\Http\Requests\EmailVerificationRequest;
use Illuminate\Support\Facades\Route;

/**
 * Master Data API Routes
 * this route below is used for grouping master data API Endpoints
 */

/**
 * Master Data - User API Routes
 * prefix: api/user
 */
Route::prefix('users')->middleware('auth:api')->group(function () {
    Route::get('/', [UserController::class, 'index'])
        ->middleware('permission:api.user.index')
        ->name('api.user.index');

    Route::get('/{id}', [UserController::class, 'show'])
        ->middleware('permission:api.user.show')
        ->name('api.user.show');

    Route::put('/{id}', [UserController::class, 'update'])
        ->middleware('permission:api.user.update')
        ->name('api.user.update');

    Route::delete('/{id}', [UserController::class, 'destroy'])
        ->middleware('permission:api.user.destroy')
        ->name('api.user.destroy');

    Route::post('/', [UserController::class, 'store'])
        ->middleware('permission:api.user.store')
        ->name('api.user.store');

    Route::get('/email/verify', function () {
        return view('auth.verify-email');
    })->withoutMiddleware('auth:api')->name('verification.notice');

    Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
        $request->fulfill();

        return response()->json('Success Verify Email Address!')->setStatusCode(200);
    })->withoutMiddleware('auth:api')->middleware(['signed'])->name('verification.verify');
});
