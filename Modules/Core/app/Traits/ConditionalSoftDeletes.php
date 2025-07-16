<?php

namespace Modules\Core\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Schema;

trait ConditionalSoftDeletes
{
    public static function bootConditionalSoftDeletes(): void
    {
        if (self::hasSoftDeleteColumn()) {
            static::addGlobalScope('soft_deletes', function (Builder $builder) {
                $builder->whereNull((new static)->getTable() . '.deleted_at');
            });

            static::deleting(function (Model $model) {
                if (!$model->isForceDeleting()) {
                    $model->deleted_at = now();
                    $model->saveQuietly();
                }
            });
        }
    }

    public static function hasSoftDeleteColumn(): bool
    {
        return Schema::hasColumn((new static)->getTable(), 'deleted_at');
    }

    public function restore(): void
    {
        if (static::hasSoftDeleteColumn() && $this->deleted_at) {
            $this->deleted_at = null;
            $this->saveQuietly();
        }
    }

    public function trashed(): bool
    {
        return static::hasSoftDeleteColumn() && !is_null($this->deleted_at);
    }

    public function forceDelete(): void
    {
        $this->delete(); // You can override with actual force delete if needed
    }

    public function isForceDeleting(): bool
    {
        return false; // Optional: logic to handle force delete flag
    }
}
