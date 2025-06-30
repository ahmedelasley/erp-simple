<?php

namespace Modules\Departments\Observers;

use Illuminate\Support\Str;
use Modules\Core\Observers\BaseObserver;
use Modules\Departments\Models\Department;
use Modules\Core\Services\CodeGeneratorService;
use Illuminate\Support\Facades\App;

class DepartmentObserver extends BaseObserver
{

    protected function onCreating($department)
    {
        if (empty($department->slug)) {
            $department->slug = Str::slug($department->name);
        }
    }

    protected function onCreated($department)
    {
        $department->code = App::make(CodeGeneratorService::class)
            ->generate('DEP-', Department::class);
        $department->saveQuietly();
    }

    protected function onUpdating($department)
    {

        if ($department->isDirty('name')) {
            $department->slug = Str::slug($department->name);
        }
    }
    protected function onDeleting($department)
    {
        if ($department->children()->exists()) {
            throw new \Exception(__('Cannot delete a department with sub-departments.'));
        }
    }



}
