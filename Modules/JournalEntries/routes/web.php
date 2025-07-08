<?php

use Illuminate\Support\Facades\Route;
use Modules\JournalEntries\Http\Controllers\JournalEntriesController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('journalentries', JournalEntriesController::class)->names('journalentries');
});
