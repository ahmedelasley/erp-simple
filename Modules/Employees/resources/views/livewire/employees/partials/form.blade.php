<x-core::form.modal-form-livewire
    id="{{ $modal_id }}"
    title="{{ $tilteModal }}"
    subTitle="{{ $subTilteModal }}"
    value="{{ $value }}"
    classBtn="{{ $classBtn }}"
    clickBtn="{{ $clickBtn }}"
    target="{{ $target }}"
>

    @if ($modal_id === 'create')
        @include('employees::livewire.employees.partials.create')

    @elseif ($modal_id === 'show')
        @include('employees::livewire.employees.partials.show')

    @elseif ($modal_id === 'edit')
        @include('employees::livewire.employees.partials.edit')

    @elseif ($modal_id === 'delete')
        @include('employees::livewire.employees.partials.delete')

    @endif

</x-core::form.modal-form-livewire>
