
@props(['class' => ''])

<tfoot>
  <tr {{ $attributes->merge(['class' => 's-18 fw-bold ' . $class]) }}>
    {{ $slot }}
  </tr>
</tfoot>