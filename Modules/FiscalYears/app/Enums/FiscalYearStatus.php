<?php

namespace Modules\FiscalYears\Enums;
use Modules\Core\Traits\HasBaseEnumFeatures;

enum FiscalYearStatus : string
{
    use HasBaseEnumFeatures;

    case OPEN = 'open';
    case CLOSED = 'closed';
    case ARCHIVED = 'archived';

}
