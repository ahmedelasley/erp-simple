<?php

namespace Modules\Core\Livewire;

use Livewire\Component;
use Modules\Core\Traits\HasAdvancedAlerts;

class BaseComponent extends Component 
{
    use HasAdvancedAlerts;


    

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
