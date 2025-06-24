<?php

namespace Modules\Core\View\Components\Tables\Partials;

use Illuminate\View\Component;
use Illuminate\View\View;

class TH extends Component
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
        return view('core::components.tables.partials.th');
    }
}
