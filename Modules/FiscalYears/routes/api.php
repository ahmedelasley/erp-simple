<?php

use Illuminate\Support\Facades\Route;
use Modules\FiscalYears\Http\Controllers\FiscalYearsController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('fiscalyears', FiscalYearsController::class)->names('fiscalyears');
});
