<?php

namespace Modules\Core\View\Components\Partials;

use Illuminate\View\Component;
use Illuminate\View\View;

class EnumLabel extends Component
{
    public $enum;
    /**
     * Create a new component instance.
     */

    public function __construct($enum)
    {
        $this->enum = $enum;
    }
    
    /**
     * Get the view/contents that represent the component.
     */
    public function render(): View|string
    {
        return view('core::components.partials.enum-label');
    }
}
