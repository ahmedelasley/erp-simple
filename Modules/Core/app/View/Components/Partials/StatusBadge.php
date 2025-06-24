<?php

namespace Modules\Core\View\Components\Partials;

use Illuminate\View\Component;
use Illuminate\View\View;

class StatusBadge extends Component
{
    public string $status;
    /**
     * Create a new component instance.
     */
    public function __construct(string $status)
    {
        $this->status = $status;
    }
    
    /**
     * Get the view/contents that represent the component.
     */
    public function render(): View|string
    {
        return view('core::components.partials.status-badge');
    }
}
