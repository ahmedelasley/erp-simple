<?php

namespace Modules\AccountingSettings\Interfaces;
use Illuminate\Database\Eloquent\Builder;


interface AccountingSettingServiceInterface
{
    public function all(array $filters = []): Builder;

    public function find($id);
    public function create(array $data);
    public function update($model, array $data);
    public function delete($model);
}
