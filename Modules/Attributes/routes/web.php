<?php

use Illuminate\Support\Facades\Route;
use Modules\Attributes\Http\Controllers\AttributeController;
use Modules\Attributes\Http\Controllers\AttributeOptionController;

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('attributes', [AttributeController::class, 'index'])->name('attributes.index');
    Route::get('attribute-options', [AttributeOptionController::class, 'index'])->name('attribute.options.index');

});
