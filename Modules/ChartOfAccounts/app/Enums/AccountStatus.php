<?php

namespace Modules\ChartOfAccounts\Enums;
use Modules\Core\Traits\HasBaseEnumFeatures;

enum AccountStatus : string
{
    use HasBaseEnumFeatures;

    case ACTIVE = 'active';
    case INACTIVE = 'inactive';
    case ARCHIVED = 'archived';
}
