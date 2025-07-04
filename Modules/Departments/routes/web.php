<?php

use Illuminate\Support\Facades\Route;
use Modules\Departments\Http\Controllers\DepartmentsController;

Route::middleware(['auth', 'verified'])->group(function () {
    // Route::resource('departments', DepartmentsController::class)->names('departments');
    Route::get('departments', [DepartmentsController::class, 'index'])->name('departments.index');

});
