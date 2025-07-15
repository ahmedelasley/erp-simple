<?php
namespace Modules\JournalEntries\Models;

use Modules\Core\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\JournalEntries\Models\JournalEntry;
use Modules\ChartOfAccounts\Models\Account;
use Modules\CostCenters\Models\CostCenter;

class JournalEntryItem extends BaseModel
{
    protected $table = 'journal_entry_items';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['journal_entry_id', 'account_id', 'cost_center_id', 'debit', 'credit', 'description', 'creator_type', 'creator_id'];

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
    public function journalEntry() :BelongsTo
    {
        return $this->belongsTo(JournalEntry::class);
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
    // public function costCenter() :BelongsTo
    // {
    //     return $this->belongsTo(CostCenter::class);
    // }


}
