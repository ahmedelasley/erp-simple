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


        /**
     * Common success alert.
     */
    protected function successAlert()
    {
        $this->showCustomAlert('Success', __('Operation completed successfully.'), 'success',
            [
                // 'toast' => true,
            ]
        );
    }

    /**
     * Common error alert.
     */
    protected function errorAlert()
    {
        $this->showCustomAlert('Success', __('Something went wrong, try .'), 'success',
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
