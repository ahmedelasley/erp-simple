<?php

use Illuminate\Support\Facades\Route;
use Modules\Positions\Http\Controllers\PositionsController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('positions', [PositionsController::class, 'index'])->name('positions.index');

});

