<!-- Start Delete modal -->
<div wire:ignore.self class="modal fade" id="deleteModal"  >
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">{{ __('Delete', ['type' => __('Department')]) }}</h6>
                <button aria-label="Close" class="close" data-dismiss="modal" type="button" wire:click="close()"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form id="form">
                    <h4 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                        {{ __('Are you sure you want to Delete ?', [ 'type' => __('Department') ] ) }}
                    </h4>
                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                        {{ __('Once you delete this item, there is no going back. Please be certain.') }}
                    </p>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn ripple btn-danger" type="button" wire:loading.attr="disabled" wire:target="submit" wire:click="submit()">
                    {{ __('Yes') }}
                    <span wire:loading wire:target="submit" class="spinner-border spinner-border-sm text-white" role="status">
                </button>
                <button class="btn ripple btn-secondary" data-dismiss="modal" type="button" wire:click="close()">{{ __('Close') }}</button>
            </div>
        </div>
    </div>
</div>
<!-- End Delete modal -->
