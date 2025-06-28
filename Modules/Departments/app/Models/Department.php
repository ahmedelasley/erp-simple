<?php

namespace Modules\Departments\Models;

use Modules\Core\Models\BaseModel;

class Department extends BaseModel
{
    protected $table = 'departments';
    protected $fillable = ['name', 'description', 'parent_id'];


    public function parent()
    {
        return $this->belongsTo(self::class, 'parent_id')->withDefault(['name' => __('No Parent')]);
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
