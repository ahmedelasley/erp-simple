<?php

namespace Modules\Core\View\Components\Partials;

use Illuminate\View\Component;
use Illuminate\View\View;

class DateFormat extends Component
{
    public $date;
    /**
     * Create a new component instance.
     */
    public function __construct($date)
    {
        $this->date = $date;
    }
    // /**
    //  * Get the date formatted for display.
    //  *
    //  * @return string
    //  */
    // public function formattedDate(): string
    // {
    //     return $this->date ? $this->date->format('Y-m-d H:i:s') : '';
    // } 

    /**
     * Get the view/contents that represent the component.
     */
    public function render(): View|string
    {
        return view('core::components.partials.date-format');
    }
}
