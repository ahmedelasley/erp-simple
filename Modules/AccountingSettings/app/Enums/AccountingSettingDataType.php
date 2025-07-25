<?php

namespace Modules\AccountingSettings\Enums;

use Modules\Core\Traits\HasBaseEnumFeatures;

enum AccountingSettingDataType : string
{
    use HasBaseEnumFeatures;

    case FOREIGN  = 'foreign';
    case STRING  = 'string';
    case INTEGER = 'integer';
    case Decimal = 'decimal';
    case BOOLEAN = 'boolean';
    case TEXT    = 'text';
    case JSON    = 'json';
    case EMAIL   = 'email';

}
