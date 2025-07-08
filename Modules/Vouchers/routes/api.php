<?php

use Illuminate\Support\Facades\Route;
use Modules\Vouchers\Http\Controllers\VouchersController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('vouchers', VouchersController::class)->names('vouchers');
});
