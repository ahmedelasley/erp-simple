<?php
namespace Modules\AccountingSettings\Enums;

use Modules\Core\Traits\HasBaseEnumFeatures;

enum AccountingSettingType : string
{
    use HasBaseEnumFeatures;

    case GENERAL = 'general';
    case SYSTEM = 'system';
    case USER = 'user';
    case ROLE = 'role';
    case PERMISSION = 'permission';
    case MODULE = 'module';
    case APPEARANCE = 'appearance';
    case LANGUAGE = 'language & Region';
    case NOTIFICATION = 'notification';
    case CUSTOM = 'custom';


}
