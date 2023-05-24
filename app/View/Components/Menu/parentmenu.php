<?php

namespace App\View\Components\menu;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class parentmenu extends Component
{
    /**
     * Create a new component instance.
     */
    public $data;
    public function __construct($data)
    {
        $this->data = [
            'parent_menu' => $data['parent_menu'],
            'data' => $data['data']
        ];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.menu.parentmenu', $this->data);
    }
}
