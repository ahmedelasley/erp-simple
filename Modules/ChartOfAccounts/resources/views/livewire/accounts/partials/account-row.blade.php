
@php
    // $balance = $account->getRecursiveBalance();
    $indent = str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;', $level);
@endphp
<tr class="tx-bold tx-16">
    <td class="text-start" style="padding-left: {{ $level * 35 }}px;font-weight:bolde;">
        {{-- {{ str_repeat('———— ', $depth)  }} --}}
        <span class="text-muted tx-bold tx-16 me-5">{{ $account->code }}</span>
        <span class="text-wrap tx-bold tx-16"> - {{ $account->name }}</span>
    </td>

    <td class="text-center" >0.00</td>
</tr>

@foreach ($account->children as $child)
    @include('chartofaccounts::livewire.accounts.partials.account-row', ['account' => $child, 'level' => $level + 1, 'depth' => $depth + 1])
@endforeach
