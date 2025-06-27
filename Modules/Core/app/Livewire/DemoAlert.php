<?php

namespace Modules\Core\Livewire;

use Livewire\Component;
use Modules\Core\Traits\HasAdvancedAlerts;

class DemoAlert extends Component
{
    use HasAdvancedAlerts;

    public function showSuccess()
    {

        $this->showCustomAlert('Success', 'Operation completed successfully.', 'success',
            [
                // 'toast' => true,
            ]
        );

    }

    public function render()
    {
        return view('core::livewire.demo-alert');
    }
}
