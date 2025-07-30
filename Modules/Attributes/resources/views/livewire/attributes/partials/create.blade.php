<!-- Start Create modal -->

<form id="form" class="row">

    <x-core::form.fields.input
        type="text"
        name="name"
        labelText="{{ __('Name') }}"
        placeholder="{{ __('Enter Name') }}"
        :isLivewire="true"
        divClass="col-md-12"
        inputClass=""
        otherAttributes="required autofocus autocomplete='name'"
    />

@foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
{{-- <input type="text" wire:model.defer="value.{{$localeCode}}" /> --}}

    <x-core::form.fields.input
        type="text"
        name="value.{{$localeCode}}"
        livewireMulti="value.$localeCode"
        labelText="{{ __('Value') . ' [ ' . $localeCode . ' ]' }}"
        placeholder="{{ __('Enter Value')  . ' [ ' . $localeCode . ' ]' }}"
        :isLivewire="true"
        :isLivewireMulti="true"
        divClass="col-md-6"
        inputClass=""
        otherAttributes=""
    />

@endforeach

</form>

<!-- End Create modal -->
