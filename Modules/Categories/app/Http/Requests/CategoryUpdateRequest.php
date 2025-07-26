<?php

namespace Modules\Categories\Http\Requests;
use Modules\Core\Http\Requests\BaseUpdateRequest;

class CategoryUpdateRequest extends BaseUpdateRequest
{

    /**
     * Common rules for updating data.
     *
     * @return array
     */

    public function rules() :array
    {
        return [
            'name' => 'required|string|max:255|unique:categories,name,' . $this->id,
            'description' => 'nullable|string|max:255',
            'parent_id' => 'nullable|integer|min:1|exists:categories,id',
        ];

    }
}
