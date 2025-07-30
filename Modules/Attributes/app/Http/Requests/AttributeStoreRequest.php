<?php

namespace Modules\Attributes\Http\Requests;
use Modules\Core\Http\Requests\BaseStoreRequest;
use Illuminate\Validation\Rule;
use \Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class AttributeStoreRequest extends BaseStoreRequest
{

    /**
     * Common rules for storing data.
     *
     * @return array
     */
    public function rules() :array
    {

        $rules = [
            // 'code' => ['required', 'string', 'max:50', 'alpha_dash', 'unique:attributes,code'],

            'name' => ['required', 'string', 'unique:attributes,name'],
            'value' => ['required', 'array'],
        ];

        foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties) {
            $rules["value.$localeCode"] = ['required', 'string'];
        }

        // $rules['input_type'] = [
        //     'nullable',
        //     'string',
        //     Rule::in([
        //         'text', 'textarea', 'number', 'boolean',
        //         'select', 'multiselect', 'color',
        //         'date', 'datetime', 'file',
        //     ])
        // ];

        // $rules['is_required'] = ['required', 'boolean'];
        // $rules['is_filterable'] = ['required', 'boolean'];
        // $rules['is_variant'] = ['required', 'boolean'];
        // $rules['validation_rules'] = ['nullable', 'string', 'max:1000'];
        // $rules['extra'] = ['nullable', 'array'];

        return $rules;



    }
}
