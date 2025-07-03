<?php

namespace Modules\Employees\Http\Requests;
use Illuminate\Validation\Rules\Enum;
use Modules\Employees\Enums\EmployeeStatus;
use Modules\Core\Http\Requests\BaseUpdateRequest;

class EmployeeUpdateRequest extends BaseUpdateRequest
{

    /**
     * Common rules for updating data.
     *
     * @return array
     */

    public function rules() :array
    {
 
        return [
            'name' => 'required|string|max:255|unique:employees,name,' . $this->id,
            'email' => 'required|email|max:255|unique:employees,email,' . $this->id,
            'phone' => 'required|regex:/^\+?[0-9]{7,15}$/|unique:employees,phone,' . $this->id,
            'gender' => 'required|in:male,female',
            'national_id' => 'required|regex:/^[0-9]{10,}$/|unique:employees,national_id,' . $this->id,
            'position_id' => 'required|integer|min:1|exists:positions,id',
            'department_id' => 'required|integer|min:1|exists:departments,id',
            'hire_date' => 'required|date|before_or_equal:today',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
            'status' => [new Enum(EmployeeStatus::class)],

        ];
    }
}
