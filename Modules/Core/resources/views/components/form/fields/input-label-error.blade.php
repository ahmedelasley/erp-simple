@props([
    'name' => 'input',
    'placeholder' => '',
    'value' => '',
    'autocomplete' => 'off',
    'class' => '',
    'type' => 'text',
    'label' => '',
])


<div class="mb-3">
  <label for="{{ $attributes->get('id', $name) }}" {{ $attributes->merge(['class' => 'form-label ' . $class]) }}>
      {{ $label ? $label : ucfirst($name) }}
  </label>
  <input 
      type="{{ $type }}"
      name="{{ $name }}"
      id="{{ $attributes->get('id', $name) }}"
      placeholder="{{ $placeholder }}"
      value="{{ old($name, $value) }}"
      autocomplete="{{ $autocomplete }}"
      {{ $attributes->merge(['class' => 'form-control ' . $class]) }}
  />

  @error($name)
      <small class="bg-danger tx-white d-block px-1 py-1">{{ $message }}</small>
  </ul>
  @enderror
</div>
