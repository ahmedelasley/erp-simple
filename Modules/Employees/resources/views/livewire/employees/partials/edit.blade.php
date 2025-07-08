<!-- Start Edit Form -->

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
    <x-core::form.fields.input
        type="email"
        name="email"
        labelText="{{ __('Email') }}"
        placeholder="{{ __('Enter Email') }}"
        :isLivewire="true"
        divClass="col-md-12"
        inputClass=""
        otherAttributes="required" 
    />

    <x-core::form.fields.input
        type="text"
        name="phone"
        labelText="{{ __('Phone') }}"
        placeholder="{{ __('Enter Phone') }}"
        :isLivewire="true"
        divClass="col-md-12"
        inputClass=""
        otherAttributes="required" 
    />

    <x-core::form.fields.input
        type="text"
        name="national_id"
        labelText="{{ __('National ID') }}"
        placeholder="{{ __('Enter National ID') }}"
        :isLivewire="true"
        divClass="col-md-12"
        inputClass=""
        otherAttributes="required" 
    />

    <x-core::form.fields.input
        type="date"
        name="hire_date"
        labelText="{{ __('Hire Date') }}"
        placeholder="{{ __('Enter Hire Date') }}"
        :isLivewire="true"
        divClass="col-md-12"
        inputClass=""
        otherAttributes="required" 
    />


    <x-core::form.fields.input
        type="radio"
        name="gender"
        labelText="Employee Gender"
        :options="['male' => __('Male'), 'female' => __('Female')]"
        :isLivewire="true"
        divClass="col-md-12"
        inputClass=""
        otherAttributes="required" 
    />

    <x-core::form.fields.select
        name="status"
        label="Employee Status"
        placeholder="Select a Status"
        :isLivewire="true"
        divClass="col-md-12"
        labelClass=""
        selectClass=""
        otherAttributes=""
    >
        @forelse (\Modules\Employees\Enums\EmployeeStatus::options() as $value => $label)
            <option value="{{ $value }}" wire:key="status-{{ $value }}" >{{ $label }}</option>
        @empty
            <option value="0" wire:key="status-none">None</option>
        @endforelse
    </x-core::form.fields.select>

    <x-core::form.fields.select
        name="department_id"
        label="Department"
        placeholder="Select a Department"
        :isLivewire="true"
        divClass="col-md-8"
        labelClass=""
        selectClass=""
        otherAttributes=""
    >
        @forelse ($dataDepartments as $value)
            <option value="{{ $value->id }}" wire:key="department-{{ $value->id }}" >{{ $value->name }}</option>
        @empty
            <option value="0" wire:key="department-none">None</option>
        @endforelse
    </x-core::form.fields.select>

    <x-core::form.fields.select
        name="position_id"
        label="Position"
        placeholder="Select a Position"
        :isLivewire="true"
        divClass="col-md-4"
        labelClass=""
        selectClass=""
        otherAttributes=""
    >
        @forelse ($dataPositions  as $value)
            <option value="{{ $value->id }}" wire:key="position-{{ $value->id }}" >{{ $value->name }}</option>
        @empty
            <option value="0" wire:key="position-none">None</option>
        @endforelse
    </x-core::form.fields.select>

</form>


<!-- End Edit Form -->

