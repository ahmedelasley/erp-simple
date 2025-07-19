<!-- Start Show Form -->
<form>
    <div class="d-flex justify-content-between form-control" readonly>
        <h1 class="tx-26 text-primary text-bold">
            <span class="text-muted tx-bold tx-16 me-5">{{ $model?->entry_number }} </span>
            {{-- <span class="text-wrap tx-bold tx-16"> - {{ $model?->name }} </span> --}}
        </h1>
        {{-- <h6 class="{{ $model?->status->textColor() }}"> <div class="dot-label {{ $model?->status->bgColor() }} ms-5" ></div><span>{{ $model?->status->label() }}</span></h6> --}}
    </div>
    <p class="text-muted text-center tx-16">{{ $model?->description }}</p>

    {{-- <h6 class="mt-3">{{ __('Account Tree') }} <span class="badge badge-primary m-1 text-bold">{{ $model?->children->count() }}</span>: --}}
        <div class="d-flex justify-content-start flex-wrap">
            <table class="table table-striped table-bordered table-hover text-md-wrap text-start">


            {{-- @forelse ($model?->children ?: [] as $item) --}}
                {{-- <span class="badge badge-primary m-1 tx-18 text-bold">{{ $item->name }}</span> --}}
                    {{-- @include('chartofaccounts::livewire.accounts.partials.show-account-tree', ['value' => $item, 'depth' => 0]) --}}

            {{-- @empty --}}
                <tr>
                    <th class="text-muted">{{ __('No Childern')}}</th>
                </tr>
            {{-- @endforelse --}}
            </table>
            <div class="table-responsive">
                <table class="table table-bordered text-center">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>{{ __('#') }}</th>
                            <th>{{ __('Account Code') }}</th>
                            <th>{{ __('Account Name') }}</th>
                            <th>{{ __('Debit') }}</th>
                            <th>{{ __('Credit') }}</th>
                            <th>{{ __('Comment') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($model?->items  ?: []  as $key => $value)
                            <tr wire:key="item-{{ $key }}">
                                <td>{{ $key+1 }}</td>
                                <td>{{ $value->account?->code }}</td>
                                <td>{{ $value->account?->name }}</td>
                                <td>{{ $value->debit }}</td>
                                <td>{{ $value->credit }}</td>
                                <td>{{ $value->description }}</td>
                            </tr>
                        @empty
                            <tr>
                                <th class="text-muted">{{ __('No Data Available')}}</th>
                            </tr>
                        @endforelse
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="3" class="text-center">{{ __('Total') }}</th>
                            <th>{{ $model?->items->sum('debit') }}</th>
                            <th>{{ $model?->items->sum('credit') }}</th>
                            <th></th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </h6>
</form>
<!-- End Show Form -->
