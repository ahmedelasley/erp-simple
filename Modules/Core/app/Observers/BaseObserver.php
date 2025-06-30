<?php

namespace Modules\Core\Observers;

// use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;

abstract class BaseObserver
{
    final public function creating($model)
    {
        $this->setUserAttributes($model, 'creator');
        $this->onCreating($model);
    }

    final public function created($model)
    {
        $this->onCreated($model);
    }

    final public function updating($model)
    {
        $this->setUserAttributes($model, 'editor');
        $this->onUpdating($model);
    }

    final public function updated($model)
    {
        $this->onUpdated($model);
    }

    final public function deleting($model)
    {
        $this->setUserAttributes($model, 'deletor', true);
        $this->onDeleting($model);
    }

    final public function deleted($model)
    {
        $this->onDeleted($model);
    }

    final public function restoring($model)
    {
        $this->setUserAttributes($model, 'editor', true);
        $this->onRestoring($model);
    }

    final public function restored($model)
    {
        $this->onRestored($model);
    }

    final public function forceDeleting($model)
    {
        $this->setUserAttributes($model, 'deletor', true);
        $this->onForceDeleting($model);
    }

    final public function forceDeleted($model)
    {
        $this->onForceDeleted($model);
    }

    /**
     * تعيين بيانات المستخدم في الحقول إذا توفرت.
     */
    protected function setUserAttributes($model, string $type, bool $quiet = false)
    {
        if (!Auth::check()) {
            return;
        }

        $idColumn = $type . '_id';
        $typeColumn = $type . '_type';

        if ($this->hasColumn($model, $idColumn)) {
            $model->{$idColumn} = Auth::id();
        }

        if ($this->hasColumn($model, $typeColumn)) {
            $model->{$typeColumn} = get_class(Auth::user());
        }

        // عند الحذف أو الاستعادة، نحتاج حفظ التغييرات يدويًا
        if ($quiet) {
            $model->saveQuietly();
        }
    }

    /**
     * التأكد من وجود العمود في جدول الموديل.
     */
    protected function hasColumn($model, string $column): bool
    {
        return in_array($column, $model->getFillable()) || Schema::hasColumn($model->getTable(), $column);
    }

    /**
     * دوال اختيارية يمكن أن تنفذ في الـ Observer الفرعي.
     */
    protected function onCreating($model) {}
    protected function onCreated($model) {}
    protected function onUpdating($model) {}
    protected function onUpdated($model) {}
    protected function onDeleting($model) {}
    protected function onDeleted($model) {}
    protected function onRestoring($model) {}
    protected function onRestored($model) {}
    protected function onForceDeleting($model) {}
    protected function onForceDeleted($model) {}
}
