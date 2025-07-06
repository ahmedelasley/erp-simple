<?php

namespace Modules\Attendances\Observers;

use Illuminate\Support\Str;
use Modules\Core\Observers\BaseObserver;
use Modules\Attendances\Models\Attendance;
use Modules\Core\Services\CodeGeneratorService;
use Illuminate\Support\Facades\App;

class AttendanceObserver extends BaseObserver
{

    protected function onCreating($attendance)
    {
        // if (empty($attendance->slug)) {
        //     $attendance->slug = Str::slug($attendance->name);
        // }
        if ($attendance->check_in && $attendance->check_out) {
            $hours = $attendance->check_in->diffInHours($attendance->check_out);
            $attendance->hours_worked = $hours;
        }
    }

    protected function onCreated($attendance)
    {
        // if ($attendance->check_in && $attendance->check_out) {
        //     $hours = $attendance->check_in->diffInHours($attendance->check_out);
        //     // echo "عدد الساعات: {$hours}";
        //     $hours->saveQuietly();
        // }
    }

    protected function onUpdating($attendance)
    {

        if ($attendance->check_in && $attendance->check_out) {
            $hours = $attendance->check_in->diffInHours($attendance->check_out);
            $attendance->hours_worked = $hours;
            $attendance->saveQuietly();
        }
    }
    protected function onDeleting($attendance)
    {
        // if ($attendance->children()->exists()) {
        //     throw new \Exception(__('Cannot delete a Attendance with sub-Attendances.'));
        // }
    }



}
