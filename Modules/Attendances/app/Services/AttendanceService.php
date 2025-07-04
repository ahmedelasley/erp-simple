<?php

namespace Modules\Attendances\Services;

use Modules\Attendances\Interfaces\AttendanceServiceInterface;
use Modules\Attendances\Interfaces\AttendanceRepositoryInterface;
use Illuminate\Database\Eloquent\Builder;

class AttendanceService implements AttendanceServiceInterface
{
    protected AttendanceRepositoryInterface $repository;

    public function __construct(AttendanceRepositoryInterface $repository)
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
