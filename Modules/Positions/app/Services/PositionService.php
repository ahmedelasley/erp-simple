<?php

namespace Modules\Positions\Services;

use Modules\Positions\Interfaces\PositionServiceInterface;
use Modules\Positions\Interfaces\PositionRepositoryInterface;
use Illuminate\Database\Eloquent\Builder;

class PositionService implements PositionServiceInterface
{
    protected PositionRepositoryInterface $repository;

    public function __construct(PositionRepositoryInterface $repository)
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
