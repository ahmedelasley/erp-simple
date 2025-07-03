<?php

namespace Modules\Employees\Enums;
use Modules\Core\Traits\HasBaseEnumFeatures;

enum EmployeeStatus: string
{
    use HasBaseEnumFeatures;

    case ACTIVE = 'active';
    case INACTIVE = 'inactive';
    case SUSPENDED = 'suspended';
    case TERMINATED = 'terminated';
}
