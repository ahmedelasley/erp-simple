<?php


namespace Modules\Vouchers\Models;

use Modules\Core\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\Vouchers\Models\Voucher;
use Modules\ChartOfAccounts\Models\Account;
use Modules\CostCenters\Models\CostCenter;



class VoucherItem extends BaseModel
{
    protected $table = 'voucher_items';
    
    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['voucher_id', 'account_id', 'cost_center_id', 'debit', 'credit', 'description'];

    /**
     * The attributes that should be cast to native types.
     */
    protected $casts = [
        'debit' => 'decimal:3',
        'credit' => 'decimal:3',
    ];

    /**
     * Get the journal entry that owns the item.
     */
    public function voucher() :BelongsTo
    {
        return $this->belongsTo(Voucher::class);
    }

    /**
     * Get the account associated with the journal entry item.
     */
    public function account() :BelongsTo
    {
        return $this->belongsTo(Account::class);
    }

    /**
     * Get the cost center associated with the journal entry item.
     */
    public function costCenter() :BelongsTo
    {
        return $this->belongsTo(CostCenter::class);
    }

    
}