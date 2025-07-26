<?php

namespace Modules\Categories\Models;

use Modules\Core\Models\BaseModel;

class Category extends BaseModel
{
    protected $table = 'categories';
    protected $fillable = ['name', 'description', 'parent_id'];



    public function parent()
    {
        return $this->belongsTo(self::class, 'parent_id')->withDefault(['name' => __('No Parent')]);
    }

    public function children()
    {
        return $this->hasMany(self::class, 'parent_id');
    }


}
