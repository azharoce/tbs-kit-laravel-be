<?php

namespace App\View\Components\Layout;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class navbar extends Component
{
    /**
     * Create a new component instance.
     */
    public $data;
    public function __construct($data)
    {
        $this->data = [
            'data' => $data
        ];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.layout.navbar', $this->data);
    }
}
