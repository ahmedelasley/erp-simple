<?php

namespace Modules\ChartOfAccounts\Interfaces;
use Illuminate\Database\Eloquent\Builder;


interface AccountServiceInterface
{
    public function all(array $filters = []): Builder;

    public function find($id);
    public function create(array $data);
    public function update($model, array $data);
    public function delete($model);
}
