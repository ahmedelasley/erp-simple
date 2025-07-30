<x-core::form.modal-form-livewire
    id="{{ $modal_id }}"
    title="{{ $tilteModal }}"
    subTitle="{{ $subTilteModal }}"
    modal_value="{{ $modal_value }}"
    classBtn="{{ $classBtn }}"
    clickBtn="{{ $clickBtn }}"
    target="{{ $target }}"
>

    @if ($modal_id === 'create')
        @include('attributes::livewire.attribute-options.partials.create')

    @elseif ($modal_id === 'show')
        @include('attributes::livewire.attribute-options.partials.show')

    @elseif ($modal_id === 'edit')
        @include('attributes::livewire.attribute-options.partials.edit')

    @elseif ($modal_id === 'delete')
        @include('attributes::livewire.attribute-options.partials.delete')

    @endif

</x-core::form.modal-form-livewire>
