<?php

namespace Modules\Vouchers\Models;

use Modules\Core\Models\BaseModel;
use Modules\Vouchers\Models\VoucherItem;
use Modules\FiscalYears\Models\FiscalYear;
use Modules\Vouchers\Enums\VoucherType;
use Modules\Vouchers\Enums\VoucherStatus;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Voucher extends BaseModel
{
    protected $table = 'vouchers';
    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['voucher_number', 'type', 'date', 'amount', 'reference_number', 'description', 'status', 'fiscal_year_id'];
    /**
     * The attributes that should be cast to native types.
     */
    protected $casts = [
        'type' => VoucherType::class,
        'date' => 'date',
        'amount' => 'decimal:3',
        'status' => VoucherStatus::class,
    ];

    /**
     * Get the items associated with the journal entry.
     */
    public function items() :HasMany
    {
        return $this->hasMany(VoucherItem::class);
    }
    /**
     * Get the fiscal year associated with the journal entry.
     */
    public function fiscalYear(): BelongsTo
    {
        return $this->belongsTo(FiscalYear::class);
    }   


}
