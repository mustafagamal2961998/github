<?php

namespace App\View\Components\dashboard\layout;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Layout extends Component
{
    /**
     * Create a new component instance.
     */
    public $items;
    public function __construct()
    {
        $this->items = config('dashboard.nav');
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.dashboard.layout.layout');
    }
}
