<?php

use Illuminate\Support\Facades\Route;
use Modules\Attributes\Http\Controllers\AttributesController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('attributes', AttributesController::class)->names('attributes');
});
