<?php

namespace Modules\Core\View\Components\Slides;

use Illuminate\View\Component;
use Illuminate\View\View;

class SlideItem extends Component
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
        return view('core::components.slides.slide-item');
    }
}
