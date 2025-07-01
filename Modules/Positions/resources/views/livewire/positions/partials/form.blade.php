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
        @include('positions::livewire.positions.partials.create')

    @elseif ($modal_id === 'show')
        @include('positions::livewire.positions.partials.show')

    @elseif ($modal_id === 'edit')
        @include('positions::livewire.positions.partials.edit')

    @elseif ($modal_id === 'delete')
        @include('positions::livewire.positions.partials.delete')

    @endif

</x-core::form.modal-form-livewire>
