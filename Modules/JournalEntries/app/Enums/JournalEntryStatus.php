<?php

namespace Modules\JournalEntries\Enums;
use Modules\Core\Traits\HasBaseEnumFeatures;

enum JournalEntryStatus : string
{
    use HasBaseEnumFeatures;

    case DRAFT = 'draft';
    case POSTED = 'posted';
    case CANCELLED = 'cancelled';
}