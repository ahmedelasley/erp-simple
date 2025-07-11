<?php

namespace Modules\ChartOfAccounts\Models;

use Modules\Core\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\HasMany;
// use Modules\AccountTypes\Models\AccountType;
use Modules\JournalEntries\Models\JournalEntryItem;
use Modules\Vouchers\Models\VoucherItem;
use Modules\ChartOfAccounts\Enums\AccountCategory;
use Modules\ChartOfAccounts\Enums\AccountLevel;
use Modules\ChartOfAccounts\Enums\AccountStatus;
use Modules\ChartOfAccounts\Enums\AccountType;

class Account extends BaseModel
{
    protected $table = 'accounts';
    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['code', 'name', 'type', 'description', 'parent_id', 'level', 'category', 'status'];

    /**
     * The attributes that should be cast to native types.
     */
    protected $casts = [
        'type' => AccountType::class,
        'level' => AccountLevel::class,
        'category' => AccountCategory::class,
        'status' => AccountStatus::class,
    ];


    public function parent()
    {
        return $this->belongsTo(Account::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Account::class, 'parent_id');
    }

    // public function accountType()
    // {
    //     return $this->belongsTo(AccountType::class, 'type_id');
    // }

    public function journalEntryItems() :HasMany
    {
        return $this->hasMany(JournalEntryItem::class);
    }

    public function voucherItems() :HasMany
    {
        return $this->hasMany(VoucherItem::class);
    }

}
