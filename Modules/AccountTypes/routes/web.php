<?php

use Illuminate\Support\Facades\Route;
use Modules\AccountTypes\Http\Controllers\AccountTypesController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('accounttypes', AccountTypesController::class)->names('accounttypes');
});
