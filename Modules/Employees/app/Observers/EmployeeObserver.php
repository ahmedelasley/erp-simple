<?php

namespace Modules\Employees\Observers;

use Illuminate\Support\Str;
use Modules\Core\Observers\BaseObserver;
use Modules\Employees\Models\Employee;
use Modules\Core\Services\CodeGeneratorService;
use Illuminate\Support\Facades\App;

class EmployeeObserver extends BaseObserver
{

    protected function onCreating($employee)
    {
        if (empty($employee->slug)) {
            $employee->slug = Str::slug($employee->name);
        }
    }

    protected function onCreated($employee)
    {
        $employee->code = App::make(CodeGeneratorService::class)
            ->generate('EMP-', Employee::class);
        $employee->saveQuietly();
    }

    protected function onUpdating($employee)
    {

        if ($employee->isDirty('name')) {
            $employee->slug = Str::slug($employee->name);
        }
    }
    protected function onDeleting($employee)
    {
        if ($employee->children()->exists()) {
            throw new \Exception(__('Cannot delete a Employee with sub-Employees.'));
        }
    }



}
