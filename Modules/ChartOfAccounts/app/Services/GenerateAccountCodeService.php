<?php

namespace Modules\ChartOfAccounts\Services;

use Modules\ChartOfAccounts\Models\Account;

class GenerateAccountCodeService
{
     /**
     * Define number of digits per level
     * You can customize these dynamically (e.g., from settings)
     */
    protected static array $levelLengths = [
        1 => 0, // Root
        2 => 1, // Level 1 children
        3 => 2, // Level 2 children
        4 => 3, // etc...
    ];

    public static function generate(?int $parentId = null): string
    {
        if ($parentId) {
            $parent = Account::findOrFail($parentId);

            $parentCode = $parent->code;
            // $parentLevel = $parent->level ?? 1; // Assume default level 1 if missing
            // $currentLevel = $parentLevel + 1;
            $parentLevel = $parent->level instanceof \BackedEnum
                ? $parent->level->value
                : (int) $parent->level;

            $currentLevel = $parentLevel + 1;

            $segmentLength = static::$levelLengths[$currentLevel] ?? 2; // default fallback

            $lastChild = Account::where('parent_id', $parentId)
                ->orderByDesc('code')
                ->first();

            $nextSegment = $lastChild
                ? (int) substr($lastChild->code, strlen($parentCode)) + 1
                : 1;

            $nextSegmentPadded = str_pad($nextSegment, $segmentLength, '0', STR_PAD_LEFT);

            return $parentCode . $nextSegmentPadded;
        } else {
            $segmentLength = static::$levelLengths[1] ?? 4;

            $lastRoot = Account::whereNull('parent_id')
                ->orderByDesc('code')
                ->first();

            $nextRoot = $lastRoot ? ((int) $lastRoot->code) + 1 : 1;

            // return str_pad($nextRoot, $segmentLength, '0', STR_PAD_LEFT);
                        return $nextRoot;
            // return str_pad($nextNumber, 4, '0', STR_PAD_LEFT);


        }
    }



    // public static function generate(?int $parentId = null): string
    // {
    //     if ($parentId) {
    //         // 1️⃣ إذا كان الحساب تابع لحساب أب (فرعي)
    //         $parent = Account::findOrFail($parentId);

    //         $lastChild = Account::where('parent_id', $parentId)
    //             ->orderByDesc('code')
    //             ->first();

    //         // التالي بعد آخر ابن
    //         $nextNumber = $lastChild
    //             ? (int) substr($lastChild->code, strlen($parent->code)) + 1
    //             : 1;

    //         return $parent->code . str_pad($nextNumber, 4, '0', STR_PAD_LEFT);

    //     } else {
    //         // 2️⃣ إذا كان الحساب جذر (رئيسي)
    //         $lastRoot = Account::whereNull('parent_id')
    //             ->orderByDesc('code')
    //             ->first();

    //         $nextNumber = $lastRoot
    //             ? (int) $lastRoot->code + 1
    //             : 1;

    //         return $nextNumber;
    //         // return str_pad($nextNumber, 4, '0', STR_PAD_LEFT);
    //     }
    // }
}
