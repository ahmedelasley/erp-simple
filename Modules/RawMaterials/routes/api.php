<?php

use Illuminate\Support\Facades\Route;
use Modules\RawMaterials\Http\Controllers\RawMaterialsController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('rawmaterials', RawMaterialsController::class)->names('rawmaterials');
});
