<?php

namespace Modules\Vouchers\Enums;
use Modules\Core\Traits\HasBaseEnumFeatures;

enum VoucherStatus : string
{
    use HasBaseEnumFeatures;

    case DRAFT = 'draft';
    case POSTED = 'posted';
    case CANCELLED = 'cancelled';
}