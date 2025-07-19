<x-core::form.modal-form-livewire
    id="{{ $modal_id }}"
    title="{{ $tilteModal }}"
    subTitle="{{ $subTilteModal }}"
    modalClass="modal-xl modal-dialog-scrollable "
    value="{{ $value }}"
    classBtn="{{ $classBtn }}"
    clickBtn="{{ $clickBtn }}"
    target="{{ $target }}"
>

    @if ($modal_id === 'create')
        @include('journalentries::livewire.journalentries.partials.create-modal')

    @elseif ($modal_id === 'show')
        @include('journalentries::livewire.journalentries.partials.show')

    @elseif ($modal_id === 'edit')
        @include('journalentries::livewire.journalentries.partials.edit')

    @elseif ($modal_id === 'delete')
        @include('journalentries::livewire.journalentries.partials.delete')

    @endif

</x-core::form.modal-form-livewire>
