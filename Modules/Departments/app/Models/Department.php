<?php

namespace Modules\Departments\Models;

use Modules\Core\Models\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Department extends BaseModel
{
    protected $table = 'departments';
    protected $fillable = ['name', 'description', 'parent_id'];


    public function parent()
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(self::class, 'parent_id');
    }

    // public function employees()
    // {
    //     return $this->hasMany(Employee::class);
    // }

    // public function positions()
    // {
    //     return $this->hasMany(Position::class);
    // }

}
