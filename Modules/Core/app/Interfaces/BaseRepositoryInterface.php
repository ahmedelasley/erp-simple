<?php

namespace Modules\Core\Interfaces;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

interface BaseRepositoryInterface
{
    public function all(array $filters = []): Builder;
    public function allWithTrashed(array $filters = []): Builder;
    public function paginate(array $filters = [], int $perPage = 15);
    public function find($id);
    public function create(array $data);
    public function update(Model $model, array $data): Model;
    public function delete(Model $model): void;
    public function onlyTrashed(): Builder;
    public function restore(Model $model): void;
    public function forceDelete(Model $model): void;
}