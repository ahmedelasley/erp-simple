<?php

namespace Modules\JournalEntries\Services;

use Modules\JournalEntries\Models\JournalEntry;

class GenerateJournalEntryNumberService
{
    protected string $prefix =  accounting_setting('journal_entry_prefix');
    protected int $padLength = accounting_setting('journal_entry_code_length');

    public function generate(): string
    {
        // Get the latest journal entry number
        // $latestEntry = JournalEntry::latest('id')->first();

        // $nextNumber = 1;

        // if ($latestEntry && $latestEntry->entry_number) {
        //     // Extract numeric part and increment
        //     $numberPart = (int) filter_var($latestEntry->entry_number, FILTER_SANITIZE_NUMBER_INT);
        //     $nextNumber = $numberPart + 1;
        // }

        // return $this->prefix . str_pad($nextNumber, $this->padLength, '0', STR_PAD_LEFT);

        $lastNumber = JournalEntry::whereNotNull('entry_number')
            ->orderByDesc('id')
            ->value('entry_number');

        if ($lastNumber && preg_match('/JE-(\d+)/', $lastNumber, $matches)) {
            $nextNumber = (int) $matches[1] + 1;
        } else {
            $nextNumber = 1;
        }

        return 'JE-' . str_pad($nextNumber, 6, '0', STR_PAD_LEFT);

    }
}
