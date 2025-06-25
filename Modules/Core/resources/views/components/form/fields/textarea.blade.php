@props([
    'name',
    'placeholder' => '',
    'rows' => 3,
    'class' => '',
])

<div class="mb-3">
    <textarea
        name="{{ $name }}"
        id="{{ $attributes->get('id', $name) }}"
        rows="{{ $rows }}"
        placeholder="{{ $placeholder }}"
        {{ $attributes->merge(['class' => 'form-control ' . $class]) }}
    >{{ old($name, $attributes->get('value')) }}</textarea>

    @error($name)
        <small class="text-danger d-block mt-1">{{ $message }}</small>
    @enderror
</div>

{{-- Usage example --}}
{{-- <x-form.fields.textarea name="description" placeholder="Enter description here..." rows="5" class="custom-textarea" /> --}}
{{-- This will render a textarea with the specified name, placeholder, and number of rows. --}}
{{-- You can also pass additional attributes using the $attributes variable. --}}
{{-- Example: --}}
{{-- <x-form.fields.textarea name="comments" rows="4" class="form-control" /> --}}
{{-- This will render a textarea for comments with the specified class. --}}
