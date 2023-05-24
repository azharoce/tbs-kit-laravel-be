<?php

namespace App\View\Components\menu;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class childmenu extends Component
{
    /**
     * Create a new component instance.
     */
    public $data;
    public function __construct($data)
    {
        // dd($data);
        $this->data = [
            'data' => $data
        ];
    }
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.menu.childmenu', $this->data);
    }
}
