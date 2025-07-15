<?php

namespace Modules\JournalEntries\Models;

use Modules\Core\Models\BaseModel;
use Modules\JournalEntries\Models\JournalEntryItem;
use Modules\FiscalYears\Models\FiscalYear;
use \Modules\JournalEntries\Enums\JournalEntryStatus;
use \Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class JournalEntry extends BaseModel
{
    protected $table = 'journal_entries';
    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['entry_number', 'date', 'description', 'reference_type', 'reference_id', 'status', 'fiscal_year_id', 'creator_type', 'creator_id'];

    /**
     * The attributes that should be cast to native types.
     */
    protected $casts = [
        'status' => JournalEntryStatus::class,
        'date' => 'date',
    ];

    /**
     * Get the reference model for the journal entry.
     * This allows polymorphic relations to other models.
     */
    public function reference() :MorphTo
    {
        return $this->morphTo();
    }

    /**
     * Get the items associated with the journal entry.
     */
    public function items() :HasMany
    {
        return $this->hasMany(JournalEntryItem::class);
    }
    /**
     * Get the fiscal year associated with the journal entry.
     */
    public function fiscalYear() : BelongsTo
    {
        return $this->belongsTo(FiscalYear::class);
    }


}
