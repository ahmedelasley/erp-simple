  @props([
    'name' => 'input',
    'class' => '',
    'label' => '',
])

  <label for="{{ $attributes->get('id', $name) }}" {{ $attributes->merge(['class' => 'form-label ' . $class]) }}>
      {{  __($label ? $label : ucfirst($name)) }}
  </label>