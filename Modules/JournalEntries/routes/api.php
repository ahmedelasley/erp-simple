<?php

use Illuminate\Support\Facades\Route;
use Modules\JournalEntries\Http\Controllers\JournalEntriesController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('journalentries', JournalEntriesController::class)->names('journalentries');
});
