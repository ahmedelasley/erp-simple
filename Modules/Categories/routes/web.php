<?php

use Illuminate\Support\Facades\Route;
use Modules\Categories\Http\Controllers\CategoriesController;

Route::middleware(['auth', 'verified'])->group(function () {
    // Route::resource('categories', CategoriesController::class)->names('categories');
        Route::get('categories', [CategoriesController::class, 'index'])->name('categories.index');

});
