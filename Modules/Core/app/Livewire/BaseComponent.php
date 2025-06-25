<?php

namespace Modules\Core\Livewire;

use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class BaseComponent extends Component
{
    // use LivewireAlert;

    /**
     * Common success alert.
     */
    protected function successAlert(string $message): void
    {
        $this->alert('success', $message ?? __('Operation completed successfully.'));
    }

    /**
     * Common error alert.
     */
    protected function errorAlert(string $message): void
    {
        $this->alert('error', $message ?? __('Something went wrong.'));
    }

    /**
     * Common warning alert.
     */
    protected function warningAlert(string $message): void
    {
        $this->alert('warning', $message ?? __('Please check your inputs.'));
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
