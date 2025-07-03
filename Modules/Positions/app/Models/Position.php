<?php

namespace Modules\Positions\Models;

use Modules\Core\Models\BaseModel;
use Modules\Positions\Enums\PositionLevel;
use Modules\Employees\Models\Employee; // ✅ استيراد موديل القسم الصحيح
use Modules\Departments\Models\Department; // ✅ استيراد موديل القسم الصحيح


class Position extends BaseModel
{
    protected $table = 'positions';
    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['code', 'name', 'slug', 'description', 'level', 'department_id'];

    protected $casts = [
        'level' => PositionLevel::class,
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
        'deleted_at' => 'datetime:Y-m-d H:i:s',
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }

}
