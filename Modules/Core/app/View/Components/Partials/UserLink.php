<?php

namespace Modules\Core\View\Components\Partials;

use Illuminate\View\Component;
use Illuminate\View\View;

class UserLink extends Component
{
    public $user;
    /**
     * Create a new component instance.
     */
    public function __construct($user)
    {
        $this->user = $user;
    }
    
    /**
     * Get the view/contents that represent the component.
     */
    public function render(): View|string
    {
        return view('core::components.partials.user-link');
    }
}
