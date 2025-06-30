<?php

namespace Modules\Departments\Services;

use Modules\Departments\Interfaces\DepartmentServiceInterface;
use Modules\Departments\Interfaces\DepartmentRepositoryInterface;
use Illuminate\Database\Eloquent\Builder;

class DepartmentService implements DepartmentServiceInterface
{
    protected DepartmentRepositoryInterface $repository;

    public function __construct(DepartmentRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function all(array $filters = []): Builder
    {
        return $this->repository->all($filters);
    }

    public function find($id)
    {
        return $this->repository->create($id);
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
