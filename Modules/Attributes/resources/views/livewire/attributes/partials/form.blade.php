<x-core::form.modal-form-livewire
    id="{{ $modal_id }}"
    title="{{ $tilteModal }}"
    subTitle="{{ $subTilteModal }}"
    value="{{ $modal_value }}"
    classBtn="{{ $classBtn }}"
    clickBtn="{{ $clickBtn }}"
    target="{{ $target }}"
>

    @if ($modal_id === 'create')
        @include('attributes::livewire.attributes.partials.create')

    @elseif ($modal_id === 'show')
        @include('attributes::livewire.attributes.partials.show')

    @elseif ($modal_id === 'edit')
        @include('attributes::livewire.attributes.partials.edit')

    @elseif ($modal_id === 'delete')
        @include('attributes::livewire.attributes.partials.delete')

    @endif

</x-core::form.modal-form-livewire>
