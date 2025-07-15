<?php

namespace Modules\JournalEntries\Services;

use Modules\JournalEntries\Interfaces\JournalEntryServiceInterface;
use Modules\JournalEntries\Interfaces\JournalEntryRepositoryInterface;
use Illuminate\Database\Eloquent\Builder;

class JournalEntryService implements JournalEntryServiceInterface
{
    protected JournalEntryRepositoryInterface $repository;

    public function __construct(JournalEntryRepositoryInterface $repository)
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
