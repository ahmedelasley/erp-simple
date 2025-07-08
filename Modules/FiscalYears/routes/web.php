<?php

use Illuminate\Support\Facades\Route;
use Modules\FiscalYears\Http\Controllers\FiscalYearsController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('fiscalyears', FiscalYearsController::class)->names('fiscalyears');
});
