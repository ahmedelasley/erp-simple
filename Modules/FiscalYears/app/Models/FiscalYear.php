<?php

namespace Modules\FiscalYears\Models;

use Modules\Core\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Modules\JournalEntries\Models\JournalEntry;
use Modules\Vouchers\Models\Voucher;

class FiscalYear extends BaseModel
{

    protected $table = 'fiscal_years';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name', 'start_date', 'end_date'. 'status'. 'is_default'
    ];

    /**
     * The attributes that should be cast to native types.
     */
    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'is_default' => 'boolean',
    ];


    public function journalEntries() :HasMany
    {
        return $this->hasMany(JournalEntry::class);
    }

    public function vouchers() :HasMany
    {
        return $this->hasMany(Voucher::class);
    }

}
