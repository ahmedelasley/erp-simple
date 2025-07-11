 {{-- <option value="{{ $value->id }}" wire:key="type-{{ $value->id }}" >{{ $value->code }} - {{ $value->name }}</option>
@foreach ($value->children as $child)
    @include('chartofaccounts::livewire.accounts.partials.option-account', ['value' => $child])
@endforeach --}}

<option value="{{ $value->id }}" wire:key="account-{{ $value->id }}">
    {{ str_repeat('— ', $depth) . $value->code . ' - ' . $value->name }}
</option>

@if ($value->children && $value->children->count())
    @foreach ($value->children as $child)
        @include('chartofaccounts::livewire.accounts.partials.option-account', ['value' => $child, 'depth' => $depth + 1])
    @endforeach
@endif
