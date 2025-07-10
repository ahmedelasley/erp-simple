<?php
namespace Modules\ChartOfAccounts\Enums;
use Modules\Core\Traits\HasBaseEnumFeatures;

enum AccountLevel : int
{
    use HasBaseEnumFeatures;

    case MAIN = 1;       // حساب رئيسي
    case GENERAL = 2;    // حساب عام
    case ASSISTANT = 3;  // حساب مساعد
    case SUB = 4;        // حساب فرعي
}
