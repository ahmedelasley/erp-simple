@props([
    'column' => '',
    'link' => '',
])


@php
    $colum = $column ?? '-';
    // $link = $link ?? '#';
@endphp

<th class="text-uppercase">
  @if($link)
    <a class="d-flex justify-content-between text-primary" href="{{ $link }}">
      <span>{{ __($colum) }}</span>
      <i class="bx bx-chevron-right"></i>
    </a>
  @else
    <span>{{ __($colum) }}</span>
  @endif  
</th>