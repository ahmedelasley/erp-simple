<div class="btn-group" role="group">
    {{-- <x-core::form.fields.input id="search" wire:model.live="search" type="text" class="form-control w-100 h"  style="height:38px" placeholder="{{ __('Search') }}..." autofocus/> --}}
    <x-core::form.fields.input
        name="search"
        placeholder="{{ __('Search') }}..."
        type="text"
        :isLabel="false"
        :isLivewire="true"
        :isError="false"
        divClass="custom-class"
        inputClass=" w-100"
        otherAttributes="style='height:35px'" 
    />
    <button type="button" class="btn btn-light  btn-icon" data-placement="top" data-toggle="tooltip" title="{{ __('Clear Search') }}" wire:click="resetSearch">
        <i class='bx bx-x'></i>
    </button>
</div>