<option class="{{ $depth == 0 ? 'bg-primary text-white' : ''}}" value="{{ $value->id }}" wire:key="account-{{ $value->id }}">
    {{ str_repeat('—— ', $depth) . $value->code . ' - ' . $value->name }}
</option>

@if ($value->children)
    @foreach ($value->children as $child)
        @include('accountingsettings::livewire.accountingsettings.partials.option-account', ['value' => $child, 'depth' => $depth + 1])
    @endforeach
@endif
