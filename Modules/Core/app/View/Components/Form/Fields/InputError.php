<?php

namespace Modules\Core\View\Components\Form\fields;

use Illuminate\View\Component;
use Illuminate\View\View;

class InputError extends Component
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
        return view('core::components.form.fields.input-error');
    }
}
