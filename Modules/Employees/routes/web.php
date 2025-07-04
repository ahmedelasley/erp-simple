<?php

use Illuminate\Support\Facades\Route;
use Modules\Employees\Http\Controllers\EmployeesController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('employees', [EmployeesController::class, 'index'])->name('employees.index');

});
