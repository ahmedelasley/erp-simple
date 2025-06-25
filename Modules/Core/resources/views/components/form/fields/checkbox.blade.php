@props([
    'name',
    'label' => '',
    'checked' => false,
    'class' => '',
])

<div class="form-check mb-3">
    <input type="checkbox" id="{{ $name }}" name="{{ $name }}"
        {{ $attributes->merge(['class' => 'form-check-input ' . $class]) }}
        {{ old($name, $checked) ? 'checked' : '' }}>
    <label class="form-check-label" for="{{ $name }}">{{ $label }}</label>

    @error($name)
        <small class="text-danger d-block mt-1">{{ $message }}</small>
    @enderror
</div>

{{-- Usage example --}}
{{-- <x-form.fields.checkbox name="terms" label="Accept Terms and Conditions" checked="true" class="custom-class" /> --}}
{{-- This will render a checkbox with the specified name, label, and checked state. --}}
{{-- You can also pass additional attributes using the $attributes variable. --}}
{{-- Example: --}}
{{-- <x-form.fields.checkbox name="subscribe" label="Subscribe to Newsletter" class="form-check-input" /> --}}
{{-- This will render a checkbox for subscribing to a newsletter with the specified class. --}}
