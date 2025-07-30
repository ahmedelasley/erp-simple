<?php

namespace Modules\Attributes\Services;

use Modules\Attributes\Interfaces\AttributeServiceInterface;
use Modules\Attributes\Interfaces\AttributeRepositoryInterface;
use Illuminate\Database\Eloquent\Builder;

class AttributeService implements AttributeServiceInterface
{
    protected AttributeRepositoryInterface $repository;

    public function __construct(AttributeRepositoryInterface $repository)
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
