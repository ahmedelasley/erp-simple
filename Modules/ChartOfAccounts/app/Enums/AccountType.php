<?php

namespace Modules\ChartOfAccounts\Enums;
use Modules\Core\Traits\HasBaseEnumFeatures;

enum AccountType : string
{
    use HasBaseEnumFeatures;

    case ASSET     = 'asset';
    case LIABILITY = 'liability';
    case EQUITY    = 'equity';
    case INCOME    = 'income';
    case EXPENSE   = 'expense';
}
