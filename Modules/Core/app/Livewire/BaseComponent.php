<?php

namespace Modules\Core\Livewire;

use Livewire\Component;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;

class BaseComponent extends Component
{

    /**
     * Common success alert.
     */
    protected function successAlert($message = __('Operation completed successfully.'))
    {
        LivewireAlert::title('success')
            ->text($message)
            ->success()
            ->show();
    }

    /**
     * Common error alert.
     */
    protected function errorAlert($message =  __('Something went wrong, try .'))
    {
        LivewireAlert::title(' error')
            ->text($message)
            -> error()
            ->show();
    }
    /**
     * Common confirmation alert.
     */
    protected function confirmDelete($callbackMethod, $message = __('Something went wrong, try .'))
    {
        LivewireAlert::confirm([
            'title' => 'تأكيد الحذف',
            'text' => $message,
            'icon' => 'warning',
            'confirmButtonText' => 'نعم، احذف',
            'cancelButtonText' => 'إلغاء',
            'onConfirmed' => $callbackMethod,
        ]);
    }


    /**
     * Dispatch modal open.
     */
    protected function openModal(string $event): void
    {
        $this->dispatch($event);
    }

    /**
     * Dispatch modal close.
     */
    protected function closeModal(string $event): void
    {
        $this->dispatch($event);
    }
}
