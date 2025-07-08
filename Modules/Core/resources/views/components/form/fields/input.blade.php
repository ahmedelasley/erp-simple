@props([
    'type' => 'text',  // النوع الافتراضي هو نص (input) ويمكن تغييره إلى 'radio' أو 'checkbox'
    'name' => '',
    'labelText' => __('Enter...'),
    'placeholder' => '',
    'options' => [],  // خيارات الراديو (إذا كان النوع 'radio')
    'divClass' => '',  // فئة div الافتراضية لتحسين الهيكلية
    'labelClass' => '', // فئة التسمية الافتراضية لتنسيق متناسق
    'inputClass' => '', // فئة الـ input الافتراضية للاتساق
    'otherAttributes' => '',  // إعادة التسمية إلى جمع لتكون متوافقة مع الاتفاقيات
    'isMultiCheckbox' => false,
    'isLabel' => true,
    'isLivewire' => false,
    'isError' => true,
])

<div {{ $attributes->merge(['class' => 'form-group mb-3 ' . $divClass]) }}>
    @if($isLabel)
        <label for="{{ $name }}" {{ $attributes->merge(['class' => 'form-label main-content-label tx-12 tx-medium ' . $labelClass]) }}>
            {{ __($labelText) }}
        </label>
    @endif

    @if($type == 'radio')

        @foreach($options as $value => $text)
            <div class="">

                <label class=" rdiobox" for="{{ $name }}-{{ $value }}">
                    <input type="radio" name="{{ $name }}" id="{{ $name }}-{{ $value }}" value="{{ $value }}"
                        @if($isLivewire)
                            wire:model.live="{{ $name }}"
                        @endif
                        {{ $attributes->merge(['class' => ' ' . $inputClass]) }} {{ $otherAttributes }}
                    />
                    <span>{{ __($text) }}</span>
                </label>
            </div>
        @endforeach

    @elseif($isMultiCheckbox && $type == 'checkbox')

        @foreach($options as $value => $text)
            <div class="">

                <label class="ckbox" for="{{ $name }}-{{ $value }}">
                    <input type="checkbox" name="{{ $name }}" id="{{ $name }}-{{ $value }}" value="{{ $value }}"
                        @if($isLivewire)
                            wire:model.live="{{ $name }}"
                        @endif
                        {{ $attributes->merge(['class' => '' . $inputClass]) }} {{ $otherAttributes }}
                    />
                    <span>{{ __($text) }}</span>
                </label>
            </div>
        @endforeach

    @elseif($type == 'checkbox')
        <div class="">
            <label class="ckbox" >
                <input type="checkbox" name="{{ $name }}" id="{{ $name }}"
                    @if($isLivewire)
                        wire:model.live="{{ $name }}"
                    @endif
                    {{ $attributes->merge(['class' => '' . $inputClass]) }} {{ $otherAttributes }}
                >
                <span>{{ __($placeholder) }}</span>
            </label>
        </div>

    @else

        <input type="{{ $type }}" name="{{ $name }}" id="{{ $name }}"
            placeholder="{{ __($placeholder) }}"
            @if($isLivewire)
                wire:model.live="{{ $name }}"
            @endif
            {{ $attributes->merge(['class' => 'form-control ' . $inputClass]) }} {{ $otherAttributes }}
        />

    @endif

    @if($isError)
        @error($name)
            <small class="text-danger d-block mt-1">{{ $message }}</small>
        @enderror
    @endif
</div>

{{--
<x-core::form.fields.input
    name="username"
    labelText="اسم المستخدم"
    type="text"
    :isLivewire="true"
    divClass="custom-class"
    inputClass="input-custom"
    otherAttributes="data-example='value'" 
/>

<x-core::form.fields.input
    name="gender"
    labelText="الجنس"
    type="radio"
    :options="['male' => 'ذكر', 'female' => 'أنثى']"
    :isLivewire="true"
    divClass="custom-class"
    inputClass="radio-custom"
    otherAttributes="data-example='value'" 
/>

<x-core::form.fields.input
    name="accept_terms"
    labelText="أوافق على الشروط"
    type="checkbox"
    :isLivewire="true"
    divClass="custom-class"
    inputClass="checkbox-custom"
    otherAttributes="data-example='value'" 
/>
--}}