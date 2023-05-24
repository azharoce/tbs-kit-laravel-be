<?php

namespace App\View\Components\Layout\meta;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class meta extends Component
{
    /**
     * Create a new component instance.
     */

    public $data;
    public function __construct($title, $meta)
    {
        $this->data = [
            'title' => $title,
            'meta' => $meta
        ];
        // $this->title = $title;
    }
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        // dd($this->data);
        return view('components.layout.meta.meta', $this->data);
    }
}
