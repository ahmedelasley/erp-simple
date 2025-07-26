<?php

namespace Modules\Categories\Services;

use Modules\Categories\Interfaces\CategoryServiceInterface;
use Modules\Categories\Interfaces\CategoryRepositoryInterface;
use Illuminate\Database\Eloquent\Builder;

class CategoryService implements CategoryServiceInterface
{
    protected CategoryRepositoryInterface $repository;

    public function __construct(CategoryRepositoryInterface $repository)
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

    public function delete($model)
    {
        return $this->repository->delete($model);
    }
}
