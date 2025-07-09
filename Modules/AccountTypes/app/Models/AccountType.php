<?php

namespace Modules\AccountTypes\Models;

use Modules\Core\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Modules\ChartOfAccounts\Models\Account;


class AccountType extends BaseModel
{

    protected $table = 'account_types';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name', 'category', 'description'
    ];

    public function accounts(): HasMany
    {
        return $this->hasMany(Account::class);
    }


}
