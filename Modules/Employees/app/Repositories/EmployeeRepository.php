<?php

namespace Modules\Employees\Repositories;

use Modules\Employees\Models\Employee;
use Modules\Employees\Interfaces\EmployeeRepositoryInterface;
use Modules\Core\Repositories\BaseRepository;

class EmployeeRepository extends BaseRepository implements EmployeeRepositoryInterface
{
    // protected $model = Employee::class;
    public function __construct()
    {
        parent::__construct(new Employee());
    }
}
