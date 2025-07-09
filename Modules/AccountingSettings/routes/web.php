<?php

use Illuminate\Support\Facades\Route;
use Modules\AccountingSettings\Http\Controllers\AccountingSettingsController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('accountingsettings', AccountingSettingsController::class)->names('accountingsettings');
});
