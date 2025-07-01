@props([
    'name',
    'label' => __('Select...'),
    'placeholder' => __('Select...'),
    'class' => '',
    'livewire' => false,

])

<div class="mb-3">
    <label class="main-content-label tx-12 tx-medium">{{ __($label) }}</label>

    <select name="{{ $name }}" id="{{ $name }}"
        @if($livewire)
            wire:model.live='{{ $name }}'
        @endif
        {{ $attributes->merge(['class' => 'form-control ' . $class]) }}>
        <option value="">{{ __($placeholder) }}</option>
        {{ $slot }}
    </select>

    @error($name)
        <small class="text-danger d-block mt-1">{{ $message }}</small>
    @enderror
</div>

{{-- Usage example --}}

