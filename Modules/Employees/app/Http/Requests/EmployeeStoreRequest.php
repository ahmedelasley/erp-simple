<?php

namespace Modules\Employees\Http\Requests;
use Illuminate\Validation\Rules\Enum;
use Modules\Employees\Enums\EmployeeStatus;
use Modules\Core\Http\Requests\BaseStoreRequest;

class EmployeeStoreRequest extends BaseStoreRequest
{

    /**
     * Common rules for storing data.
     *
     * @return array
     */
    public function rules() :array
    {
        return [
            'name' => 'required|string|max:255|unique:employees,name',
            'email' => 'required|email|max:255|unique:employees,email',
            'phone' => 'required|regex:/^\+?[0-9]{7,15}$/|unique:employees,phone',
            'gender' => 'required|in:male,female',
            'national_id' => 'required|regex:/^[0-9]{10,}$/|unique:employees,national_id',
            'position_id' => 'required|integer|min:1|exists:positions,id',
            'department_id' => 'required|integer|min:1|exists:departments,id',
            'hire_date' => 'required|date|before_or_equal:today',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
            'status' => [new Enum(EmployeeStatus::class)],

        ];

    }
}
