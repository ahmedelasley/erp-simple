<?php

namespace Modules\Departments\Interfaces;


interface DepartmentServiceInterface
{
    public function all(array $filters = []): iterable;

    public function create(array $data);
    public function update($model, array $data);
    public function delete($model);
}
