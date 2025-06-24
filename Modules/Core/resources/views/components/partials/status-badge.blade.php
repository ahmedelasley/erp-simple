@php
    $colors = [
        'active' => 'success',
        'inactive' => 'warning',
        'archived' => 'secondary',
    ];
@endphp

<span class="badge bg-{{ $colors[$status] ?? 'secondary' }}">
    {{ ucfirst($status) }}
</span>