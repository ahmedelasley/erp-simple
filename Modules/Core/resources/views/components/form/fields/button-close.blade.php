@props(['value' => null])

@php
    $value = $value ?? 'Close';
@endphp

<button class="btn ripple btn-secondary" data-dismiss="modal" type="button" wire:click="close()">{{ __($value) }}</button>
{{-- example --}}
{{-- <x-core::form.fields.button-close value="Close" /> --}}
{{-- <x-core::form.fields.button-close /> --}}
