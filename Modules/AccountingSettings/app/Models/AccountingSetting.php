<?php

namespace Modules\AccountingSettings\Models;

use Modules\Core\Models\BaseModel;

use Modules\FiscalYears\Models\FiscalYear;
use Modules\ChartOfAccounts\Models\Account;
use Modules\AccountingSettings\Enums\AccountingSettingType;
use Modules\AccountingSettings\Enums\AccountingSettingDataType;

class AccountingSetting extends BaseModel
{
    protected $table = 'accounting_settings';
    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['key', 'value', 'default_value', 'description', 'icon', 'data_type', 'type'];

    /**
     * The attributes that should be cast to native types.
     */
    protected $casts = [
        'value' => 'json',
        'default_value' => 'json',
        'data_type' => AccountingSettingDataType::class,
        'type' => AccountingSettingType::class,
    ];

    public function getFormattedKeyAttribute(): string
    {
        return str_replace(
            ' ',
            ' ',
            ucwords(str_replace('_', ' ', $this->key))
        );
    }

    /**
     * Get the account associated with the journal entry item.
     */
    public function account()
    {
        if ($this->type === AccountingSettingType::ACCOUNTS) {
            return $this->belongsTo(Account::class, 'value');
        }

        return null;
    }

    /**
     * Get the account associated with the journal entry item.
     */
    public function accountDefualt()
    {
        if ($this->type === AccountingSettingType::ACCOUNTS) {
            return $this->belongsTo(Account::class, 'default_value');
        }

        return null;
    }

    public function fiscalYear()
    {
        if ($this->type === AccountingSettingType::FISCAL_YEARS) {
            return $this->belongsTo(FiscalYear::class, 'value');
        }

        return null;
    }

        public function fiscalYearDefualt()
    {
        if ($this->type === AccountingSettingType::FISCAL_YEARS) {
            return $this->belongsTo(FiscalYear::class, 'default_value');
        }

        return null;

    }

}
