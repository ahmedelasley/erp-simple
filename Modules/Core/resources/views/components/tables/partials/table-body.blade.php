@props([
    'columns' => [], // أسماء الحقول المطلوب عرضها كمصفوفة ['id', 'name', 'email']
    'data',          // كائن أو مصفوفة تحتوي على بيانات الصف
    'actions' => [], // مصفوفة الأزرار الديناميكية مثل:
                     // [['label' => 'Edit', 'event' => 'edit_user', 'icon' => 'bx bx-edit', 'params' => ['id' => $data->id]]]
])

<tr>
    @foreach ($columns as $column)
        <td>
            {{ data_get($data, $column) }}
        </td>
    @endforeach

    <td>
        <x-core::tables.partials.action-button 
            :actions="$actions"
        />
    </td>
</tr>
{{-- Example usage --}}
{{-- <x-core::tables.partials.table-body 
    :columns="['id', 'name', 'email']" 
    :data="$user" 
    :actions="[
        ['label' => __('View'), 'event' => 'viewRow', 'icon' => 'bx bx-show'],
        ['label' => __('Edit'), 'event' => 'editRow', 'icon' => 'bx bx-edit'],
        ['label' => __('Delete'), 'event' => 'deleteRow', 'icon' => 'bx bx-trash', 'confirm' => true],
    ]"
/> --}}