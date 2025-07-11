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
    case DETAIL = 5;     // حساب تفصيلي
    // Additional levels can be added as needed
    case DETAIL6 = 6;     // حساب تفصيلي إضافي (مثال)
    case DETAIL7 = 7;     // حساب تفصيلي إضافي (مثال)
    case DETAIL8 = 8;     // حساب تفصيلي إضافي (مثال)
    case DETAIL9 = 9;     // حساب تفصيلي إضافي (مثال
    case DETAIL10 = 10;     // حساب تفصيلي إضافي (مثال
    // Add more levels as needed

}
