<?php

namespace Modules\Attributes\Models;

use Modules\Core\Models\BaseModel;

class Attribute extends BaseModel
{
    protected $table = 'attributes';
    protected $fillable = [
        'code', 'name', 'value', 'input_type', 'is_required', 'is_filterable', 'is_variant', 'validation_rules', 'extra',
    ];

    protected $casts = [
        'value' => 'array',
        'extra' => 'array',
        'is_required' => 'boolean',
        'is_filterable' => 'boolean',
        'is_variant' => 'boolean',
    ];

    public function options()
    {
        return $this->hasMany(AttributeOption::class)->orderBy('sort_order');
    }


}
