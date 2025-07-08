<?php

use Illuminate\Support\Facades\Route;
use Modules\ChartOfAccounts\Http\Controllers\ChartOfAccountsController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('chartofaccounts', ChartOfAccountsController::class)->names('chartofaccounts');
});
