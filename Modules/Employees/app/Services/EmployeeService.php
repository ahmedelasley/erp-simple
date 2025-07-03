<?php

namespace Modules\Employees\Services;

use Modules\Employees\Interfaces\EmployeeServiceInterface;
use Modules\Employees\Interfaces\EmployeeRepositoryInterface;
use Illuminate\Database\Eloquent\Builder;

class EmployeeService implements EmployeeServiceInterface
{
    protected EmployeeRepositoryInterface $repository;

    public function __construct(EmployeeRepositoryInterface $repository)
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
