<?php

use Illuminate\Support\Facades\Route;
use Modules\RawMaterials\Http\Controllers\RawMaterialsController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('rawmaterials', RawMaterialsController::class)->names('rawmaterials');
});
