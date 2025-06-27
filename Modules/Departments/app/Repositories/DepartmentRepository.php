<?php

namespace Modules\Departments\Repositories;

use Modules\Departments\Models\Department;
use Modules\Departments\Interfaces\DepartmentRepositoryInterface;
use Modules\Core\Repositories\BaseRepository;

class DepartmentRepository extends BaseRepository implements DepartmentRepositoryInterface
{
    protected $model = Department::class;
}
