@props([
    'name',
    'options' => [],
    'class' => '',
])

<div class="mb-3">
    @foreach ($options as $value => $label)
        <div class="form-check form-check-inline">
            <input
                class="form-check-input {{ $class }}"
                type="radio"
                name="{{ $name }}"
                id="{{ $name . '_' . $value }}"
                value="{{ $value }}"
                {{ old($name, $attributes->get('wire:model.live')) == $value ? 'checked' : '' }}
            >
            <label class="form-check-label" for="{{ $name . '_' . $value }}">
                {{ $label }}
            </label>
        </div>
    @endforeach

    @error($name)
        <small class="text-danger d-block mt-1">{{ $message }}</small>
    @enderror
</div>

{{-- Usage example --}}
