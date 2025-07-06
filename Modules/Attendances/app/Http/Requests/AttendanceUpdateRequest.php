<?php

namespace Modules\Attendances\Http\Requests;
use Illuminate\Validation\Rules\Enum;
use Modules\Attendances\Enums\AttendanceStatus;
use Modules\Core\Http\Requests\BaseUpdateRequest;

class AttendanceUpdateRequest extends BaseUpdateRequest
{

    /**
     * Common rules for updating data.
     *
     * @return array
     */

    public function rules() :array
    {

        return [
            'employee_id' => 'required|integer|min:1|exists:employees,id',
            'check_in'      => 'required|date|before_or_equal:check_out',
            'check_out'     => 'required|date|after_or_equal:check_in',
            // 'hours_worked'  => 'nullable|numeric|min:0|max:999999.99',
            'date'          => 'required|date|before_or_equal:today',
            'status' => [new Enum(AttendanceStatus::class)],
        ];
    }
}
