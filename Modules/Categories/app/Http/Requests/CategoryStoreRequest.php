<?php

namespace Modules\Categories\Http\Requests;
use Modules\Core\Http\Requests\BaseStoreRequest;

class CategoryStoreRequest extends BaseStoreRequest
{

    /**
     * Common rules for storing data.
     *
     * @return array
     */
    public function rules() :array
    {
        return [
            'name' => 'required|string|max:255|unique:categories,name',
            'description' => 'nullable|string|max:255',
            'parent_id' => 'nullable|integer|min:1|exists:categories,id',
        ];

    }
}
