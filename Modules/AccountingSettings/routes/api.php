<?php

use Illuminate\Support\Facades\Route;
use Modules\AccountingSettings\Http\Controllers\AccountingSettingsController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('accountingsettings', AccountingSettingsController::class)->names('accountingsettings');
});
