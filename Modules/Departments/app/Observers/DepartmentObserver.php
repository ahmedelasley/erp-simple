<?php

namespace Modules\Departments\Observers;

use Modules\Core\Observers\BaseObserver;
use Modules\Departments\Models\Department;
use Illuminate\Support\Str;

class DepartmentObserver extends BaseObserver
{
    protected function onCreating($department)
    {
        $department->code = 'DEP-' . str_pad(Department::max('id') + 1, 3, '0', STR_PAD_LEFT);
                // توليد slug تلقائي من الاسم إن لم يكن موجودًا
        if (empty($department->slug)) {
            $department->slug = Str::slug($department->name);
        }
    }

    protected function onUpdating($department)
    {
        // $department->last_updated_at = now();
    }

    protected function onDeleting($department)
    {
        if ($department->children()->exists()) {
            throw new \Exception(__('Cannot delete a department with sub-departments.'));
        }
    }
}
