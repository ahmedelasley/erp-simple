@props(['messages'])

@if ($messages)
    <ul {{ $attributes->merge(['class' => 'bg-danger tx-white d-block px-1 py-1']) }}>
        @foreach ((array) $messages as $message)
            <li>{{ $message }}</li>
        @endforeach
    </ul>
@endif
