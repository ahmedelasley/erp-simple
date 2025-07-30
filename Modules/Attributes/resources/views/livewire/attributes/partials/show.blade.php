<!-- Start Show modal -->
<form>
    <div class="d-flex justify-content-between form-control" readonly>
        <h1 class="tx-26 text-primary text-bold">{{ $model?->name }}</h1>
        {{-- <h6 class="{{ $model?->status->textColor() }}"> <div class="dot-label {{ $model?->status->bgColor() }} ms-5" ></div><span>{{ $model?->status->label() }}</span></h6> --}}
    </div>
    <p class="text-muted text-center tx-16">{{ $model?->description }}</p>

    <h6 class="mt-3">{{ __('Sub Categorys') }} <span class="badge badge-primary m-1 text-bold">{{ $model?->children_count }}</span>:
        <div class="d-flex justify-content-start flex-wrap">
            @forelse ($model?->options ?: [] as $item)
                <span class="badge badge-primary m-1 tx-18 text-bold">{{ $item->name }}</span>
            @empty
                <h6 class="text-muted">{{ __('No Childern')}}</h6>
            @endforelse
        </div>
    </h6>
</form>
<!-- End Show modal -->
