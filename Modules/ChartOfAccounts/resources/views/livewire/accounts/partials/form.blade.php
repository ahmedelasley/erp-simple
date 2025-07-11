<x-core::form.modal-form-livewire
    id="{{ $modal_id }}"
    title="{{ $tilteModal }}"
    subTitle="{{ $subTilteModal }}"
    modalClass="modal-lg"
    value="{{ $value }}"
    classBtn="{{ $classBtn }}"
    clickBtn="{{ $clickBtn }}"
    target="{{ $target }}"
>

    @if ($modal_id === 'create')
        @include('chartofaccounts::livewire.accounts.partials.create')

    {{-- @elseif ($modal_id === 'show')
        @include('chartofaccounts::livewire.accounts.partials.show')

    @elseif ($modal_id === 'edit')
        @include('chartofaccounts::livewire.accounts.partials.edit')

    @elseif ($modal_id === 'delete')
        @include('chartofaccounts::livewire.accounts.partials.delete') --}}

    @endif

</x-core::form.modal-form-livewire>
