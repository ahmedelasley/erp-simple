<?php

namespace Modules\Core\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Core\Traits\HasCreatorEditorDeletor;
use Modules\Core\Traits\ConditionalSoftDeletes;

class BaseModel extends Model
{
    use HasFactory, HasCreatorEditorDeletor, ConditionalSoftDeletes;

    protected $guarded = [];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i',
        'updated_at' => 'datetime:Y-m-d H:i',
        'deleted_at' => 'datetime:Y-m-d H:i',
    ];
}
