<?php

namespace Modules\Attendances\Models;

use Modules\Core\Models\BaseModel;
use Modules\Attendances\Enums\AttendanceStatus;
use Modules\Employees\Models\Employee;

class Attendance extends BaseModel
{
    protected $table = 'attendances';
    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'employee_id', 'check_in', 'check_out', 'hours_worked', 'date', 'status',
    ];

    protected $casts = [
        'check_in'      => 'datetime:Y-m-d H:i:s',
        'check_out'      => 'datetime:Y-m-d H:i:s',
        'hours_worked' => 'decimal:8,2',
        'date' => 'date',
        'status' => AttendanceStatus::class,
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
        'deleted_at' => 'datetime:Y-m-d H:i:s',

    ];

        public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
