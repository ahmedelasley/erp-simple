<?php

namespace Modules\JournalEntries\Observers;

use Modules\Core\Observers\BaseObserver;
use Modules\JournalEntries\Services\GenerateJournalEntryNumberService;
use Modules\JournalEntries\Services\AddRoundingDifferenceService;

class JournalEntryObserver extends BaseObserver
{

    protected function onCreating($journalEntry)
    {
        if (empty($journalEntry->entry_number)) {
            $journalEntry->entry_number = app(GenerateJournalEntryNumberService::class)->generate();
        }
    }

    protected function onCreated($journalEntry)
    {
        app(AddRoundingDifferenceService::class)->handle($journalEntry);

    }

    protected function onDeleting($journalEntry)
    {
        if ($journalEntry->items()->exists()) {
            throw new \Exception(__('Cannot delete a JournalEntry with sub-JournalEntries.'));
        }
    }



}
