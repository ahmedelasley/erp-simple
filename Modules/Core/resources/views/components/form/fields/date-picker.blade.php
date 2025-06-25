@props([
    'name',
    'class' => '',
])

<div class="mb-3">
    <input
        type="date"
        name="{{ $name }}"
        id="{{ $attributes->get('id', $name) }}"
        {{ $attributes->merge(['class' => 'form-control ' . $class]) }}
    />

    @error($name)
        <small class="text-danger d-block mt-1">{{ $message }}</small>
    @enderror
</div>
{{-- Usage example --}}
{{-- <x-form.fields.date-picker name="event_date" class="custom-date-picker" /> --}}
{{-- This will render a date input field with the specified name and class. --}}
{{-- You can also pass additional attributes using the $attributes variable. --}}
{{-- Example: --}}
{{-- <x-form.fields.date-picker name="birth_date" class="form-control" /> --}}
{{-- This will render a date input field for birth date with the specified class. --}}
