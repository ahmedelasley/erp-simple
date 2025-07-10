<?php

namespace Modules\ChartOfAccounts\Services;

use Modules\ChartOfAccounts\Interfaces\AccountServiceInterface;
use Modules\ChartOfAccounts\Interfaces\AccountRepositoryInterface;
use Illuminate\Database\Eloquent\Builder;

class AccountService implements AccountServiceInterface
{
    protected AccountRepositoryInterface $repository;

    public function __construct(AccountRepositoryInterface $repository)
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
