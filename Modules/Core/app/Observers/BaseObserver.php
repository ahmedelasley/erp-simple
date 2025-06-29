<?php

namespace Modules\Core\Observers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;

abstract class BaseObserver
{
    final public function creating($model)
    {
        if (Auth::check()) {
            $model->creator_id = Auth::id();
            $model->creator_type = get_class(Auth::user());
        }

        $this->onCreating($model);
    }

    final public function updating($model)
    {
        if (Auth::check()) {
            $model->editor_id = Auth::id();
            $model->editor_type = get_class(Auth::user());
        }

        $this->onUpdating($model);
    }

    final public function deleting($model)
    {
        if (Auth::check() && $this->hasColumn($model, 'deletor_id')) {
            $model->deletor_id = Auth::id();
            $model->deletor_type = get_class(Auth::user());
            $model->saveQuietly();
        }

        $this->onDeleting($model);
    }

    /**
     * Hook methods to be optionally implemented by child observers.
     */
    protected function onCreating($model) {}
    protected function onUpdating($model) {}
    protected function onDeleting($model) {}

    protected function hasColumn($model, string $column): bool
    {
        return in_array($column, $model->getFillable()) || Schema::hasColumn($model->getTable(), $column);
    }
}
