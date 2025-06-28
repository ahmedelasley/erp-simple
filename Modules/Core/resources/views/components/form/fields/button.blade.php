@props([
    'type' => 'button',       // button | submit | reset
    'color' => 'primary',      // primary | success | danger | warning | info | dark ...
    'icon' => null,            // اسم الأيقونة مثل 'bx bx-plus'
    'label' => '',             // نص الزر
    'class' => '',             // كلاس إضافي
])

<button type="{{ $type }}" {{ $attributes->merge(['class' => 'btn btn-' . $color . ' ' . $class]) }}>
    @if($icon)
        <i class="{{ $icon }}"></i>
    @endif
    {{ $label }}
</button>

{{-- <x-core::form.fields.button label="Save" color="success" icon="bx bx-save" type="submit" /> --}}
{{-- <x-core::form.fields.button label="" color="danger" class="btn-icon" icon="fa fa-upload" type="button" /> --}}

