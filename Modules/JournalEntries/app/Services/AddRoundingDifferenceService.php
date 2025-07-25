<?php

namespace Modules\JournalEntries\Services;

use Modules\JournalEntries\Models\JournalEntry;
use Modules\Settings\Facades\Setting;

class AddRoundingDifferenceService
{
    public function handle($journalEntry): void
    {
        // 1. التحقق من تفعيل فرق التقريب
        $autoAdd = accounting_setting('auto_add_rounding');
        // $autoAdd = true;

        if (! $autoAdd) {
            return;
        }

        // 2. حساب الفرق
        $items = $journalEntry->items;
        $debitTotal = $items->sum('debit');
        $creditTotal = $items->sum('credit');
        $difference = round($debitTotal - $creditTotal, 2);

        if (abs($difference) >= 0.01) {
            // 3. جلب حساب فرق التقريب
        $roundingAccountId = accounting_setting('rounding_account_id');
        // $roundingAccountId = 2;
            if (! $roundingAccountId) {
                logger()->warning('Rounding account not set in settings.');
                return;
            }

            // 4. إضافة قيد فرق تقريب
            $journalEntry->items()->create([
                'account_id' => $roundingAccountId,
                'debit'      => $difference < 0 ? abs($difference) : 0,
                'credit'     => $difference > 0 ? $difference : 0,
                'description'      => 'Automatic arithmetic rounding difference',
            ]);
        }

        // 5. إعادة حساب الإجمالي بعد الإضافة
        $freshItems = $journalEntry->items()->get();
        $newDebitTotal = $freshItems->sum('debit');
        $newCreditTotal = $freshItems->sum('credit');

        // 6. ترحيل القيد تلقائيًا إذا أصبح متوازن
        if ($newDebitTotal === $newCreditTotal && $journalEntry->status === 'draft') {
            $journalEntry->update([
                'status' => 'posted',
                'posted_at' => now(),
            ]);
        }




    }
}
