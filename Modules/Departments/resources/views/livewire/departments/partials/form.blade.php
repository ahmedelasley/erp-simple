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
        @include('departments::livewire.departments.partials.create')

    @elseif ($modal_id === 'show')
        @include('departments::livewire.departments.partials.show')

    @elseif ($modal_id === 'edit')
        @include('departments::livewire.departments.partials.edit')

    @elseif ($modal_id === 'delete')
        @include('departments::livewire.departments.partials.delete')

    @endif

</x-core::form.modal-form-livewire>
    