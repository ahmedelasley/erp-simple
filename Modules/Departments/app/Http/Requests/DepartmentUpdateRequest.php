<?php

namespace Modules\Departments\Http\Requests;
use Modules\Core\Http\Requests\BaseUpdateRequest;

class DepartmentUpdateRequest extends BaseUpdateRequest
{

    /**
     * Common rules for updating data.
     * 
     * @return array
     */

    public function rules() :array
    {
        return [
            'name' => 'required|string|max:255|unique:departments,name,' . $this->id,
            'description' => 'nullable|string|max:255',
            'parent_id' => 'nullable|integer|min:1|exists:departments,id',
        ];

    }
}