<?php

namespace Modules\Employees\Models;

use Modules\Core\Models\BaseModel;
use Modules\Positions\Models\Position;
use Modules\Attendances\Models\Attendance;
use Modules\Departments\Models\Department;
use Modules\Employees\Enums\EmployeeStatus;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Employee extends BaseModel
{

    protected $table = 'employees';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'code', 'name', 'slug', 'email', 'phone', 'gender', 'national_id',
        'position_id', 'department_id', 'hire_date', 'photo', 'status',
    ];

    protected $casts = [
        'hire_date' => 'date',
        'status' => EmployeeStatus::class,
    ];


    public function position(): BelongsTo
    {
        return $this->belongsTo(Position::class);
    }

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }

    public function attendances(): HasMany
    {
        return $this->hasMany(Attendance::class);
    }


}
