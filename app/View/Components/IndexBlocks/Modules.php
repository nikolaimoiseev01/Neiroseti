<?php

namespace App\View\Components\IndexBlocks;

use App\Models\Module;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Modules extends Component
{
    /**
     * Create a new component instance.
     */
    public $modules;
    public function __construct()
    {
        $this->modules = Module::with('lessons')->orderBy('order')->withCount('lessons')->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.index-blocks.modules');
    }
}
