<tr class="tx-bold tx-16">
    <td class="text-start" style="padding-left: {{ ($depth + 1) * 35 }}px;font-weight:bold;">
        {{-- {{ str_repeat('———— ', $depth)  }} --}}
        <span class="text-muted tx-bold tx-16 me-5">{{ $value->code }}</span>
        <span class="text-wrap tx-bold tx-16"> - {{ $value->name }} <span class="badge badge-primary m-1 text-bold">{{ $value?->children->count() }}</span>
    </td>
    <td class="text-center" >0.00</td>

</tr>

@if ($value->children)
    @foreach ($value->children as $child)
        @include('chartofaccounts::livewire.accounts.partials.show-account-tree', ['value' => $child, 'depth' => $depth + 1])
    @endforeach
@endif
