<?php

namespace Modules\Attributes\Http\Requests;
use Modules\Core\Http\Requests\BaseUpdateRequest;
use Illuminate\Validation\Rule;
use \Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class AttributeOptionUpdateRequest extends BaseUpdateRequest
{

    /**
     * Common rules for updating data.
     *
     * @return array
     */

    public function rules() :array
    {
        $rules = [
            'attribute_id' => ['required', 'exists:attributes,id'],
            'name' => ['required', 'string', 'unique:attribute_options,name,'. $this->id],
            'value' => ['required', 'array'],
        ];

        foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties) {
            $rules["value.$localeCode"] = ['required', 'string'];
        }

        $rules['sort_order'] = ['nullable', 'integer', 'min:0'];

        return $rules;

    }
}
