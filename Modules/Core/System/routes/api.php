<?php

use Illuminate\Support\Facades\Route;
use Modules\\Core\\System\Http\Controllers\SystemController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('systems', SystemController::class)->names('system');
});
