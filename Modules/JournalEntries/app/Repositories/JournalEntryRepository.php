<?php

namespace Modules\JournalEntries\Repositories;

use Modules\JournalEntries\Models\JournalEntry;
use Modules\JournalEntries\Interfaces\JournalEntryRepositoryInterface;
use Modules\Core\Repositories\BaseRepository;

class JournalEntryRepository extends BaseRepository implements JournalEntryRepositoryInterface
{
    // protected $model = JournalEntry::class;
    public function __construct()
    {
        parent::__construct(new JournalEntry());
    }
}
