<!-- Start Create Form -->

<form id="form"  class="row">


    <x-core::form.fields.input
        type="text"
        name="key"
        labelText="{{ __('Key') }}"
        placeholder="{{ __('Key') }}"
        :isLivewire="true"
        divClass="col-md-12"
        inputClass=""
        otherAttributes="required readonly"
    />

    @if ($type === 'accounts' && $data_type === 'foreign')
        <x-core::form.fields.select
            name="value"
            labelText="Account"
            placeholder="Select a Account"
            :isLivewire="true"
            divClass="col-md-6"
            labelClass=""
            selectClass="select2 account"
            otherAttributes=""
        >
            @forelse ($dataAccounts as $value)
                @include('accountingsettings::livewire.accountingsettings.partials.option-account', ['value' => $value, 'depth' => 0])
            @empty
                <option value="0" wire:key="type-none">No Accounts Available</option>
            @endforelse
        </x-core::form.fields.select>

        <x-core::form.fields.select
            name="default_value"
            labelText="Account"
            placeholder="Select a Account"
            :isLivewire="true"
            divClass="col-md-6"
            labelClass=""
            selectClass="select2 account"
            otherAttributes=""
        >
            @forelse ($dataAccounts as $value)
                @include('accountingsettings::livewire.accountingsettings.partials.option-account', ['value' => $value, 'depth' => 0])
            @empty
                <option value="0" wire:key="type-none">No Accounts Available</option>
            @endforelse
        </x-core::form.fields.select>
    @elseif ($type === 'journal_entries' && $data_type === 'foreign')
    @elseif ($type === 'vouchers' && $data_type === 'foreign')
    @elseif ($type === 'currencies' && $data_type === 'foreign')
    @elseif ($type === 'taxes' && $data_type === 'foreign')
    @elseif ($type === 'fiscal_years' && $data_type === 'foreign')
    @elseif ($type === 'cost_centeres' && $data_type === 'foreign')
    @elseif ($data_type === 'boolean')
        <x-core::form.fields.input
            type="radio"
            name="value"
            labelText="{{ __('value') }}"
            :options="['true' => 'Yes', 'false' => 'No']"
            :isLivewire="true"
            divClass="col-md-6"
            inputClass=""
            otherAttributes="required autofocus"
        />

        <x-core::form.fields.input
            type="radio"
            name="default_value"
            labelText="{{ __('Default value') }}"
            :options="['true' => 'Yes', 'false' => 'No']"
            :isLivewire="true"
            divClass="col-md-6"
            inputClass=""
            otherAttributes="required autofocus"
        />
    @else

    <x-core::form.fields.input
        type="text"
        name="value"
        labelText="{{ __('value') }}"
        placeholder="{{ __('value') }}"
        :isLivewire="true"
        divClass="col-md-6"
        inputClass=""
        otherAttributes="required autofocus"
    />
    <x-core::form.fields.input
        type="text"
        name="default_value"
        labelText="{{ __('Default value') }}"
        placeholder="{{ __('Default value') }}"
        :isLivewire="true"
        divClass="col-md-6"
        inputClass=""
        otherAttributes="required autofocus"
    />

    @endif

</form>

<!-- End Create Form -->

