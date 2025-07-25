<?php

namespace Modules\Core\Traits;

use App\Services\AddRoundingDifferenceService;
use App\Models\JournalEntry;
use Illuminate\Support\Facades\Auth;

trait HandlesRoundingDifference
{

    public function handlesRoundingDifference($entry): void
    {
            $debitTotal = collect($this->items)->sum('debit');
            $creditTotal = collect($this->items)->sum('credit');

            $roundingDifference = round($debitTotal - $creditTotal, 2);

            if (abs($roundingDifference) >= 0.01) {
            $roundingAccount = (int) (accounting_setting('rounding_account_id'));
            $entry->items()->create([
                    'account_id' => $roundingAccount,
                    'debit' => $roundingDifference < 0 ? abs($roundingDifference) : 0,
                    'credit' => $roundingDifference > 0 ? $roundingDifference : 0,
                    'description' => 'Automatic arithmetic rounding difference',
                    'creator_type' => get_class(Auth::user()),
                    'creator_id' => Auth::id(),
                ]);

            }
        }

}
