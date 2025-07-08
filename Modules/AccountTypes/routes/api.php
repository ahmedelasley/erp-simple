<?php

use Illuminate\Support\Facades\Route;
use Modules\AccountTypes\Http\Controllers\AccountTypesController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('accounttypes', AccountTypesController::class)->names('accounttypes');
});
