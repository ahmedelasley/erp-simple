@props([
    'id' => null,
    'title' => null,
    'subTitle' => null,
    // 'delete' => false,
    // 'show' => false,
    'modalClass' => '', // فئة التسمية الافتراضية لتنسيق متناسق

    'value' => null,
    'classBtn' => null,
    'clickBtn' => null,
    'target' => null
  ])

@php
    $title = $title ?? 'Add New';
    $subTitle = $subTitle ?? 'Item';
    $value = $value ?? 'Save';
    $classBtn = $classBtn ?? 'primary';
    $clickBtn = $clickBtn ?? 'submit()';
    $target = $target ?? 'submit';
@endphp


<!-- Start Modal -->
<div wire:ignore.self class="modal fade" id="{{ $id }}Modal" >
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable {{ $modalClass }}" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">{{ __($title) }} {{ __($subTitle) }}</h6>
                <button aria-label="Close" class="close" data-dismiss="modal" type="button" wire:click="close()"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
              {{ $slot }}
            </div>
            <div class="modal-footer">
              @if (!($id === 'show'))
                <x-core::form.fields.button-submit :value="$value" :classBtn="$classBtn" clickBtn="submit()" target="submit" />
              @endif
                <x-core::form.fields.button-close />
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->
