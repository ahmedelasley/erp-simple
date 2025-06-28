<?php

namespace Modules\Core\Services;

use Modules\Core\Interfaces\BaseRepositoryInterface;

abstract class BaseService
{
    protected BaseRepositoryInterface $repository;

    public function __construct(BaseRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function all(array $filters = []): Builder
    {
        return $this->repository->all($filters);
    }

    public function find($id)
    {
        return $this->repository->find($id);
    }

    public function create(array $data)
    {
        return $this->repository->create($data);
    }

    public function update($model, array $data)
    {
        return $this->repository->update($model, $data);
    }

    public function delete($model): void
    {
        $this->repository->delete($model);
    }

    public function allWithTrashed(array $filters = []): iterable
    {
        return $this->repository->allWithTrashed($filters);
    }

    public function onlyTrashed()
    {
        return $this->repository->onlyTrashed()->get();
    }

    public function restore($model): void
    {
        $this->repository->restore($model);
    }

    public function forceDelete($model): void
    {
        $this->repository->forceDelete($model);
    }
}
