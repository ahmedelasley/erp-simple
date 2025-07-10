<?php

namespace Modules\ChartOfAccounts\Services;

use Modules\ChartOfAccounts\Models\Account;

class GenerateAccountCodeService
{

    public static function generate(?int $parentId = null): string
    {
        if ($parentId) {
            // 1️⃣ إذا كان الحساب تابع لحساب أب (فرعي)
            $parent = Account::findOrFail($parentId);

            $lastChild = Account::where('parent_id', $parentId)
                ->orderByDesc('code')
                ->first();

            // التالي بعد آخر ابن
            $nextNumber = $lastChild
                ? (int) substr($lastChild->code, strlen($parent->code)) + 1
                : 1;

            return $parent->code . str_pad($nextNumber, 4, '0', STR_PAD_LEFT);

        } else {
            // 2️⃣ إذا كان الحساب جذر (رئيسي)
            $lastRoot = Account::whereNull('parent_id')
                ->orderByDesc('code')
                ->first();

            $nextNumber = $lastRoot
                ? (int) $lastRoot->code + 1
                : 1;

            return $nextNumber;
            // return str_pad($nextNumber, 4, '0', STR_PAD_LEFT);
        }
    }
}