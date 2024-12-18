<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Diglactic\Breadcrumbs\Breadcrumbs;


class Breadcrumb extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        // Generate breadcrumb items
        $breadcrumbs = Breadcrumbs::generate();
        return view('components.breadcrumb', compact('breadcrumbs'));
    }
}
