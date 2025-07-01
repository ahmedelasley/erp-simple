<?php

namespace Modules\Positions\Models;

use Modules\Core\Models\BaseModel;
use Modules\Departments\Models\Department; // ✅ استيراد موديل القسم الصحيح


class Position extends BaseModel
{

    /**
     * The attributes that are mass assignable.
     */
    protected $table = 'positions';
    protected $fillable = ['code', 'name', 'slug', 'description', 'level', 'department_id'];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    // public function employees()
    // {
    //     return $this->hasMany(Employee::class);
    // }

}
