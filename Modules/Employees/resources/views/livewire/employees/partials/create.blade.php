<!-- Start Create modal -->

<form id="form">
    <x-core::form.fields.input-label-error type="text"  livewire="true" name="name" placeholder="Enter Name"  label="Name" value="{{old('name')}}" required autofocus autocomplete="name"/>
    <x-core::form.fields.input-label-error type="email"  livewire="true" name="email" placeholder="Enter email"  label="email" value="{{old('email')}}" required />
    <x-core::form.fields.input-label-error type="text"  livewire="true" name="phone" placeholder="Enter phone"  label="phone" value="{{old('phone')}}" required />
    <x-core::form.fields.input-label-error type="text"  livewire="true" name="national_id" placeholder="Enter National ID"  label="National ID" value="{{old('national_id')}}" required />
    <x-core::form.fields.input-label-error type="date"  livewire="true" name="hire_date" placeholder="Enter hire_date"  label="hire_date" value="{{old('hire_date')}}" required />

    <x-core::form.fields.select name="gender" livewire="true" label='Employee Gender' placeholder="Select a Gender..." class="" >
            <option value="male" wire:key="male" >{{ __('Male') }}</option>
            <option value="female" wire:key="female">{{ __('Female') }}</option>
    </x-core::form.fields.select>


    <x-core::form.fields.select name="status" livewire="true" label='Employee Status' placeholder="Select a Status..." class="" >
        @forelse (\Modules\Employees\Enums\EmployeeStatus::options() as $value => $label)
            <option value="{{ $value }}" wire:key="status-{{ $value }}" >{{ $label }}</option>
        @empty
            <option value="0" wire:key="status-none">None</option>
        @endforelse
    </x-core::form.fields.select>

    <x-core::form.fields.select name="department_id" livewire="true" label='Department' placeholder="Select a Department..." class="" >
        @forelse ($dataDepartments as $value)
            <option value="{{ $value->id }}" wire:key="department-{{ $value->id }}" >{{ $value->name }}</option>
        @empty
            <option value="0" wire:key="department-none">None</option>
        @endforelse
    </x-core::form.fields.select>
    <x-core::form.fields.select name="position_id" livewire="true" label='Position' placeholder="Select a Position..." class="" >
        @forelse ($dataPositions as $value)
            <option value="{{ $value->id }}" wire:key="position-{{ $value->id }}" >{{ $value->name }}</option>
        @empty
            <option value="0" wire:key="position-none">None</option>
        @endforelse
    </x-core::form.fields.select>

</form>

<!-- End Create modal -->

