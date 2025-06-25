@props([
    'name',
    'options' => [],
    'placeholder' => __('Select...'),
    'class' => '',
])

<div class="mb-3">
    <select name="{{ $name }}" id="{{ $name }}"
        {{ $attributes->merge(['class' => 'form-select ' . $class]) }}>
        <option value="">{{ $placeholder }}</option>
        @foreach ($options as $value => $label)
            <option value="{{ $value }}" @selected(old($name, $attributes->get('value')) == $value)>
                {{ $label }}
            </option>
        @endforeach
    </select>

    @error($name)
        <small class="text-danger d-block mt-1">{{ $message }}</small>
    @enderror
</div>

{{-- Usage example --}}
{{-- <x-form.fields.select name="country" :options="$countries" placeholder="Select Country" class="custom-select" /> --}}
{{-- This will render a select dropdown with the specified name, options, and placeholder. --}}
{{-- You can also pass additional attributes using the $attributes variable. --}}
{{-- Example: --}}
{{-- <x-form.fields.select name="category" :options="$categories" class="form-select" /> --}}
{{-- This will render a select dropdown for categories with the specified class. --}}
