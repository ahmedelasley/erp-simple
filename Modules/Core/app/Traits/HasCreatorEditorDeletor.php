<?php

namespace Modules\Core\Traits;

use Illuminate\Database\Eloquent\Relations\MorphTo;

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

    public function deletor(): MorphTo
    {
        return $this->morphTo()->withDefault(['name' => __('Unknown')]);
    }
}
