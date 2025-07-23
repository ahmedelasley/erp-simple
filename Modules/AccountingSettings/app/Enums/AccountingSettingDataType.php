<?php

namespace Modules\AccountingSettings\Enums;

use Modules\Core\Traits\HasBaseEnumFeatures;

enum AccountingSettingDataType : string
{
    use HasBaseEnumFeatures;

    case STRING  = 'string';
    case INTEGER = 'integer';
    case BOOLEAN = 'boolean';
    case TEXT    = 'text';
    case JSON    = 'json';
    case EMAIL   = 'email';  // ← Add this


}
