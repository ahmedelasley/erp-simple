@props(['accounts'])

<ul class="list-group list-group-flush">
    @foreach ($accounts as $account)
        <li class="list-group-item">
            <div class="d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center gap-2">
                    <span class="fw-bold">{{ $account->code }}</span>
                    <span>{{ $account->name }}</span>
                    @if ($account->description)
                        <span class="text-muted small">({{ $account->description }})</span>
                    @endif
                </div>

                <div class="text-end">
                    <span class="badge bg-secondary">{{-- $account->type --}}</span>
                    <span class="ms-2">رصيد: <strong>{{-- number_format($account->balance, 2) --}}</strong></span>
                </div>
            </div>

            @if ($account->children && $account->children->count())
                <div class="ms-4 mt-2 border-start ps-3">
                    <x-core::table.account-tree-view :accounts="$account->children" />
                </div>
            @endif
        </li>
    @endforeach
</ul>
