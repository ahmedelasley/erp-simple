<?php

namespace Modules\AccountingSettings\Services;

use Modules\AccountingSettings\Interfaces\AccountingSettingServiceInterface;
use Modules\AccountingSettings\Interfaces\AccountingSettingRepositoryInterface;
use Illuminate\Database\Eloquent\Builder;

class AccountingSettingService implements AccountingSettingServiceInterface
{
    protected AccountingSettingRepositoryInterface $repository;

    public function __construct(AccountingSettingRepositoryInterface $repository)
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
