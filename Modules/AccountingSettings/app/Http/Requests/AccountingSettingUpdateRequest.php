<?php

namespace Modules\AccountingSettings\Http\Requests;
use Illuminate\Validation\Rules\Enum;
use Modules\Core\Http\Requests\BaseUpdateRequest;

use Modules\AccountingSettings\Enums\AccountingSettingDataType;
use Modules\AccountingSettings\Enums\AccountingSettingType;


class AccountingSettingUpdateRequest extends BaseUpdateRequest
{

    /**
     * Common rules for updating data.
     *
     * @return array
     */

    public function rules() :array
    {

        return [

            'key' => 'required|string|max:255|unique:accounting_settings,key,' . $this->id,

            'value' => 'nullable|string|max:500',
            'default_value' => 'nullable|string|max:500',


            'description' => 'nullable|string|max:500',
            'icon' => 'nullable|string|max:500',

            'data_type' => [new Enum(AccountingSettingDataType::class)],
            'type' => [new Enum(AccountingSettingType::class)],

        ];
    }
}
