<?php

namespace Modules\Attendances\Enums;
use Modules\Core\Traits\HasBaseEnumFeatures;

enum AttendanceStatus : string
{
    use HasBaseEnumFeatures;

    case PRESENT = 'present';
    case ABSENT = 'absent';
    case LATE = 'late';
    case EXCUSED = 'excused';
}
