<?php

namespace Modules\ChartOfAccounts\Http\Requests;
use Illuminate\Validation\Rules\Enum;
use Modules\Core\Http\Requests\BaseStoreRequest;

use Modules\ChartOfAccounts\Enums\AccountCategory;
use Modules\ChartOfAccounts\Enums\AccountLevel;
use Modules\ChartOfAccounts\Enums\AccountStatus;



class AccountStoreRequest extends BaseStoreRequest
{

    /**
     * Common rules for storing data.
     *
     * @return array
     */
    public function rules() :array
    {
        return [
            'name' => 'required|string|max:255|unique:accounts,name',
            'description' => 'nullable|string|max:500',
            'type_id' => 'required|integer|exists:account_types,id',
            'parent_id' => 'nullable|integer|exists:accounts,id',
            'level' => [new Enum(AccountLevel::class)],
            'category' => [new Enum(AccountCategory::class)],
            'status' => [new Enum(AccountStatus::class)],
        ];

    }
}
