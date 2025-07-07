@props([
    'name',
    'label' => __('Select...'),
    'placeholder' => __('Select...'),
    'divClass' => '',  // فئة div الافتراضية لتحسين الهيكلية
    'labelClass' => '', // فئة التسمية الافتراضية لتنسيق متناسق
    'selectClass' => '', // فئة الـ select الافتراضية للاتساق
    'otherAttributes' => '',  // إعادة التسمية إلى جمع لتكون متوافقة مع الاتفاقيات
    'isLabel' => true,
    'isLivewire' => false,
    'isError' => true,
])

<div {{ $attributes->merge(['class' => 'form-group mb-3 ' . $divClass]) }}>
    @if($isLabel)
        <label for="{{ $name }}" {{ $attributes->merge(['class' => 'main-content-label tx-12 tx-medium ' . $labelClass]) }}>
            {{ __($label) }}
        </label>
    @endif

    <select name="{{ $name }}" id="{{ $name }}"
        @if($isLivewire)
            wire:model.live="{{ $name }}"
        @endif
        {{ $attributes->merge(['class' => 'form-control ' . $selectClass]) }} {{ $otherAttributes }}>
        <option value="" disabled selected hidden>{{ __($placeholder) }}</option>
        {{ $slot }}
    </select>

    @if($isError)
        @error($name)
            <small class="text-danger d-block mt-1">{{ $message }}</small>
        @enderror
    @endif
</div>


{{-- Usage Example --}}
{{--
<x-core::form.fields.select
    name="country"
    label="Label"
    placeholder="Select Label"
    :isLivewire="true"
    divClass="custom-class"
    labelClass="label-custom"
    selectClass="select-custom"
    otherAttributes="data-example='value'"
>
Slot
</x-core::form.fields.select>
--}}
