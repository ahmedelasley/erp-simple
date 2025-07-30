<!-- Start Edit modal -->
<form id="form" class="row">

    <x-core::form.fields.select
        name="attribute_id"
        labelText="Attribute"
        placeholder="Select a Attribute"
        :isLivewire="true"
        divClass="col-md-12"
        labelClass=""
        selectClass=""
        otherAttributes=""
    >
        @forelse ($data as $value)
            <option value="{{ $value->id }}" wire:key="attribute-{{ $value->id }}" >{{ $value->name }}</option>
        @empty
            <option value="0" wire:key="attribute-none">None</option>
        @endforelse
    </x-core::form.fields.select>

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
<!-- End Edit modal -->
