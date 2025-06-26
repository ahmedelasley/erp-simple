@props(['status'])

@if ($status)
    <div class="mb-4 font-medium text-sm text-green-600">
        {{ $status }}
    </div>
@endif
 {{-- Usage Example --}}
{{-- <x-core::alerts.session-status :status="session('status')" /> --}}
