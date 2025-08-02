<?php

namespace Modules\RawMaterials\Services;

use Illuminate\Database\Eloquent\Builder;
use Modules\RawMaterials\Interfaces\RawMaterialVariant\RawMaterialVariantServiceInterface;
use Modules\RawMaterials\Interfaces\RRawMaterialVariant\RawMaterialVariantRepositoryInterface;

class RawMaterialVariantService implements RawMaterialVariantServiceInterface
{
    protected RawMaterialVariantRepositoryInterface $repository;

    public function __construct(RawMaterialVariantRepositoryInterface $repository)
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
