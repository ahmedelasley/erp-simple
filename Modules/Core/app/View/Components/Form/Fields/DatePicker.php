<?php

namespace Modules\Core\View\Components\Form\Fields;

use Illuminate\View\Component;
use Illuminate\View\View;

class DatePicker extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct() {}

    /**
     * Get the view/contents that represent the component.
     */
    public function render(): View|string
    {
        return view('core::components.form.fields.date-picker');
    }
}
