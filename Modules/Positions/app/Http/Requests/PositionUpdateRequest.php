<?php

namespace Modules\Positions\Http\Requests;
use Illuminate\Validation\Rules\Enum;
use Modules\Positions\Enums\PositionLevel;
use Modules\Core\Http\Requests\BaseUpdateRequest;

class PositionUpdateRequest extends BaseUpdateRequest
{

    /**
     * Common rules for updating data.
     *
     * @return array
     */

    public function rules() :array
    {
        return [
            'name' => 'required|string|max:255|unique:positions,name,' . $this->id,
            'description' => 'nullable|string|max:255',
            'level' => [new Enum(PositionLevel::class)],
            'department_id' => 'required|integer|min:1|exists:departments,id',
        ];

    }
}
