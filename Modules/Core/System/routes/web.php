<?php

use Illuminate\Support\Facades\Route;
use Modules\\Core\\System\Http\Controllers\SystemController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('systems', SystemController::class)->names('system');
});
