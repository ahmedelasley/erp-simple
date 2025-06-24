@if ($user)
    <a href="{{ route('users.show', $user->id) }}" class="text-primary fw-bold">
        {{ $user->name }}
    </a>
@else
    <span class="text-muted">{{ __('Unknown') }}</span>
@endif
