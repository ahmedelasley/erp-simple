<!-- Start Create Form -->

<form id="form" class="row">

    <x-core::form.fields.input
        type="text"
        name="name"
        labelText="{{ __('Name') }}"
        placeholder="{{ __('Enter Name') }}"
        :isLivewire="true"
        divClass="col-md-8"
        inputClass=""
        otherAttributes="required autofocus autocomplete='name'"
    />

    <x-core::form.fields.select
        name="type"
        labelText="Account Type"
        placeholder="Select a Type"
        :isLivewire="true"
        divClass="col-md-4"
        labelClass=""
        selectClass=""
        otherAttributes=""
    >
        @forelse (\Modules\ChartOfAccounts\Enums\AccountType::options() as $value => $label)
            <option value="{{ $value }}" wire:key="type-{{ $value }}" >{{ $label }}</option>
        @empty
            <option value="0" wire:key="type-none">None</option>
        @endforelse
    </x-core::form.fields.select>

    <x-core::form.fields.select
        name="parent_id"
        labelText="Parent Account"
        placeholder="Select a Account"
        :isLivewire="true"
        divClass="col-md-8"
        labelClass=""
        selectClass="select2 account"
        otherAttributes=""
    >
        {{-- <option value="" wire:key="type-null">No Parent (Main Account)</option> --}}

        @forelse ($data as $value)
            {{-- <option value="{{ $value->id }}" wire:key="type-{{ $value->id }}" >{{ $value->code }} - {{ $value->name }}</option> --}}
                {{-- @include('chartofaccounts::livewire.accounts.partials.option-account', ['value' => $value]) --}}
    @include('chartofaccounts::livewire.accounts.partials.option-account', ['value' => $value, 'depth' => 0])

        @empty
            <option value="0" wire:key="type-none">No Accounts Available</option>
        @endforelse
    </x-core::form.fields.select>

    <x-core::form.fields.select
        name="level"
        labelText="Account Level"
        placeholder="Select a Level"
        :isLivewire="true"
        divClass="col-md-4"
        labelClass=""
        selectClass=""
        otherAttributes=""
    >
        @forelse (\Modules\ChartOfAccounts\Enums\AccountLevel::options() as $value => $label)
            <option value="{{ $value }}" wire:key="type-{{ $value }}" >{{ $label }}</option>
        @empty
            <option value="0" wire:key="type-none">None</option>
        @endforelse
    </x-core::form.fields.select>

    <x-core::form.fields.select
        name="category"
        labelText="Account Category"
        placeholder="Select a Category"
        :isLivewire="true"
        divClass="col-md-6"
        labelClass=""
        selectClass=""
        otherAttributes=""
    >
        @forelse (\Modules\ChartOfAccounts\Enums\AccountCategory::options() as $value => $label)
            <option value="{{ $value }}" wire:key="type-{{ $value }}" >{{ $label }}</option>
        @empty
            <option value="0" wire:key="type-none">None</option>
        @endforelse
    </x-core::form.fields.select>

    <x-core::form.fields.select
        name="status"
        labelText="Account Status"
        placeholder="Select a Status"
        :isLivewire="true"
        divClass="col-md-6"
        labelClass=""
        selectClass=""
        otherAttributes=""
    >
        @forelse (\Modules\ChartOfAccounts\Enums\AccountStatus::options() as $value => $label)
            <option value="{{ $value }}" wire:key="type-{{ $value }}" >{{ $label }}</option>
        @empty
            <option value="0" wire:key="type-none">None</option>
        @endforelse
    </x-core::form.fields.select>

</form>

<!-- End Create Form -->

