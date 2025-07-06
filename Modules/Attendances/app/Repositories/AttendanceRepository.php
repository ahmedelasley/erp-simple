<?php

namespace Modules\Attendances\Repositories;

use Modules\Attendances\Models\Attendance;
use Modules\Attendances\Interfaces\AttendanceRepositoryInterface;
use Modules\Core\Repositories\BaseRepository;

class AttendanceRepository extends BaseRepository implements AttendanceRepositoryInterface
{
    // protected $model = Attendance::class;
    public function __construct()
    {
        parent::__construct(new Attendance());
    }
}
