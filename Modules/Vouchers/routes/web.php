<?php

use Illuminate\Support\Facades\Route;
use Modules\Vouchers\Http\Controllers\VouchersController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('vouchers', VouchersController::class)->names('vouchers');
});
