<?php

use Illuminate\Support\Facades\Route;
use Modules\ChartOfAccounts\Http\Controllers\ChartOfAccountsController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('accounts', [ChartOfAccountsController::class, 'index'])->name('accounts.index');
});
