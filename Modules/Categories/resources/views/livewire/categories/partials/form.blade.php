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
        @include('categories::livewire.categories.partials.create')

    @elseif ($modal_id === 'show')
        @include('categories::livewire.categories.partials.show')

    @elseif ($modal_id === 'edit')
        @include('categories::livewire.categories.partials.edit')

    @elseif ($modal_id === 'delete')
        @include('categories::livewire.categories.partials.delete')

    @endif

</x-core::form.modal-form-livewire>
