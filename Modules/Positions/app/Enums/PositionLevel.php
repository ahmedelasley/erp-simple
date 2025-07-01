<?php

namespace Modules\Positions\Enums;

use Modules\Core\Traits\HasBaseEnumFeatures;

enum PositionLevel: string
{
    use HasBaseEnumFeatures;

    case TRAINEE = 'trainee';
    case JUNIOR = 'junior';
    case MID = 'mid';
    case SENIOR = 'senior';
    case LEAD = 'lead';
    case MANAGER = 'manager';
}
