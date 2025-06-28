<!-- Start Create modal -->
<div wire:ignore.self class="modal fade" id="createModal" >
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">{{ __('Add', ['type' => __('Department')] ) }}</h6>
                <button aria-label="Close" class="close" data-dismiss="modal" type="button" wire:click="close()"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form id="form">

                    <div class="form-group">
                        <label class="main-content-label tx-12 tx-medium">{{ __('Name') }}</label>
                        <input class="form-control" type="text" name="name" wire:model.live='name' autofocus >
                        @error('name')<span class="bg-danger tx-white d-block px-1 py-1">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label class="main-content-label tx-12 tx-medium">{{ __('Description') }}</label>
                        <input class="form-control" type="text" name="description" wire:model.live='description' >
                        @error('description')<span class="bg-danger tx-white d-block px-1 py-1">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label class="main-content-label tx-12 tx-medium">{{ __('Main Department') }}</label>
                        <select wire:model.live="parent_id" class="form-control" id="parent_id">
                            <option disabled value="">{{ __('Select a Department...') }}</option>
                            <option value="" wire:key="department-none">None</option>
                            @forelse ($data as $value)
                                <option value="{{ $value->id }}" wire:key="department-{{ $value->id }}" >{{ $value->name }}</option>
                            @empty
                                <option value="0" wire:key="department-none">None</option>
                            @endforelse
                        </select>
                        @error('parent_id')<span class="bg-danger tx-white d-block px-1 py-1">{{ $message }}</span>@enderror
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn ripple btn-primary" type="button" wire:loading.attr="disabled"  wire:target="submit" wire:click="submit()">
                    {{ __('Save' ) }}
                    <span wire:loading wire:target="submit" class="spinner-border spinner-border-sm text-white" role="status">
                </button>
                <button class="btn ripple btn-secondary" data-dismiss="modal" type="button" wire:click="close()">{{ __('Close') }}</button>
            </div>
        </div>
    </div>
</div>
<!-- End Create modal -->
