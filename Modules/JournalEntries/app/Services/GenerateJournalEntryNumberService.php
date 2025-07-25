<?php

namespace Modules\JournalEntries\Services;

use Modules\JournalEntries\Models\JournalEntry;
use Modules\FiscalYears\Models\FiscalYear;
use Illuminate\Validation\ValidationException;

class GenerateJournalEntryNumberService
{
    protected string $prefix;
    protected int $padLength;
    protected int $fiscalYearId;
    protected ?string $fiscalYearCode;

    public function __construct()
    {
        $this->prefix = (string)(accounting_setting('journal_entry_prefix') ?? 'JE');
        $this->padLength = (int)(accounting_setting('journal_entry_code_length') ?? 6);

        // ✅ استدعاء السنة المالية من الإعدادات
        $fiscalYearId =  (int) (accounting_setting('default_fiscal_year_id') ?? 15);



        if (!$fiscalYearId) {
            throw ValidationException::withMessages([
                'fiscal_year_id' => 'لم يتم تحديد السنة المالية الافتراضية من الإعدادات.',
            ]);
        }
        // dd( $fiscalYearId);

        $fiscalYear = FiscalYear::where('id', $fiscalYearId)->first();


        if (!$fiscalYear) {
            throw ValidationException::withMessages([
                'fiscal_year' => 'السنة المالية المحددة غير موجودة.',
            ]);
        }

        if ($fiscalYear->is_closed) {
            throw ValidationException::withMessages([
                'fiscal_year' => 'السنة المالية مغلقة، لا يمكن إنشاء قيد جديد فيها.',
            ]);
        }

        // ✅ استخدم السنة المالية كرمز داخل رقم القيد (مثال: 2025)
        $this->fiscalYearCode = $fiscalYear->year ?? date('Y');
    }

    public function generate(): string
    {
        $basePattern = "{$this->prefix}-{$this->fiscalYearCode}-";

        // ✅ استخراج آخر رقم تسلسلي لنفس السنة المالية
        $lastNumber = JournalEntry::whereNotNull('entry_number')
            ->where('entry_number', 'like', $basePattern . '%')
            ->orderByDesc('id')
            ->value('entry_number');

        if ($lastNumber && preg_match('/' . preg_quote($basePattern) . '(\d+)/', $lastNumber, $matches)) {
            $nextNumber = (int)$matches[1] + 1;
        } else {
            $nextNumber = 1;
        }

        return $basePattern . str_pad($nextNumber, $this->padLength, '0', STR_PAD_LEFT);
    }
}
