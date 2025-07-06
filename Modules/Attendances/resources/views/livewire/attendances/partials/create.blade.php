<!-- Start Create modal -->

<form id="form">

    <x-core::form.fields.select name="employee_id" livewire="true" label='Employee' placeholder="Select a Employee..." class="" >
        @forelse ($data as $value)
            <option value="{{ $value->id }}" wire:key="employee-{{ $value->id }}" >{{ $value->name }}</option>
        @empty
            <option value="0" wire:key="employee-none">None</option>
        @endforelse
    </x-core::form.fields.select>

    <x-core::form.fields.input-label-error type="date"  livewire="true" name="date" placeholder="Enter Date"  label="Date" value="{{old('date')}}" required />
        <x-core::form.fields.select name="status" livewire="true" label='Attendance Status' placeholder="Select a Status..." class="" >
        @forelse (\Modules\Attendances\Enums\AttendanceStatus::options() as $value => $label)
            <option value="{{ $value }}" wire:key="status-{{ $value }}" >{{ $label }}</option>
        @empty
            <option value="0" wire:key="status-none">None</option>
        @endforelse
    </x-core::form.fields.select>


    <x-core::form.fields.input-label-error type="datetime-local"  livewire="true" name="check_in" placeholder="Enter Check in"  label="Check in" value="{{old('date')}}" required />
    <x-core::form.fields.input-label-error type="datetime-local" livewire="true" name="check_out" placeholder="Enter Check out"  label="Check out" value="{{old('date')}}" required />

</form>

<!-- End Create modal -->

