<?php

namespace Modules\AccountingSettings\Models;

use Modules\Core\Models\BaseModel;

use Modules\AccountingSettings\Enums\AccountingSettingDataType;
use Modules\AccountingSettings\Enums\AccountingSettingType;


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
        'data_type' => AccountingSettingDataType::class,
        'type' => AccountingSettingType::class,
    ];



}
