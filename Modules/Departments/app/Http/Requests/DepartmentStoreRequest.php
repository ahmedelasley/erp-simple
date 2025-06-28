<?php

namespace Modules\Core\Http\Requests;
use Modules\Core\Http\Requests\BaseStoreRequest;

class DepartmentStoreRequest extends BaseStoreRequest
{

    /**
     * Common rules for storing data.
     *
     * @return array
     */
    public function rules() :array
    {
        return [
            'name' => 'required|string|max:255|unique:departments,name',
            'description' => 'nullable|string|max:255',
            'parent_id' => 'nullable|integer|min:1|exists:departments,id',
        ];

    }
}
