<?php

namespace App\View\Components\header;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class panel extends Component
{
    public String $pagename;
    /**
     * Create a new component instance.
     */
    public function __construct(String $pagename)
    {
        $this->pagename = $pagename;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.header.panel');
    }
}
