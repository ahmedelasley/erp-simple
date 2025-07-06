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
        @include('attendances::livewire.attendances.partials.create')

    @elseif ($modal_id === 'show')
        @include('attendances::livewire.attendances.partials.show')

    @elseif ($modal_id === 'edit')
        @include('attendances::livewire.attendances.partials.edit')

    @elseif ($modal_id === 'delete')
        @include('attendances::livewire.attendances.partials.delete')

    @endif

</x-core::form.modal-form-livewire>
