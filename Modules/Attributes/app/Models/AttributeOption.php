<?php

namespace Modules\Attributes\Models;

use Modules\Core\Models\BaseModel;

class AttributeOption extends BaseModel
{
    protected $table = 'attribute_options';
    protected $fillable = ['attribute_id', 'code', 'name', 'value', 'sort_order'];

    protected $casts = [
        'value' => 'array',
    ];

    public function attribute()
    {
        return $this->belongsTo(Attribute::class);
    }



}
