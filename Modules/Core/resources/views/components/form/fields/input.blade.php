@props([
    'name' => 'input',
    'placeholder' => '',
    'value' => '',
    'autocomplete' => 'off',
    'class' => '',
    'type' => 'text',
])


    <input 
        type="{{ $type }}"
        name="{{ $name }}"
        id="{{ $attributes->get('id', $name) }}"
        placeholder="{{ $placeholder }}"
        value="{{ old($name, $value) }}"
        autocomplete="{{ $autocomplete }}"
        {{ $attributes->merge(['class' => 'form-control ' . $class]) }}
    />
