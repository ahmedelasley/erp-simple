<?php

use Illuminate\Support\Facades\Route;
use Modules\AccountingSettings\Http\Controllers\AccountingSettingsController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('accountingsettings', [AccountingSettingsController::class, 'index'])->name('accountingsettings.index');

});
