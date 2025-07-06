
<div class="col-xl-12">
    <div class="card">
        <div class="card-title d-flex justify-content-between flex-wrap">
            <div class="d-flex justify-content-start m-3">

                <x-core::form.fields.search />

                <x-core::form.fields.button-filter
                    :searchField="$searchField"
                    :items="[
                        ['label' => '#', 'field' => 'id'],
                        // ['label' => 'Code', 'field' => 'code'],
                        // ['label' => 'Name', 'field' => 'name'],
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

            <x-core::form.fields.paginate :paginate="$paginate" :items="[100, 250, 500, 1000, 5000, 10000]" />

        </div>
        <div class="card-body">
            @php
                $columns=[
                    ['label' => '#', 'clickBtn' => 'sortBy' ,'sortField' => 'id', 'sortDirection' => 'desc'],
                    ['label' => 'Date', 'clickBtn' => 'sortBy' ,'sortField' => 'date', 'sortDirection' => 'desc'],
                    ['label' => 'Employee', 'clickBtn' => 'sortBy' ,'sortField' => 'employee_id', 'sortDirection' => 'desc'],
                    ['label' => 'check In', 'clickBtn' => 'sortBy' ,'sortField' => 'check_in', 'sortDirection' => 'desc'],
                    ['label' => 'check Out', 'clickBtn' => 'sortBy' ,'sortField' => 'check_out', 'sortDirection' => 'desc'],
                    ['label' => 'Duration', 'clickBtn' => 'sortBy' ,'sortField' => 'hours_worked', 'sortDirection' => 'desc'],
                    ['label' => 'Status', 'clickBtn' => 'sortBy' ,'sortField' => 'status', 'sortDirection' => 'desc'],
                    ['label' => 'Created At', 'clickBtn' => '' ,'sortField' => 'created_at', 'sortDirection' => 'desc'],
                ];
            @endphp
            <x-core::tables.dynamic-table :columns="$columns">
            @forelse ($data as $value)
                <tr>
                    <th><b>{{ $data->firstItem()+$loop->index }}</b></th>
                    <td><b>{{ $value->date->format('l Y-m-d') }}</b></td>
                    <td><b>{{ $value->employee->name }}</b></td>
                    <td><b>{{ $value->check_in }}</b></td>
                    <td><b>{{ $value->check_out }}</b></td>
                    <td><b>{{ $value->hours_worked }}</b></td>

                    <td><b><x-core::partials.badge :label="$value->status" /></b></td>
                    <td><b><x-core::partials.date-format :date="$value->created_at" /></b></td>

                    <x-core::tables.partials.action-button
                        :actions="[
                            ['label' => __('Details'), 'event' => 'show_attendance', 'id' => $value->id, 'icon' => 'bx bx-info-circle'],
                            ['label' => __('Edit'), 'event' => 'edit_attendance', 'id' => $value->id, 'icon' => 'bx bx-edit'],
                            ['divider' => true],
                            ['label' => __('Delete'), 'event' => 'delete_attendance', 'id' => $value->id, 'icon' => 'bx bx-trash', 'class' => 'text-danger', 'confirm' => true],
                        ]"
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
