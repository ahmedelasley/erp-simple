<?php

namespace Modules\Core\Traits;

use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Support\Facades\Schema;

trait HasCreatorEditorDeletor
{
    public function creator(): MorphTo
    {
        return $this->morphTo()->withDefault(['name' => __('Unknown')]);
    }

    public function editor(): MorphTo
    {
        return $this->morphTo()->withDefault(['name' => __('Unknown')]);
    }

    public function deletor():?MorphTo
    {
        if ($this->hasDeletorColumn()) {
            return $this->morphTo()->withDefault(['name' => __('Unknown')]);
        }
        return null;
    }


    public function hasDeletorColumn(): bool
    {
        return Schema::hasColumn($this->getTable(), 'deleted_at');
    }
}
