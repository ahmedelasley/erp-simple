<?php
namespace Modules\AccountingSettings\Enums;

use Modules\Core\Traits\HasBaseEnumFeatures;

enum AccountingSettingType : string
{
    use HasBaseEnumFeatures;

    case CUSTOM = 'custom';
    case ACCOUNTS = 'accounts';
    case JOURNAL_ENTRIES = 'journal_entries';
    case VOUCHERS = 'vouchers';
    case CURRENCIES = 'currencies';
    case TAXES = 'taxes';
    case FISCAL_YEARS = 'fiscal_years';
    case COST_CENTERES = 'cost_centeres';


}
