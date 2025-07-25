<x-core::form.modal-form-livewire
    id="{{ $modal_id }}"
    title="{{ $tilteModal }}"
    subTitle="{{ $subTilteModal }}"
    modalClass=""
    value="{{ $value_modal }}"
    classBtn="{{ $classBtn }}"
    clickBtn="{{ $clickBtn }}"
    target="{{ $target }}"
>

    @if ($modal_id === 'create')
        {{-- @include('accountingsettings::livewire.accountingsettings.partials.create-modal')

    @elseif ($modal_id === 'show')
        @include('accountingsettings::livewire.accountingsettings.partials.show') --}}

    @elseif ($modal_id === 'edit')
        @include('accountingsettings::livewire.accountingsettings.partials.edit')
        {{-- @include('accountingsettings::livewire.accountingsettings.partials.edit', ['type' => $model->type, 'data_type' => $model->data_type, 'key' => 'edit-setting-' . $model->id]) --}}



    {{-- @elseif ($modal_id === 'delete')
        @include('accountingsettings::livewire.accountingsettings.partials.delete') --}}

    @endif

</x-core::form.modal-form-livewire>
