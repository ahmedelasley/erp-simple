<!-- Start Create modal -->

<form id="form">
    <x-core::form.fields.input-label-error type="text"  livewire="true" name="name" placeholder="Enter Name"  label="Name" value="{{old('name')}}" required autofocus autocomplete="name"/>
    <x-core::form.fields.input-label-error type="text"  livewire="true" name="description" placeholder="Enter Description"  label="Description" value="{{old('description')}}" required />
    <x-core::form.fields.select name="level" livewire="true" label='Position Level' placeholder="Select a Level..." class="" >
        @forelse (\Modules\Positions\Enums\PositionLevel::options() as $value => $label)
            <option value="{{ $value }}" wire:key="department-{{ $value }}" >{{ $label }}</option>
        @empty
            <option value="0" wire:key="department-none">None</option>
        @endforelse
    </x-core::form.fields.select>

    <x-core::form.fields.select name="department_id" livewire="true" label='Department' placeholder="Select a Department..." class="" >
        @forelse ($data as $value)
            <option value="{{ $value->id }}" wire:key="department-{{ $value->id }}" >{{ $value->name }}</option>
        @empty
            <option value="0" wire:key="department-none">None</option>
        @endforelse
    </x-core::form.fields.select>

</form>

<!-- End Create modal -->

