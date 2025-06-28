<?php

namespace Modules\Core\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Core\Interfaces\BaseRepositoryInterface;

abstract class BaseRepository implements BaseRepositoryInterface
{
    protected Model $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function all(array $filters = []): Builder
    {
        return $this->applyFilters($this->model->newQuery(), $filters);
    }

    public function allWithTrashed(array $filters = []): Builder
    {
        if (!$this->supportsSoftDeletes()) {
            return $this->all($filters);
        }

        return $this->applyFilters($this->model->withTrashed(), $filters);
    }

    public function paginate(array $filters = [], int $perPage = 15)
    {
        return $this->applyFilters($this->model->newQuery(), $filters)->paginate($perPage);
    }

    public function find($id)
    {
        return $this->model->findOrFail($id);
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update(Model $model, array $data): Model
    {
        $model->update($data);
        return $model;
    }

    public function delete(Model $model): void
    {
        $this->supportsSoftDeletes() ? $model->delete() : $model->forceDelete();
    }

    public function onlyTrashed(): Builder
    {
        if (!$this->supportsSoftDeletes()) {
            abort(500, 'SoftDeletes not supported on this model.');
        }

        return $this->model->onlyTrashed();
    }

    public function restore(Model $model): void
    {
        if (!$this->supportsSoftDeletes()) {
            abort(500, 'SoftDeletes not supported on this model.');
        }

        $model->restore();
    }

    public function forceDelete(Model $model): void
    {
        $model->forceDelete();
    }

    /**
     * Check if model uses SoftDeletes trait.
     */
    protected function supportsSoftDeletes(): bool
    {
        return in_array(SoftDeletes::class, class_uses_recursive($this->model));
    }

    /**
     * Optional: Apply filters to the query.
     */
    protected function applyFilters(Builder $query, array $filters): Builder
    {
        // يمكنك توسيع هذه الدالة لاحقًا لتطبيق الفلاتر.
        return $query;
    }
}