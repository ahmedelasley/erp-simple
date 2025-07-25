
<div class="col-xl-12">
    <div class="card">
        <div class="card-title d-flex justify-content-between flex-wrap">
            <div class="d-flex justify-content-start m-3">

                <x-core::form.fields.search />

                <x-core::form.fields.button-filter
                    :searchField="$searchField"
                    :items="[
                        ['label' => 'Key', 'field' => 'key'],
                    ]"
                />

                <x-core::form.fields.button-export
                    :items="[
                        ['label' => __('Export PDF'), 'event' => 'exportPDF'],
                        ['label' => __('Export Excel'), 'event' => 'exportExcel'],
                        ['label' => __('Export CSV'), 'event' => 'exportCSV'],
                        ['divider' => true],
                        ['label' => __('Export PDF to Mail'), 'event' => 'exportPDF'],
                        ['label' => __('Export Excel to Mail'), 'event' => 'exportExcel'],
                        ['label' => __('Export CSV to Mail'), 'event' => 'exportCSV'],
                    ]"
                />

                <x-core::form.fields.button-import />

            </div>

            <x-core::form.fields.paginate :paginate="$paginate" :items="[10, 25, 50, 100, 200, 500]" />

        </div>
        <div class="card-body">
            @php
                $columns=[
                    ['label' => 'ID'],
                    ['label' => 'Key'],
                    ['label' => 'Value'],
                    ['label' => 'description'],
                    ['label' => 'Default Value'],
                    ['label' => 'Type'],
                    ['label' => 'Data Type'],
                    ['label' => 'Last Updated'],
                ];
            @endphp
            <x-core::tables.dynamic-table :columns="$columns">
            @forelse ($data as $value)
                <tr>
                    <th><b>{{ $data->firstItem()+$loop->index }}</b></th>
                    <td><b>{{ $value->formatted_key  }}</b></td>
                    @if ($value->type == \Modules\AccountingSettings\Enums\AccountingSettingType::ACCOUNTS && $value->data_type == \Modules\AccountingSettings\Enums\AccountingSettingDataType::FOREIGN)
                        <td><b>{{ $value->account?->code . ' - ' . $value->account?->name }}</b></td>
                        <td><b><x-core::partials.badge :label="$value->accountDefualt?->code . ' - ' . $value->accountDefualt?->name" /></b></td>

                    @elseif ($value->type == \Modules\AccountingSettings\Enums\AccountingSettingType::FISCAL_YEARS && $value->data_type == \Modules\AccountingSettings\Enums\AccountingSettingDataType::FOREIGN)
                        <td><b>{{ $value->fiscalYear?->name }}</b></td>
                        <td><b><x-core::partials.badge :label="$value->fiscalYear?->name" /></b></td>

                    @elseif ($value->type == \Modules\AccountingSettings\Enums\AccountingSettingType::TAXES && $value->data_type == \Modules\AccountingSettings\Enums\AccountingSettingDataType::FOREIGN)

                        <td><b>{{ $value->value }}</b></td>
                        <td><b><x-core::partials.badge :label="$value->default_value" /></b></td>
                    @elseif ($value->type == \Modules\AccountingSettings\Enums\AccountingSettingType::CURRENCIES && $value->data_type == \Modules\AccountingSettings\Enums\AccountingSettingDataType::FOREIGN)

                        <td><b>{{ $value->value }}</b></td>
                        <td><b><x-core::partials.badge :label="$value->default_value" /></b></td>
                    @elseif ($value->type == \Modules\AccountingSettings\Enums\AccountingSettingType::JOURNAL_ENTRIES && $value->data_type == \Modules\AccountingSettings\Enums\AccountingSettingDataType::FOREIGN)
                        <td><b>{{ $value->value }}</b></td>
                        <td><b><x-core::partials.badge :label="$value->default_value" /></b></td>
                    @elseif ($value->type == \Modules\AccountingSettings\Enums\AccountingSettingType::VOUCHERS && $value->data_type == \Modules\AccountingSettings\Enums\AccountingSettingDataType::FOREIGN)
                        <td><b>{{ $value->value }}</b></td>
                        <td><b><x-core::partials.badge :label="$value->default_value" /></b></td>
                    @elseif ($value->type == \Modules\AccountingSettings\Enums\AccountingSettingType::COST_CENTERES && $value->data_type == \Modules\AccountingSettings\Enums\AccountingSettingDataType::FOREIGN)
                        <td><b>{{ $value->value }}</b></td>
                        <td><b><x-core::partials.badge :label="$value->default_value" /></b></td>
                    @elseif ( $value->data_type == \Modules\AccountingSettings\Enums\AccountingSettingDataType::BOOLEAN)
                        <td><b><x-core::partials.badge :label="$value->value" :color="$value->value == 'true' ? 'success' : 'danger' " /></b></td>
                        <td><b><x-core::partials.badge :label="$value->default_value" :color="$value->default_value == 'true' ? 'success' : 'danger' " /></b></td>
                    @else
                        <td><b>{{ $value->value }}</b></td>
                        <td><b><x-core::partials.badge :label="$value->default_value" /></b></td>
                    @endif

                    <td>{{ $value->description }}</td>
                    <td><b><x-core::partials.badge :label="$value->type" /></b></td>
                    <td><b><x-core::partials.badge :label="$value->data_type" /></b></td>
                    <td><b><x-core::partials.date-format :date="$value->created_at" /></b></td>

                    <td>
                        <a class="btn btn-success btn-sm" href="javascript:void(0);" wire:click.prevent="$dispatch('edit_accounting_setting', { id: {{ $value->id }} })">
                        <b><i class="bx bx-edit"></i> {{  __('Edit') }}</b>
                        </a>
                    </td>

                </tr>
            @empty
                <tr>
                    <td colspan="{{ count($columns) + 1 }}" class="text-center text-muted">{{ __('No data found.') }}</td>
                </tr>
            @endforelse
            </x-core::tables.dynamic-table>

        </div>
        <div class="card-footer">
            <div class="d-flex flex-row justify-content-end">
                <div class="pagination pagination-primary text-center">
                    {{ $data->withQueryString()->onEachSide(0)->links() }} {{-- Laravel pagination links --}}
                </div>
            </div>
        </div>
    </div>
</div>
