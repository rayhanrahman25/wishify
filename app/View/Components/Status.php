<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Status extends Component
{
    /**
     * Create a new component instance.
     */
    public $type;
    public $title;
    public $number;
    public $growth;
    public function __construct($type,$title,$number,$growth)
    {
        $this->type = $type;
        $this->title = $title;
        $this->number = $number;
        $this->growth = $growth;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.status');
    }
}
