<?php

namespace Modules\Core\Traits;

use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;

trait HasAdvancedAlerts
{
    public function showCustomAlert($title, $message, $type = 'success',  array $options = [])
    {
        $defaultOptions = [
            'timerProgressBar' => true,
            // 'toast' => true,
            // 'position' => 'top-end',
            // 'timer' => 3000,
            // 'width' => '400px',
            // 'background' => '#f0f0f0',
            // 'customClass' => ['popup' => 'animate__animated animate__bounceIn'],
            // 'allowOutsideClick' => false,
        ];

    $mergedOptions = array_merge($defaultOptions, $options);
    LivewireAlert::$type()
            ->title($title)
            ->text(__($message))
            ->withOptions($mergedOptions)
            ->show();

    }


    /**
     * Common success alert.
     */
    protected function successAlert($title = "Success", $message = 'Operation completed successfully.', $type = 'success',  array $options = [])
    {
        $this->showCustomAlert($title , __($message), $type, $options);
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

}
