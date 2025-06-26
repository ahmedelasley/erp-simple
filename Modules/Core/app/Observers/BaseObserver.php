<?php

namespace Modules\Core\Observers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

abstract class BaseObserver
{
    public function creating(Model $model)
    {
        if (Auth::check()) {
            $model->creator_id = Auth::id();
            $model->creator_type = get_class(Auth::user());
        }
    }

    public function updating(Model $model)
    {
        if (Auth::check()) {
            $model->editor_id = Auth::id();
            $model->editor_type = get_class(Auth::user());
        }
    }

    public function deleting(Model $model)
    {
        if (Auth::check() && $model->hasColumn('deletor_id')) {
            $model->deletor_id = Auth::id();
            $model->deletor_type = get_class(Auth::user());
            $model->saveQuietly(); // Save without triggering observers or events to avoid recursion issues 
        }
    }
}

// This observer automatically sets the creator, editor, and deletor IDs and types
// based on the authenticated user when creating, updating, or deleting a model.
// It assumes that the model has the necessary columns (creator_id, creator_type, editor_id, 