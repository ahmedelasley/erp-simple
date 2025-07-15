<?php

namespace Modules\JournalEntries\Http\Requests;
use Illuminate\Validation\Rules\Enum;

use Modules\Core\Http\Requests\BaseStoreRequest;
use \Modules\JournalEntries\Enums\JournalEntryStatus;



class JournalEntryStoreRequest extends BaseStoreRequest
{

    /**
     * Common rules for storing data.
     *
     * @return array
     */
    public function rules() :array
    {
        return [

            'date' => ['required', 'date'],
            'reference_type' => ['nullable', 'string', 'max:255'],
            'reference_id' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'status' => [new Enum(JournalEntryStatus::class)],
            'fiscal_year_id' => 'nullable|integer|exists:fiscal_years,id',

            'items' => ['required', 'array', 'min:2'],
            'items.*.account_id' => ['required', 'exists:accounts,id'],
            'items.*.debit' => ['nullable', 'numeric', 'min:0'],
            'items.*.credit' => ['nullable', 'numeric', 'min:0'],
            // 'items.*.cost_center_id' => ['nullable', 'exists:cost_centers,id'],

        ];

    }
}
