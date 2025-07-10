<?php
namespace Modules\ChartOfAccounts\Enums;

use Modules\Core\Traits\HasBaseEnumFeatures;

enum AccountCategory : string
{
    use HasBaseEnumFeatures;

    case CURRENT           = 'current';
    case FIXED             = 'fixed';
    case SHORT_TERM        = 'short_term';
    case LONG_TERM         = 'long_term';
    case OPERATING         = 'operating';
    case NON_OPERATING     = 'non_operating';
    case ADMINISTRATIVE    = 'administrative';
}
