<?php

namespace Modules\Vouchers\Enums;
use Modules\Core\Traits\HasBaseEnumFeatures;

enum VoucherType : string
{
    use HasBaseEnumFeatures;

    case RECEIPT = 'receipt';
    case PAYMENT = 'payment';
    case CONTRA = 'contra';
    case JOURNAL = 'journal';
}