<!-- Start Create modal -->

<form id="form">
    <x-core::form.fields.input-label-error type="text"  livewire="true" name="name" placeholder="Enter Name"  label="Name" value="{{old('name')}}" required autofocus autocomplete="name"/>
    <x-core::form.fields.input-label-error type="text"  livewire="true" name="description" placeholder="Enter Description"  label="Description" value="{{old('description')}}" required />
    <x-core::form.fields.select name="parent_id" livewire="true" label='Main Category' placeholder="Select a Category..." class="" >
        @forelse ($data as $value)
            <option value="{{ $value->id }}" wire:key="category-{{ $value->id }}" >{{ $value->name }}</option>
        @empty
            <option value="0" wire:key="category-none">None</option>
        @endforelse
    </x-core::form.fields.select>

</form>

<!-- End Create modal -->
