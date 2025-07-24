
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
                ];
            @endphp
            <x-core::tables.dynamic-table :columns="$columns">
            @forelse ($data as $value)
                <tr>
                    <th><b>{{ $data->firstItem()+$loop->index }}</b></th>
                    <td><b>{{ $value->key }}</b></td>
                    <td><b>{{ $value->value }}</b></td>
                    @php
                        $buttons=[
                            ['label' => __('Edit'), 'event' => 'edit_accounting_setting', 'id' => $value->id, 'icon' => 'bx bx-edit'],
                        ];

                    @endphp
                    <x-core::tables.partials.action-button
                        :actions="$buttons"
                    />
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
