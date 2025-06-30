<!-- Start Show modal -->
<div wire:ignore.self class="modal fade" id="showModal"  >
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">{{ __('Details') }}</h6>
                <button aria-label="Close" class="close" data-dismiss="modal" type="button" wire:click="close()"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="d-flex justify-content-between form-control" readonly>
                    <h1 class="tx-26 text-primary text-bold">{{ $model?->name }}</h1>
                    {{-- <h6 class="{{ $model?->status->textColor() }}"> <div class="dot-label {{ $model?->status->bgColor() }} ms-5" ></div><span>{{ $model?->status->label() }}</span></h6> --}}
                </div>
                <p class="text-muted text-center tx-16">{{ $model?->description }}</p>

                <h6 class="mt-3">{{ __('Sub Departments') }} <span class="badge badge-primary m-1 text-bold">{{ $model?->children_count }}</span>:
                    <div class="d-flex justify-content-start flex-wrap">
                        @forelse ($model?->children ?: [] as $item)
                            <span class="badge badge-primary m-1 tx-18 text-bold">{{ $item->name }}</span>
                        @empty
                            <h6 class="text-muted">{{ __('No Childern')}}</h6>
                        @endforelse
                    </div>
                </h6>
            </div>
            <div class="modal-footer d-flex justify-content-between flex-wrap">
                <div>
                    <span>{{ __('Creator By') }}</span>
                    <span class="text-muted">{{ $model?->creator?->name }} : {{ $model?->created_at?->diffForHumans() }}</span>
                </div>
                <div>
                    <span>{{ __('Editor By') }}</span>
                    <span class="text-muted">{{ $model?->editor?->name }} : {{ $model?->updated_at?->diffForHumans() }}</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Show modal -->
