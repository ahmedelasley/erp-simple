@props(['value' => null, 'classBtn' => null, 'clickBtn' => null, 'target' => null])

@php
    $value = $value ?? 'Save';
    $classBtn = $classBtn ?? 'primary';
    $clickBtn = $clickBtn ?? 'submit()';
    $target = $target ?? 'submit';
@endphp

<button class="btn ripple btn-{{ $classBtn }}" type="button" wire:loading.attr="disabled"  wire:target="{{ $target }}" wire:click="{{$clickBtn}}">
    {{ __($value) }}
    <span wire:loading wire:target="{{ $target }}" class="spinner-border spinner-border-sm text-white" role="status">
</button>

{{-- example --}}
{{-- <x-core::form.fields.button-submit value="Save" classBtn="primary" clickBtn="submit()" target="submit" /> --}}
{{-- <x-core::form.fields.button-submit value="Save" classBtn="primary" clickBtn="submit()" /> --}}
{{-- <x-core::form.fields.button-submit value="Save" classBtn="primary" /> --}}
{{-- <x-core::form.fields.button-submit value="Save" /> --}}
{{-- <x-core::form.fields.button-submit /> --}}