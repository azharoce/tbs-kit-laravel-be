<?php

namespace App\View\Components\uikit\element;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * color bedge
 * primary
 * secondary
 * success
 * danger
 * warning
 * info
 * light
 * dark
 */
class bedge extends Component
{
    /**
     * Create a new component instance.
     */
    public $data;
    public function __construct($alert)
    {
        $this->data = [
            'alert' => $alert
        ];
    }


    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.uikit.element.bedge', $this->data);
    }
}
