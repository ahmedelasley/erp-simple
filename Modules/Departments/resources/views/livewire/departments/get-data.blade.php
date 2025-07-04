
<div class="col-xl-12">
    <div class="card">
        <div class="card-title d-flex justify-content-between flex-wrap">
            <div class="d-flex justify-content-start m-3">

                <x-core::form.fields.search />

                <x-core::form.fields.button-filter
                    :searchField="$searchField"
                    :items="[
                        ['label' => '#', 'field' => 'id'],
                        ['label' => 'Name', 'field' => 'name'],
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
                    ['label' => 'ID', 'clickBtn' => 'sortBy' ,'sortField' => 'id', 'sortDirection' => 'desc'],
                    ['label' => 'Code', 'clickBtn' => 'sortBy' ,'sortField' => 'code', 'sortDirection' => 'desc'],
                    ['label' => 'Name', 'clickBtn' => 'sortBy' ,'sortField' => 'id', 'sortDirection' => 'desc'],
                    ['label' => 'Description'],
                    ['label' => 'Parent', 'clickBtn' => 'sortBy' ,'sortField' => 'parent_id', 'sortDirection' => 'desc'],
                    ['label' => 'No Child'],
                    ['label' => 'Created At', 'clickBtn' => '' ,'sortField' => 'created_at', 'sortDirection' => 'desc'],
                ];
            @endphp
            <x-core::tables.dynamic-table :columns="$columns">
            @forelse ($data as $value)
                <tr>
                    <th><b>{{ $data->firstItem()+$loop->index }}</b></th>
                    <td><b>{{ $value->code }}</b></td>
                    <td><b>{{ $value->name }}</b></td>
                    <td><b class="text-muted">{{ $value->description }}</b></td>
                    <td><b><x-core::partials.badge :label="$value->parent?->name" /></b></td>
                    <td><b>{{ $value->children_count }}</b></td>
                    <td><b><x-core::partials.date-format :date="$value->created_at" /></b></td>

                    <x-core::tables.partials.action-button
                        :actions="[
                            ['label' => __('Details'), 'event' => 'show_department', 'id' => $value->id, 'icon' => 'bx bx-info-circle'],
                            ['label' => __('Edit'), 'event' => 'edit_department', 'id' => $value->id, 'icon' => 'bx bx-edit'],
                            ['divider' => true],
                            ['label' => __('Delete'), 'event' => 'delete_department', 'id' => $value->id, 'icon' => 'bx bx-trash', 'class' => 'text-danger', 'confirm' => true],
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
