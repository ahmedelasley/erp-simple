@if ($date)
    <span class="text-muted">{{ \Carbon\Carbon::parse($date)->format('Y-m-d H:i') }}</span>
@else
    <span class="text-muted">-</span>
@endif
